<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="js/notification.js" defer></script>
    <title>Create Notification</title>
</head>
<body>
  
        <div id = "flexbox">
            <div id = "blue">   
            </div>
    
            <div id = "red">
            </div>
    
            <div id = "green">
            </div>
    
            <div id = "yellow">
            </div>
    
        </div>

        <div id = "container">
            
            <form id="client">

            <h3>Choose Notification Type</h3>
          
        

            </form>
            <button type="button" onclick = "document.location = 'overall_notification.php'">Overall Notification</button>
            <button type = "button"  onclick = "document.location = 'individual_notification.php'">Individual Notification</button>
            <button type = "button" class="cancelbtn" onclick = "document.location = 'index.php'">Cancel</button>
            
           
        </div> 
        
</body>
</html>