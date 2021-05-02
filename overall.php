<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Document</title>
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
            <select id="title3" name="title3" required>   
                <option value="" disabled selected hidden>Select assignment group date...</option>
                <?php
                  
                   
                ?>
            </select>
            <label for="time3">Enter notification date</label>
            <input type="datetime-local" placeholder="Enter Notification Time" id="time3" name="time3" required>
            <button type="submit" >Add</button>
    
        
            </form>
            
            <button type = "button" class="cancelbtn" onclick = "document.location = 'notification.html'">Cancel</button>
                            
                
               
            </div> 


    <?php
    
    
    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    // Get a connection for the database
    require_once('php/sql_conn.php');
        
    // Taking all 5 values from the form data(input)
    $date =  $_REQUEST['title2']; 
    $time = $_REQUEST['time2']; 
    
    // Performing insert query execution
    // here our table name is college
    $query = "SELECT name FROM  assignment WHERE date = '$date'";
        
    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    // If result matched $username and $password, table row must be 1 row
        
    
    session_start(); 
        
    $names = ""; 
    while($row = mysqli_fetch_array($response)) { 
            $names = $names. " ". $row['name'];  
    }

     


    ?> 

   

    <script>
                var myVar; 
            
                var title = "<?php echo $names ?>"; 
                
                
                
                
                var notDate = new Date("<?php echo $time ?>"); 
                var currentDate = new Date(); 
                seconds = notDate - currentDate; 

                
                
                myVar = setTimeout(alertFunc, seconds, title);  
                
            


        

            function alertFunc(title){
                var ass_title = title; 
                
            

            // If the user agreed to get notified
            // Let's try to send ten notifications
            if (window.Notification && Notification.permission === "granted") {
            var i = 0;
            // Using an interval cause some browsers (including Firefox) are blocking notifications if there are too much in a certain time.
            var interval = window.setInterval(function () {
                // Thanks to the tag, we should only see the "Hi! 9" notification
                
                var n = new Notification(ass_title,  {tag: 'soManyNotification'});
                if (i++ == 9) {
                    window.clearInterval(interval);
                    }
                
            }, 200);
           
            
            }

            // If the user hasn't told if they want to be notified or not
            // Note: because of Chrome, we are not sure the permission property
            // is set, therefore it's unsafe to check for the "default" value.
            else if (window.Notification && Notification.permission !== "denied") {
            Notification.requestPermission(function (status) {
                // If the user said okay
                if (status === "granted") {
                var i = 0;
                // Using an interval cause some browsers (including Firefox) are blocking notifications if there are too much in a certain time.
                var interval = window.setInterval(function () {
                    // Thanks to the tag, we should only see the "Hi! 9" notification
                    var n = new Notification(ass_title, {tag: 'soManyNotification'});
                    if (i++ == 9) {
                    window.clearInterval(interval);
                    }
                }, 200);
                
                document.getElementById("client").reset();
                // Otherwise, we can fallback to a regular modal alert
            }else {
                alert("Hi!");
                }
            }); 
        }
        }

        
    
    </script>
       
</body>
</html>




 
