           <!DOCTYPE html> 
<head>
<title>How to make a website</title>
<style>
*{
    margin: 0;
    padding: 0;
    font-family: sans-serif;
}
.banner{
    width:100%;
    height: 100vh;
    background-color: #f0f0f0;
    background:url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_640.jpg');
    background-size:100%;
    background-repeat:no-repeat;
    background-size: cover;
    background-position: center;
    }
    .navbar{
        width: 85%;
        margin: auto;
        padding: 35px 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .logo{
        width: 120px;
        cursor: pointer;
    }
    .navbar ul li{
        list-style: none;
        display: inline-block;
        margin: 0 20px;
        position: relative;
    }
    .navbar ul li a{
        text-decoration: none;
        color: white;
        text-transform: uppercase;
    }
    .navbar ul li::after{
        content:'';
        height: 3px;
        width: 0;
        background: white;
        position: absolute;
        left:0;
        bottom: -10px;
        transition: 0.5s;
    }
    .navbar ul li:hover::after{
        width: 100%;

    }
    .content{
        width: 100%;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        text-align: center;
        color: #fff;
    }
    .content h1{
        font-size: 70px;
        margin-top: 80px;
    }
    .content p{
        margin: 20px auto;
        font-weight: 100;
        line-height: 25px;
        font-size: 20px;
    }
    p
    {
        color:white;
        font-size:2.5rem;
        margin: 0;
     padding: 0;
     display: flex;
    justify-content: center;
    align-items: center;
    }
    button {
  padding: 10px 20px;
  background-color: #007BFF;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: background-color 0.2s ease;
}

button:hover {
  background-color: #0056b3;
}

</style>
</head>
<body> 
<div class="banner">
<div class="navbar">
<img src="https://w7.pngwing.com/pngs/202/640/png-transparent-bitcoin-cryptocurrency-logo-lighting-career-portfolio-portfolio-light-fixture-building-text-thumbnail.png" class="logo">
<ul>
<li><a href="Register.php">Signup</a></li>
<li><a href="signin.php">Login</a></li>
<li><a href="Password.php">ChangePassword</a></li>
</ul>
</div>
<div class="content">
<h1> WELCOME TO PERSONAL PORTFOLIO </h1>
<p>A personal portfolio website is a professional website that offers details about your work, potential services, and contact information</p>
<p>An easy approach to market yourself, your brand, or your business is through a portfolio website.</p>
<a href="logout.php"><button id="Button">Logout</button></a>
</div>
</body>
</html>