<html>
<body>
  
        <?php
  
        // servername => localhost
        // username => root
        // password => empty
        // database name => staff
        // Get a connection for the database
        require_once('sql_conn.php');
          
       
          
        // Taking all 5 values from the form data(input)
        $username =  $_REQUEST['username']; 
        $password =  $_REQUEST['password'];
       

          
        // Performing insert query execution
        // here our table name is college
        $query = "SELECT S_ID FROM  student WHERE username = '$username' and s_password = '$password'";
          
        // Get a response from the database by sending the connection
        // and the query
        $response = @mysqli_query($dbc, $query);
        $count = mysqli_num_rows($response);
        
        // If result matched $username and $password, table row must be 1 row
          
        if($count == 1) {
           header("location: two_factor.html");
        }else {

           header("location: login.html");
        }
     

          
        // Close connection
        mysqli_close($dbc);
       
        ?>
 
</body>
  
</html>