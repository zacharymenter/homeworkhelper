<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Assignments</title>
        <link rel="stylesheet" href="css/assignments.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="js/formControl.js" defer></script>
        <script src="js/sort.js" defer></script>
        <script src="js/overdue.js" defer></script>
    </head>

    <body>
        <div id="main-container">
            <nav id="navigation">
                <ul>
                    <li style="background-color: #F54746;"><a href="index.php">Home</a></li>
                    <li style="background-color: #FFC413;" class ="active"><a href="assignments.php">Assignments</a></li>
                    <li style="background-color: #87D37B;"><a href="completed.php">Completed</a></li>
                    <li style="background-color: #8AC4F4;"><a href="graded.php">Graded</a></li>
                </ul>
            </nav>


            <div id="container">
                <div class="form-container" id="assignment-form">
                    <form action="php/addAssignment.php">
        
                        <h3>Add Assignment</h3>
            
                        <input type="text" id="name" name="name" placeholder="Assignment Name" required>
                        <textarea type="text" id="description" name="description" placeholder="Assignment Description"></textarea>
                        <input type="date" id="due-date" name="due-date" placeholder="Due Date" required>
                        <input type="time" id="due-time" name="due-time" placeholder="Due Time">
            
                        <button type="submit">Save</button>
                        <button type ="button" class="cancelbtn" onclick="closeForm()">Cancel</button>
                    </form>
                </div> 


                <div id="assignments-container">
                    <div class="assignments-header">
                        <h1>Assignments</h1>
                        <button type="button" class="form-button" onclick="openForm()">&plus;</button>
                    </div>

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
                                                <a href=\"http://www.google.com/calendar/event?action=TEMPLATE&text=" . $row['name'] . "&dates=". date_format(date_create($row['date'] . $row['time']), 'Ymd\This') . "/" . date_format(date_create($row['date'] . $row['time']), 'Ymd\This') . "&details=" . $row['description'] . "&location=\" target=\"_blank\">Add to Google Calendar</a>
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
                        <!-- <li>
                            <form action="completeAssignment.php" method="post" class="assignment">
                                <div class="assignment-name"><h3>Test</h3></div>
                                <div class="assignment-desc">Test assignment description.</div>
                                <div class="assignment-due-date">2021-04-13</div>
                                <input onChange="this.form.submit()" type="checkbox" class="assignment-checkbox">
                            </form>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>