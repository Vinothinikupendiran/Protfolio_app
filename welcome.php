<!DOCTYPE html>
<html>
<head>
    <title>My Website - Home</title>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <?php
    session_start();
    if (isset($_SESSION['username'])) {
        echo '<p>Hello, ' . $_SESSION['username'] . '!</p>';
        echo '<a href="index.html">Personal portfolio</a>';
        echo '<a href="logout.php"><br><br>Logout</a>';
        echo '<a href="ChangePassword.php"><br><br>Change Password</a>';

    } else {
        echo '<p>You are not logged in. Please <a href="signin.php">login</a>.</p>';
    }
    ?>
</body>
</html>
