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
      <div class="img-home">
      <a href=""><img src="product_images/carousal 3.jpg" height="900px" width="700px"> </a>
      </div>
      <div class="home-text">
          <span class="txt">Shop for the latest <div>fashion trends here</div></span>
          <div class="button">
              <a href="shop.php"><button type="button">Shop Now</button></a>
          </div>
      </div><br><br><br>
      <div class="category">
        <h2 class="type1">Western</h2>
        <h2 class="type2">Traditional</h2>
      </div>
      <div class="category-img">
        <div><a href="categories.php"><img src="product_images/western.jpg" class="western"></a></div>
        <div class="middle">
          <div class="text">western</div>
        </div>
        <div><a href="categories.php"><img src="product_images/traditional.jpg" class="traditional"></a>
        <div class="middle">
          <div class="text">Traditional</div>
        </div>
        </div>
      </div>
      <center><div class="heading1">
        <h1>Brands Available</h1>
      </div>
      <div class="container">
        <div class="brand">
          <img src="product_images/calvin klein.jpg">
        </div>
        <div class="brand">
          <img src="product_images/chanel.jpg">
        </div>
        <div class="brand">
          <img src="product_images/dior.jpg">
        </div>
        <div class="brand">
          <img src="product_images/gucci.jpg">
        </div>
      </div>
      <div class="container1">
        <div class="brand">
          <img src="product_images/louis vuitton.jpg">
        </div>
        <div class="brand">
          <img src="product_images/prada.jpg">
        </div>
        <div class="brand">
          <img src="product_images/versace.jpg">
        </div>
      </div>
      <div class="heading2">
        <h1>What's New?</h1>
      </div>
      <div class="container2">
        <div class="new">
          <img src="product_images/1.jpeg">
        </div>
        <div class="new">
          <img src="product_images/3.webp">
        </div>
      </div>
      <div class="container3">
        <div class="new">
          <img src="product_images/4.jpeg">
        </div>
        <div class="new">
          <img src="product_images/5.jpeg">
        </div>
      </div>
      <div class="heading3">
        <h1>Styles To Steal</h1>
      </div>
      <div class="container4">
        <div class="style"><img src="product_images/style1.png"></div>
        <div class="style"><img src="product_images/style2.png"></div>
        <div class="style"><img src="product_images/style3.png"></div>
        <div class="style"><img src="product_images/style4.png"></div>
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