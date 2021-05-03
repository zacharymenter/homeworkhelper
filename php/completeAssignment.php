<?php
    require_once('sql_conn.php');
    
    session_start();
    $email = $_SESSION["email"];

    $id = $_REQUEST['id'];

    $query = "UPDATE assignment SET status=1 WHERE email='$email' AND id=$id";

    $result = mysqli_query($dbc, $query);

    mysqli_close($dbc);

    header('Location: ../assignments.php');
?>