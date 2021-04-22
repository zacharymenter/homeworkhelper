<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Completed</title>
        <link rel="stylesheet" href="css/completed.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/sort.js" defer></script>
    </head>

    <body>
        <div id="main-container">
            <nav id="navigation">
                <ul>
                    <li style="background-color: #F54746;"><a href="index.php">Home</a></li>
                    <li style="background-color: #FFC413;"><a href="assignments.php">Assignments</a></li>
                    <li style="background-color: #87D37B;" class="active"><a href="completed.php">Completed</a></li>
                    <li style="background-color: #8AC4F4;"><a href="graded.php">Graded</a></li>
                </ul>
            </nav>


            <div id="container">
                <div id="assignments-container">
                    <div class="assignments-header">
                        <h1>Completed Assignments</h1>
                    </div>

                    <ul id="assignment-list">
                        <?php
                            $con = mysqli_connect('localhost', 'root', '', 'homeworkhelper');
                            $email = 'test@gmail.com';

                            $query = "SELECT * FROM assignment WHERE email='$email' AND status=1";
                            $result = mysqli_query($con, $query);


                            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                echo "  <li>
                                            <div class=\"assignment\">
                                                <input style=\"display:none\" type=\"text\" name=\"id\" value=" . $row['id'] . ">
                                                <div class=\"assignment-name\">
                                                    <h3>" . $row['name'] . "</h3>
                                                </div>
                                                <div class=\"assignment-desc\">" . $row['description'] . "</div>
                                                <div class=\"assignment-due-date\">" . date_format(date_create($row['date'] . $row['time']), 'D\, M d\, g:ia') . "</div>
                                                <div class=\"plain-date\" style=\"display:none\">" . $row['date'] . " " . $row['time'] . "</div>
                                            </div>
                                        </li>";  
                            }

                            mysqli_close($con);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>