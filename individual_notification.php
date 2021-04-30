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

            <h3>Set Notification</h3>
            <select id="title" required>   
                <option value="" disabled selected hidden>Select an assignment...</option>
                <?php
                    session_start();
                    require_once('php/sql_conn.php');
                    
                    $email = $_SESSION["email"];

                    $query = "SELECT * FROM assignment WHERE email='$email' AND status=0";
                    $result = mysqli_query($dbc, $query);


                    while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                        echo "  <option value=\"" . $row['name'] . "\">" . $row['name'] . " due on " . date_format(date_create($row['date'] . $row['time']), 'D\, M d\, g:ia') ."</option>";
                    }

                    mysqli_close($dbc);
                ?>
            </select>
            <input type="datetime-local" placeholder="Enter Notification Time" id="time" required>

            </form>
            <button type="button" onclick = "myFunction()">Add</button>
            <button type = "button" class="cancelbtn" onclick = "document.location = 'notification.html'">Cancel</button>
            
           
        </div> 
        
</body>
</html>