<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
    
      
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <script src="js/sort.js" defer></script>
        <script src="js/overdue.js" defer></script>
    </head>

    <body>
        <div id="title">
            <h1>Welcome to Homework Helper!</h1>
        </div>
    
        
            <div class="large red block" id="home">
                
                <h2>Dashboard</h2>
                <ul id="assignment-list">
                    <?php
                        session_start();
                        require_once('php/sql_conn.php');
                        $email = $_SESSION["email"];

                        $query = "SELECT * FROM assignment WHERE email='$email' AND status=0";
                        $result = mysqli_query($dbc, $query);


                        while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                            echo "  <li>
                                        <div class=\"assignment\">
                                            <div class=\"assignment-name\">
                                                <h3>" . $row['name'] . "</h3>
                                            </div>
                                            <div class=\"assignment-desc\">" . $row['description'] . "</div>
                                            <div class=\"assignment-due-date\">" . date_format(date_create($row['date'] . $row['time']), 'D\, M d\, g:ia') . "</div>
                                            <div class=\"plain-date\" style=\"display:none\">" . $row['date'] . " " . $row['time'] . "</div>
                                        </div>
                                    </li>";  
                        }

                        mysqli_close($dbc);
                    ?>
                </ul>
                <a class="button" href="assignments.php">View Assignments</a>
            </div>
            <div class="stack">
                <div class="green left row"><a href="completed.php"><i class="fa fa-bell fa-5x"></i></a><h3>Completed Assignments</h3></div>
                <div class="blue right row"><a href="graded.php"><i class="fa fa-calculator fa-5x"></i></i></a><h3>Grades</h3></div>
                <div class="yellow left row"><a href="googleLogin.php"><i class="fa fa-calendar fa-5x"></i></a><h3>Calendar</h3></div>
                <div class="red right row"><a href="notification.html"><i class="fa fa-bell fa-5x"></i></a><h3>Notifications</h3></div>
            </div>
        </div>
    </body>
</html>