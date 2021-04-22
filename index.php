<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/welcome.css">

    </head>

    <body>
        <div id="title">
            <h1>Welcome to Homework Helper!</h1>
        </div>
        <div id="container">
            <!----
            <div class="wide blue block" id="graded">
                <img src="" alt>
                <h2>Graded Assignments</h2>
            </div>
    
                <div class="wide yellow block" id="assignment">
                    <img src="" alt>
                    <h2>Upcoming Assignments</h2>
                </div>
                <div class="square width">
                    <div class="blue row">
                        <h3>Date</h3>
                    </div>
                    <div class="yellow row">
                        <h3>Placeholder</h3>
                    </div>
                    <div class="green row">
                        <h3>Placeholder</h3>
                    </div>
                    <div class="red row"> <h3>Placeholder</h3></div>
                </div>
                --->
                <div class="large red block" id="home">
                    <img src="" alt>
                    <h2>Dashboard</h2>
                    <ul id="assignment-list">
                        <?php
                            $con = mysqli_connect('localhost', 'root', '', 'homeworkhelper');
                            $email = 'test@gmail.com';

                            $query = "SELECT * FROM assignment WHERE email='$email' AND status=0";
                            $result = mysqli_query($con, $query);


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

                            mysqli_close($con);
                        ?>
                </div>
                <div class="square column stack">
                    <div class="blue row test">
                        <h3>Date</h3>
                    </div>
                    <div class="yellow row test">
                        <h3>Calendar</h3>
                        <i class="fa fa-calendar fa-5x"></i>
                    </div>
                    <div class="green row">
                        <h3>Placeholder</h3>
                    </div>
                    <div class="red row right"> <h3>Placeholder</h3></div>
                </div>
                <div class="wide green block" id="completed">
                    <a href="completed.php"><i class="fa fa-bell fa-5x"></i></a>
                    <h2>Completed Assignments</h2>
                </div>
            </div>
        </div>
    </body>
</html>