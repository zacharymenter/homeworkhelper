<?php

require_once('setting.php');

$login_url = 'https://accounts.google.com/o/oauth2/v2/auth?scope=' . urlencode('https://www.googleapis.com/auth/calendar') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online';

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
            <h3>Click <a href="<?=$login_url?>">export</a> to add to Google Calendar</h3>
            <button type = "button" class="cancelbtn">Cancel</button>
            <span class="psw"><a href="index.php">go back?</a></span>
            </form>
        </div>    
    </body>
</html>      