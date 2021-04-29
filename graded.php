<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Graded</title>
        <link rel="stylesheet" href="css/graded.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/sort.js" defer></script>
    </head>

    <body>
        <div id="main-container">
            <nav id="navigation">
                <ul>
                    <li style="background-color: #F54746;"><a href="index.php">Home</a></li>
                    <li style="background-color: #FFC413;"><a href="assignments.php">Assignments</a></li>
                    <li style="background-color: #87D37B;"><a href="completed.php">Completed</a></li>
                    <li style="background-color: #8AC4F4;" class="active"><a href="graded.php">Graded</a></li>
                </ul>
            </nav>


            <div id="container">
                <div id="assignments-container">
                    <div class="assignments-header">
                        <h1>Graded Assignments</h1>
                    </div>

                    <ul id="assignment-list">
                        <?php
                            session_start();
                            require_once('sql_conn.php');
                            $email = $_SESSION["email"];

                            $query = "SELECT * FROM assignment WHERE email='$email' AND status=2";
                            $result = mysqli_query($dbc, $query);


                            while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
                                echo "  <li>
                                            <div class=\"assignment\">
                                                <input style=\"display:none\" type=\"text\" name=\"id\" value=" . $row['id'] . ">
                                                <div class=\"assignment-name\">
                                                    <h3>" . $row['name'] . "</h3>
                                                </div>
                                                <div class=\"assignment-desc\">" . $row['description'] . "</div>
                                                <div class=\"assignment-grade\">Grade: " . $row['grade'] . "%</div>
                                            </div>
                                        </li>";  
                            }

                            mysqli_close($dbc);
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>