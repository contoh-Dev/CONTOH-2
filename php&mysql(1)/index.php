<?php
include 'config.php'; 

session_start (); 

error_reporting (0);

if (isset ($_SESSION['username'])) {
    header ("location : welcome.php");
}

if (isset ($_POST['submit'])){
    $email = $_POST['email'];
    $password =md5 ($_POST ['password']);

    $sql = "SELECT * FROM users WHERE email= '$email' AND password='$password'"; 
    $result =mysqli_query ($conn, $sql); 

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result); 
        $_SESSION ['username'] = $row ['username']; 
        header ("location: welcome.php");    
    }else {
        echo "<script>alert('woops! Email or password is wrong.')</script>"; 
    }
}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>login form</title>
</head>
<body>
    <div class="container"> 
    <form action="" method="POST" class="login-email">
    <p class="login-text" style="font-size: 2rem; font weight: 800;">login</p>
    <div class "input-grup">
        <input type="email" placeholder="email" name="email" value="<?php echo $email; ?>" required>
        </div>
    <div class "input-grup">
        <input type="password" placeholder="password" name="password" value="<?php echo $_POST['password']; ?>" require>
        </div>
    <div class "input-grup">
        <button name="submit" class="btn">login</button>
        </div>
        <p class="login-register-text">Dont have an account? <a href="register.php">register here</a>.</p>
        </form>
        </div>
</body>
</html>