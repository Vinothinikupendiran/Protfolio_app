<!DOCTYPE html>
<head>
<title>Login Form Design</title>
<link rel="stylesheet" type="text/css" href="style1.css">
    </head>
    

<body>


    <div class="box">

        <h1>Login Here</h1>

        <form name="myform"  action="login.php" method="POST" >

            <p>Username</p>
            <input type="text" name="email" placeholder="Enter Email" required="">

            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required="">


            <input type="submit" name="login_Btn" value="Login">

            <br><br>
            <a href="register1.php">Register for new account ?</a>

        </form>
        
    </div>
</body>
</html>
<?php
$host = 'localhost'; // Replace with your database host
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$database = 'signup'; // Replace with your database name

// Create a database connection
$con = new mysqli($host, $username, $password, $database);

// Check the connection
if ($con->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}
// login.php

// Retrieve the submitted username and password
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email = $_POST['email'];
$password = $_POST['password'];

// Query the database to check if the user exists
$query = "SELECT * FROM users WHERE email = '$email'";
$result = $con->query($query);

// Check if the query returned any rows
if ($result->num_rows > 0) {
    // User exists and login is successful
    echo "Login successful!";
    header("Location:index.html");
} else {
    // User doesn't exist or invalid credentials
    echo "Invalid username or password!";
}
}
?>