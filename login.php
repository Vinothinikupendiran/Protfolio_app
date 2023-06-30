<!DOCTYPE html>
<html lang="en">
<head>
   <title>Login</title>
   <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
    <form method="post" action="login.php">
        <h1>Login</h1>
        <div class="textBoxdiv">
            <input type="text" placeholder="username" name="username">
        </div>
        <div class="textBoxdiv">
            <input type="password" placeholder="password" name="password">
        </div>
        <input type="submit" value="Login" class="loginBtn" name="login_Btn">
        <div class="signup">
            Don't have an account ?
           </br>
           <a href="#">Sign up</a>
        </div>
    </form>
</div>
</body>
</html>

<?php
$serverName ="localhost";
$userName = "root";
$password = "";
$loginName = "plogin";
$conn = mysqli_connect($serverName, $userName, $password, $loginName);
if(isset($_POST['login_Btn']))
{
    $username = $_POST['username'];
    $password= $_POST['password'];
    $sql="SELECT * FROM plogin.portfoliodetails WHERE username = '$username'";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result))
    {
        $resultPassword =  $row['password'];
        if($password == $resultPassword)
        {
            header('Location:index.html');
        }
        else{
            echo "<script>
            alert('Login unsuccessful');
            </script>";
        }
    }
}
?>