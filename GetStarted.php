<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Started Page</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  background-color: #f0f0f0;
  margin: 0;
  padding: 0;
     background:url('https://cdn.pixabay.com/photo/2015/04/23/22/00/tree-736885_640.jpg');
    background-size:100%;
    background-repeat:no-repeat;
}

.container {
  text-align: center;
  margin-top: 100px;
}

h1 {
  color: white;
}

p {
  color: white;
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
  <div class="container">
    <h1>Welcome to My Website!</h1>
    <p>Create Your Own Website Seamless Drag & Drop Customization</p>
    <a href="welcome.php"><button id="getStartedButton">Get Started-It's Free</button></a>
  </div>
  <script>
    document.getElementById("getStartedButton").addEventListener("click", function() {
  alert("Congratulations! You've started your journey!");
});
  </script>
</body>
</html>