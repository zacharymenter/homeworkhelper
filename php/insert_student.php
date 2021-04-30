<?php
    session_start();

    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    // Get a connection for the database
    require_once('sql_conn.php');
        
    
        
    // Taking all 5 values from the form data(input)
    $email =  $_REQUEST['email'];
    $name = $_REQUEST['name'];
    $username = $_REQUEST['username']; 
    $password =  $_REQUEST['password'];
    $school = $_REQUEST['schools']; 

        
    // Performing insert query execution
    // here our table name is college
    $query = "INSERT INTO student (S_name, email, username, s_password, school) VALUES ('$name', 
        '$email','$username', '$password', '$school')";
        
    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    $_SESSION["email"] = $email;

        
    // Close connection
    mysqli_close($dbc);
    header('Location: ../two_factor.html'); 
?>