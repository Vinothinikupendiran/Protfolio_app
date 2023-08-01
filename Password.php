<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: signin.php");
    exit();
}

// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "weblogin";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $currentPassword = $_POST["current_password"];
    $newPassword = $_POST["new_password"];

    // Retrieve hashed password from the database based on the current user
    $username = $_SESSION["username"];
    $sql = "SELECT password FROM validation WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPasswordFromDatabase = $row["password"];

        // Verify the current password
        if (password_verify($currentPassword, $hashedPasswordFromDatabase)) {
            // Current password is correct, update the password in the database
            $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateSql = "UPDATE validation SET password = '$hashedNewPassword' WHERE username = '$username'";
            if ($conn->query($updateSql) === TRUE) {
                // Password updated successfully, redirect to the login page
                header("Location: signin.php");
                exit();
            } else {
                // Error updating password
                $passwordChangeError = "Error updating password: " . $conn->error;
            }
        } else {
            // Current password is incorrect
            $passwordChangeError = "Incorrect current password";
        }
    } else {
        // User not found in the database
        $passwordChangeError = "User not found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Password Change</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        /*styles for background image,font size & align items*/
        body {
	height: 100vh;
	flex-direction: column;
    font: 14px sans-serif; 
     margin: 0;
     padding: 0;
     display: flex;
    justify-content: center;
    align-items: center;
     background:url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_640.jpg');
    background-size:100%;
    background-repeat:no-repeat;
}
/*styles for fonts*/
*{
	font-family: sans-serif;
	box-sizing: border-box;
}
/*form*/
form {
	width: 300px;
	padding: 30px;
	border-radius: 15px;
}

h2 {
	margin-bottom: 30px;
    color:white;
}
/*input*/
input {
	display: block;
	border: 2px solid #ccc;
	width: 80%;
	padding: 10px;
	margin: 8px auto;
	border-radius: 5px;
}
/*label*/
label {
	color: white;
	font-size: 15px;
	padding: 8px;
    margin-right:30px;
}
/*button*/
button {
	float: right;
	background: blue;
	padding: 10px 15px;
	color: white;
	border-radius: 5px;
	margin-right: 48px;
	border: none;
}
/*hover effect for button*/
button:hover{
	opacity: .7;
}
</style>
</head>
<body>
    <h2 data-aos="fade-right"
     data-aos-offset="300"
     data-aos-easing="ease-in-sine">Change Password</h2>
    <?php if (isset($passwordChangeError)) { ?>
        <p><?php echo $passwordChangeError; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="current_password" data-aos="zoom-out-right">Current Password:</label>
        <input type="text" name="current_password" required>
        <br>
        <label for="new_password" data-aos="zoom-out-right">New Password:</label>
        <input type="text" name="new_password" required>
        <br>
        <button type="submit">Change Password</button>

    </form><
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({duration: 1000,
            once: false});
      </script>
    
</body>
</html>
