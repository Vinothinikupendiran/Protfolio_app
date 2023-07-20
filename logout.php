<!DOCTYPE html>
<html>
<head>
    <title>My Website - Logout</title>
</head>
<body>
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>
    <h1>You have been logged out successfully.</h1>
    <p><a href="welcome.php">Go to Home Page</a></p>
</body>
</html>
