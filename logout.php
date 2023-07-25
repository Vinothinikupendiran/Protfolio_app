<!DOCTYPE html>
<html>
<head>
    <title>My Website - Logout</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
      body {
	display: flex;
	height: 100vh;
	flex-direction: column;
    font: 14px sans-serif; 
     margin: 0;
     padding: 0;
     display: flex;
    justify-content: center;
    align-items: center;
     height: 100vh;
     background-color: #f0f0f0;
     background:url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_640.jpg');
    background-size:100%;
    background-repeat:no-repeat;
}
h1
{
    color:white;
}
a{
   color:white;
   font-size:1.2rem;
}
        </style>
</head>
<body>
    <?php
    session_start();
    session_unset();
    session_destroy();
    ?>
    <h1 data-aos="fade-right">You have been logged out successfully.</h1><br>
    <p><a href="signin.php" data-aos="fade-zoom-in"
     data-aos-easing="ease-in-back"
     data-aos-delay="100"
     data-aos-offset="0">Go to Login Page</a></p>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({duration: 1000,
            once: false});
      </script>

</body>
</html>
