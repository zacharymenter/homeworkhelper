<html>
<body>
  
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
         
      
            
   </body>

</html>