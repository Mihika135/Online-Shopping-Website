<?php

include_once("connect.php");
 session_start();
 if($_SERVER['REQUEST_METHOD']=="POST"){
     $uname = $_POSt['username'];
     $fname = $_POST['firstname'];
     $lname = $_POST['lastname'];
     $email = $_POST['email'];
     $address = $_POST['address'];
     $mobile = $_POST['mobile'];
     $password = $_POST['pwd'];
    
     $sql = "SELECT * FROM register where username = '$username'";
     $result = mysqli_query($conn, $sql);
     if($result){
         echo 'Username already exists!';
         header('location: insertform.php');
     }

     $query = "INSERT INTO register (fname,lname,username,email,pwd,mobilenumber,shipping_address) VALUES ('$fname','$lname','$uname','$email','$password','$mobile','$address')";
     if(mysqli_query($conn,$query)){
        echo '<script type="text/javascript">alert("Account created successfully!")</script>';
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
    <title>Register</title>
    <link rel="stylesheet" href="css1.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>
<style>
    .container6 {
        position: absolute;
        top: 75%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 400px;
        background: white;
        border-radius: 10px;
        padding-bottom: 20px;
    }
</style>
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
      </nav><br><br><br><br>
      <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message2'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
      <div class="container6">
            <h1>Sign Up</h1>
    <form action="" method="post">
    
    <div class="txt_field">
                    <input type="text" id="fname" name="firstname" required>
                    <span></span>
                    <label>First Name</label>
                </div>   
                <div class="txt_field">
                    <input type="text" id="lname" name="lastname" required>
                    <span></span>
                    <label>Last Name</label>
                </div>   
                <div class="txt_field">
                    <input type="text" id="uname" name="username" required>
                    <span></span>
                    <label>User Name</label>
                </div>  
                <div class="txt_field">
                    <input type="email" id="email" name="email" required>
                    <span></span>
                    <label>Email ID</label>
                </div> 
                <div class="txt_field">
                    <input type="text" id="address" name="address" required>
                    <span></span>
                    <label>Shipping Address</label>
                </div>
                <div class="txt_field">
                    <input type="mobile" id="mobile" name="mobile" required>
                    <span></span>
                    <label>Mobile Number</label>
                </div>
                <div class="txt_field">
                    <input type="password" id="password" name="pwd" required>
                    <span></span>
                    <label>Password</label>
                </div>

                <div>
                    <input type="submit" class="signup" value="Sign Up" name="signup"><a href=""></a><br><br>
                    <input type="reset" class="signup" value="Reset">
                </div>
    </form>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        success: function(response) {
          console.log(response);
        }
      });
    });

    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
</body>
</html>