<?php
    session_start();
    include_once("connect.php");
    if($_SERVER['REQUEST_METHOD']=="POST")
    {
        $username = $_POST['username'];
        $password = $_POST['pwd'];
        

        $sql1 = "SELECT * FROM register where username = '$username' AND pwd = '$password'";
      
        $result = mysqli_query($conn,$sql1);
        
        if($result)
        {
            
            // setcookie('username',$username,time()+60*60*24*2);//2 days
            // setcookie('pwd',$password,time()+60*60*24*2);//2 days
             
            // $errormsg = '';
            $_SESSION['username'] = $_POST['username'];
            header('location: shop.php');
        }
        else
        {
            $errormsg = 'Account does not exist! Please register first!';
            header('location: login.php');
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css1.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <nav class="nav py-5">
        <div class="logo">
          <h3><a href="home.html" class="logo-name" style="color:tomato;">Fashion<span class="between">for</span>Women</a></h3>
        </div>
  
        <ul class="nav-links">
          <li><a href="home.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="categories.php">Categories</a></li>
          <li><a href="contact.php">ContactUs</a></li>
          <li><a href="cart.php">Cart</a></li>
          <li><a href="login.php" id="login">Login</a></li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
      <center>
        <div class="container5"><br>
            <h1>Login</h1>
            <form method="post">
                <div class="txt_field">
                    <input type="text" name="username">
                    <span></span>
                    <label>Username</label>
                </div>
                <div class="txt_field">
                    <input type="password" name="password">
                    <span></span>
                    <label>Password</label>
                </div>
                <!-- <div class="pass">Forgot Password?</div> -->
                <br>
                <button type="submit" class="login" value="Login"><a href="shop.php" style="text-decoration: none;">Login</a></button> <!--onclick="check(this.form)"-->
                <div class="signup_link">
                    <br>Not a member? &nbsp&nbsp<button type="submit" class="signup" value="Signup"><a href="insertform.php" style="text-decoration: none;">Sign Up</a></button>
                </div><br><br<br>
                
            </form>
        </div>
      </center>
</body>
</html>