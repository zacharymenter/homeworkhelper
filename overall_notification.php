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
            
        <form id="client" action="overall.php" method="POST">

        <h3>Set Notification</h3>
        <select id="title2" name="title2" required>   
            <option value="" disabled selected hidden>Select assignment group date...</option>
            <?php
                session_start();
                require_once('php/sql_conn.php');
                
                $email = $_SESSION["email"];

                $query = "SELECT date FROM assignment WHERE email='$email' AND status=0";
                $result = mysqli_query($dbc, $query);


                while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                    echo "  <option value=\"" . $row['date'] .  "\">"  . date_format(date_create($row['date']), 'D\, M d').  "</option>";
                }

                mysqli_close($dbc);
               
            ?>
        </select>
        <label for="time2">Enter notification date</label>
        <input type="datetime-local" placeholder="Enter Notification Time" id="time2" name="time2" required>
        <button type="submit" >Add</button>

    
        </form>
        
        <button type = "button" class="cancelbtn" onclick = "document.location = 'notification.html'">Cancel</button>
                        
            
           
        </div> 
        
</body>
</html>