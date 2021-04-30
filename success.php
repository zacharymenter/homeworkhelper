<?php

// servername => localhost
// username => root
// password => empty
// database name => staff
// Get a connection for the database
require_once('sql_conn.php');

session_start();
// Holds the Google application Client Id, Client Secret and Redirect Url
require_once('setting.php');


class GoogleCalendarApi
{
	public function GetUserCalendarTimezone($access_token) {
		$url_settings = 'https://www.googleapis.com/calendar/v3/users/me/settings/timezone';
	
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_settings);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get timezone');

		return $data['value'];
	} 

	public function GetCalendarsList($access_token) {
		$url_parameters = array();

		$url_parameters['fields'] = 'items(id,summary,timeZone)';
		$url_parameters['minAccessRole'] = 'owner';

		$url_calendars = 'https://www.googleapis.com/calendar/v3/users/me/calendarList?'. http_build_query($url_parameters);
	
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url_calendars);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));	
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);	
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to get calendars list');

		return $data['items'];
	}

    public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
		$url = 'https://www.googleapis.com/oauth2/v4/token';			
	
		$curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
		$ch = curl_init();		
		curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
		if($http_code != 200) 
			throw new Exception('Error : Failed to receieve access token');
		
		return $data;
	}
    
    public function CreateCalendarEvent($calendar_id, $summary, $all_day, $event_time, $event_timezone, $access_token) {
		$url_events = 'https://www.googleapis.com/calendar/v3/calendars/' . $calendar_id . '/events';

		$curlPost = array('summary' => $summary);
		if($all_day == 1) {
			$curlPost['start'] = array('date' => $event_time['event_date']);
			$curlPost['end'] = array('date' => $event_time['event_date']);
		}
		else {
			$curlPost['start'] = array('dateTime' => $event_time['start_time'], 'timeZone' => $event_timezone);
			$curlPost['end'] = array('dateTime' => $event_time['end_time'], 'timeZone' => $event_timezone);
		}
		$ch = curl_init();		
		
		curl_setopt($ch, CURLOPT_URL, $url_events);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token, 'Content-Type: application/json'));	
		curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($curlPost));	
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);	
		if($http_code != 200) 
			throw new Exception('Error : Failed to create ');

		return $data['id'];
	}	
}

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$capi = new GoogleCalendarApi();
		
		// Get the access token 
		$data = $capi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);

		// Access Token
		$access_token = $data['access_token'];

		// Get user calendar timezone
        $user_timezone = "America/Chicago";

		// Constant values
        $calendar_id = 'primary';
		$full_day_event = 0; 

        // connect to database
		$con = mysqli_connect('localhost', 'root', '', 'homeworkhelper');
        //email linked to assingments
        $email = $_SESSION["email"];

		$query = "SELECT * FROM assignment WHERE email='$email'";
		$result = mysqli_query($con, $query);


		while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
			$event_title = $row['name'];
			$date = $row['date'] . 'T' . $row['time'];
			
        	// Event starting & finishing at a specific time
        	$event_time = [ 'start_time' => $date, 'end_time' => $date ];
        	// Create event on primary calendar
        	$event_id = $capi->CreateCalendarEvent($calendar_id, $event_title, $full_day_event, $event_time, $user_timezone, $access_token);
		}

	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/submitForm.js"></script>
        <title>Login</title>
    </head>
    <body>
        <div id = "flexbox">
            <div id = "blue">
                <i class="fa fa-pencil fa-5x"></i>
            </div>
            <div id = "red">
                <i class="fa fa-calculator fa-5x"></i>
            </div>

            <div id = "green">
                <i class="fa fa-calendar fa-5x"></i>
            </div>

            <div id = "yellow">
                <i class="fa fa-bell fa-5x"></i>
            </div>
        </div>
        <div id = "container">
            <form action="login.php" method="post">
            <h3>Homework Helper</h3>
            <p>You successfully exported your assignments to Google Calendar</p>
            <!----put into flexbox-->
            <span class="psw"><a href="index.php">go back?</a></span>
            </form>
        </div> 
    </body>
</html>