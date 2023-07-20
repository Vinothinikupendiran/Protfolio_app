
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
    <style>
        body {
	display: flex;
	height: 100vh;
	flex-direction: column;
}

*{
	font-family: sans-serif;
	box-sizing: border-box;
}

form {
	width: 300px;
	border: 2px solid #ccc;
	padding: 30px;
	background: #fff;
	border-radius: 15px;
}

h2 {
	margin-bottom: 30px;
    color:black;
    margin-left: 30px;
}

input {
	display: block;
	border: 2px solid #ccc;
	width: 80%;
	padding: 10px;
	margin: 8px auto;
	border-radius: 5px;
}
label {
	color: black;
	font-size: 15px;
	padding: 8px;
    margin-right:30px;
}

button {
	float: right;
	background: blue;
	padding: 10px 15px;
	color: white;
	border-radius: 5px;
	margin-right: 48px;
	border: none;
}
button:hover{
	opacity: .7;
}
</style>
</head>
<body>
    <h2>Change Password</h2>
    <?php if (isset($passwordChangeError)) { ?>
        <p><?php echo $passwordChangeError; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="current_password">Current Password:</label>
        <input type="text" name="current_password" required>
        <br>
        <label for="new_password">New Password:</label>
        <input type="text" name="new_password" required>
        <br>
        <button type="submit">Change Password</button>

    </form>
</body>
</html>
