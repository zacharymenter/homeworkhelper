<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
    
      
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
                        require_once('sql_conn.php');
                        $email = $_SESSION["email"];

                        $query = "SELECT * FROM assignment WHERE email='$email' AND status=0";
                        $result = mysqli_query($dbc, $query);


                        while($row = mysqli_fetch_array($result)) {   //Creates a loop to loop through results
                            echo "  <li>
                                        <form action=\"php/completeAssignment.php\" method=\"post\" class=\"assignment\">
                                            <input style=\"display:none\" type=\"text\" name=\"id\" value=" . $row['id'] . ">
                                            <div class=\"assignment-name\">
                                                <h3>" . $row['name'] . "</h3>
                                            </div>
                                            <div class=\"assignment-desc\">" . $row['description'] . "</div>
                                            <div class=\"assignment-due-date\">" . date_format(date_create($row['date'] . $row['time']), 'D\, M d\, g:ia') . "</div>
                                            <div class=\"plain-date\" style=\"display:none\">" . $row['date'] . " " . $row['time'] . "</div>";

                            
                            if ($row['sep'] == 0) {
                                echo "
                                            <input onChange=\"this.form.submit()\" type=\"checkbox\" name=\"checkbox\" class=\"assignment-checkbox\">";
                            } else {
                                echo "
                                            <div class=\"assignment-checkbox\">";
                            }

                            echo "                
                                        </form>
                                    </li>";  
                        }

                        mysqli_close($dbc);
                    ?>
            </div>
            <div class="stack">
                <div class="blue row"><a href="graded.php"><i class="fa fa-calculator fa-5x"></i></i></a><h3>Grades</h3></div>
                <div class="yellow row"><a href="googleLogin.php"><i class="fa fa-calendar fa-5x"></i></a><h3>Calendar</h3></div>
                <div class="green row"><a href="notification.php"><i class="fa fa-bell fa-5x"></i></a><h3>Notifications</h3></div>
                <div class="red row" id="profile"><a href="completed.php"><i class="fa fa-user fa-5x"></i></a><h3>Profile</h3></div>
            </div>
             <!--
                <div class="wide green block" id="completed">
                    <a href="completed.php"><i class="fa fa-bell fa-5x"></i></a>
                    <h2>Completed Assignments</h2>
                </div>
                 -->
        </div>
    
    </body>
</html>