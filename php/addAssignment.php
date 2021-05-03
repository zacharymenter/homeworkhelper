<?php
    require_once('sql_conn.php');

    session_start();
    $email = $_SESSION["email"];

    $query = "SELECT MAX(id) FROM assignment WHERE email ='$email'";
    $result = mysqli_query($dbc, $query);
    $id = mysqli_fetch_row($result)[0] + 1;

    $name = $_REQUEST['name'];
    $desc = $_REQUEST['description'];
    $date = $_REQUEST['due-date'];
    $time = $_REQUEST['due-time'];

    echo "$time";


    $query = "INSERT INTO assignment(email, id, name, description, date, time, status, grade, sep) VALUES ('$email', '$id', '$name', '$desc', '$date', '$time', '0', '0', '0')";

    $result = mysqli_query($dbc, $query);

    mysqli_close($dbc);
    
    header('Location: ../assignments.php');
?>