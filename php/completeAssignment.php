<?php
    $con = mysqli_connect('localhost', 'root', '', 'homeworkhelper');

    $email = 'test@gmail.com';

    $id = $_REQUEST['id'];

    $query = "UPDATE assignment SET status=1 WHERE email='test@gmail.com' AND id=$id";

    $result = mysqli_query($con, $query);

    mysqli_close($con);

    header('Location: assignments.php');
?>