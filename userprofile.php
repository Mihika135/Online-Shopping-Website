<?php
include("connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css3.css">
    <link rel="stylesheet" href="css1.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>
<style>
      h2{
      position: absolute;
      top: 200px;
      left: 610px;
      font-family: 'Sacramento', cursive;
      font-weight: 400;
    }
h2 span {
    color: tomato;
}
h1{
    position: absolute;
    top: 275px;
    text-align: center;
    font-family: 'Garamond', serif;
    color: rgb(12, 12, 96);
    width: 99%;
}
.container10{
    position: absolute;
    top: 530px;
    left: 880px;
    padding: 10px 10px;
    transform: translate(-50%, -50%);
    justify-content: space-between;
    width: 600px;
    align-items: left;
    font-size: 20px;
    color: black;
}
.container10 label{
  
    color: black;
    font-weight: bold;
}
.container10 label span{
  color: tomato;
  font-weight: 200;
}
table, th, td {
  border: 1px solid black;
  color: orangered;
  font-weight: bold;
  font-family: 'Copperplate';
}
.orders {
  position: absolute;
  top: 350px;
  left: 50px;
  
}
.orders a {
  text-decoration: none;
}


</style>
<body>
<?php
include_once("connect.php");
$username = $_SESSION['username'];
$sql = "SELECT * FROM register WHERE username = '$username'";
$result = mysqli_query($conn,$sql);
while($rows=mysqli_fetch_array($result))
{
    ?>
    <nav class="nav py-5">
        <div class="logo">
          <h3><a href="home.html" class="logo-name" style="color:tomato;">Fashion<span class="between">for</span>Women</a></h3>
        </div>
  
        <ul class="nav-links">
          <li><a href="home.php">Home</a></li>
          <li><a href="shop.php">Shop</a></li>
          <li><a href="categories.php">Categories</a></li>
          <li><a href="contact.php">ContactUs</a></li>
          <li><a href="cart.php">Cart (<span id="cart-item" class="badge badeg-danger" style="background-color: crimson;border-radius: 3px;font-weight:bold;"></span>) </a></li>
          <li id="login"><?php if (session_id() == '' || !isset($_SESSION['username'])){?><a href="login.php">Login</a><?php }else { ?><div class="dropdown">
              <button class="dropbtn"><?php echo "Hi, ". $_SESSION['username'];}?> </button>
              <div id="myDropdown" class="dropdown-content">
                <a href="userprofile.php">Profile</a>
                <a href="logout.php">Logout</a>
              </div>
            </div></li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
    
        <h2>Welcome <span><?php echo $username ?>!</span></h2>
        <h1>YOUR PROFILE</h1>
        <div class="container10">
          <table cellpadding="10" cellspacing="8">
            <tr>
              <td class="try" style="color: black;">First Name</td>
              <td><?php echo $rows['fname']?></td>
            </tr>
            <tr>
              <td class="try" style="color: black;">Last Name</td>
              <td><?php echo $rows['lname']?></td>
            </tr>
            <tr>
              <td class="try" style="color: black;">Username</td>
              <td><?php echo $rows['username']?></td>
            </tr>
            <tr>
              <td class="try" style="color: black;">Email</td>
              <td><?php echo $rows['email']?></td>
            </tr>
            <tr>
              <td class="try" style="color: black;">Phone</td>
              <td><?php echo $rows['mobilenumber']?></td>
            </tr>
            <tr>
              <td class="try" style="color: black;">Address</td>
              <td><?php echo $rows['shipping_address']?></td>
            </tr>
            
          </table>
           
          <div class="orders">
             
               
               <a href="vieworders.php?username=<?php echo $rows['username']?>"> <button type="submit" name="submit" style="background: rgb(240, 51, 18);border: 0;color: #FFFFFF;width: 300px;padding: 12px 0;text-transform: uppercase;font-size: 14px;font-weight: bold;border-radius: 5px;cursor: pointer;">View Your Orders?</button></a>
          <br><br>

              


          </div>
            
        </div>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
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
    <?php
}
?>