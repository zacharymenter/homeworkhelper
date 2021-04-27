<?php

// servername => localhost
// username => root
// password => empty
// database name => staff
// Get a connection for the database
require_once('sql_conn.php');

// Taking all 5 values from the form data(input)
$username =  $_GET['username']; 
$password =  $_GET['password'];


session_start();
// Holds the Google application Client Id, Client Secret and Redirect Url
require_once('settings.php');

// Holds the various APIs involved as a PHP class. Download this class at the end of the tutorial
require_once('google-login-api.php');


$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';



// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
   try {
      $capi = new GoogleCalendarApi();
      
      // Get the access token 
      $data = $capi->GetAccessToken(APPLICATION_ID, APPLICATION_REDIRECT_URL, APPLICATION_SECRET, $_GET['code']);

      // Access Token
      $access_token = $data['access_token'];

      // The rest of the code to add event to Calendar will come here
      // Get user calendar timezone

   $user_timezone = $capi->GetUserCalendarTimezone($access_token);
   

   $calendar_id = 'primary';
   $event_title = 'Event Title';

   // Event starting & finishing at a specific time
   $full_day_event = 0; 
   $event_time = [ 'start_time' => '2016-12-31T15:00:00', 'end_time' => '2016-12-31T16:00:00' ];

   // Full day event
   $full_day_event = 1; 
   $event_time = [ 'event_date' => '2016-12-31' ];

   // Create event on primary calendar
   $event_id = $capi->CreateCalendarEvent($calendar_id, $event_title, $full_day_event, $event_time, $user_timezone, $access_token);
   }
   catch(Exception $e) {
      echo $e->getMessage();
      exit();
   }
}

?>
         
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
            
            <form action="googleLogin.php" method="post">

            <h3>Hit Enter to export to Google Calendar</h3>

            

            <a href = "<?= $login_url ?>"><button type="submit">Export</button></a>

            
            <!----put into flexbox-->
            <button type = "button" class="cancelbtn">Cancel</button>
            <span class="psw"><a href="index.php">go back?</a></span>
            </form>
            
              
        </div> 
          
        

   
</body>
</html>      
            
