<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css1.css">
    <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="css3.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head><style>
.slogan{
     font-family: 'Beth Ellen', cursive;
     color:black;
     font-size: 36px;
   }
    .author{
     font-family: 'Nova Cut', cursive;
     color:black;
   } 
   .contact-info{
     padding-top:250px;
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
          <li><a href="cart.php">Cart (<span id="cart-item" class="badge badeg-danger" style="background-color: crimson;border-radius: 3px;font-weight:bold;"></span>) </a></li>
          <li id="login">
          <?php if (session_id() == '' || !isset($_SESSION['username'])){?><a href="login.php">Login</a><?php }else { ?><div class="dropdown">
              <button class="dropbtn"><?php echo "Hi, ". $_SESSION['username'];}?> </button>
              <div id="myDropdown" class="dropdown-content">
                <a href="userprofile.php">Profile</a>
                <a href="logout.php">Logout</a>
              </div>
            </div>
          </li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
      <center>
        <div class="contact-info">
          <p class="slogan">"Fashion For Woman"</p>
          <p class="author">Mihika Dakappagari</p>
          
          <p class="author">mihikad@gmail.com</p>
            <p class="author"><a href="#" class="logo-name">On LinkedIn</a></p>
        </div>
      </center>
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