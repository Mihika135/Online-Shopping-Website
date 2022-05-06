<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
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
          <li id="login"><?php if (session_id() == '' || !isset($_SESSION['username'])){?><a href="login.php">Login</a><?php }else { ?><div class="dropdown">
              <button class="dropbtn"><?php echo "Hi, ". $_SESSION['username'];}?> </button>
              <div id="myDropdown" class="dropdown-content">
                <a href="userprofile.php">Profile</a>
                <a href="logout.php">Logout</a>
              </div>
            </div><li>
        </ul>
        <div class="burger">
          <div class="line1"></div>
          <div class="line2"></div>
          <div class="line3"></div>
        </div>
      </nav>
      <div class="heading4">Western Wear</div>
      <div class="container7">
        <div class="category-image"><a href="filteredproducts.php?category_Id=123"><img src="product_images/product15.avif"></a>
            <div>Party Wear</div>
        </div>
        <div class="category-image"><a href="filteredproducts.php?category_Id=766"><img src="product_images/product24.avif"></a>
            <div>Casual Wear</div>
        </div>
        <div class="category-image"><a href="filteredproducts.php?category_Id=111"><img src="product_images/product35.avif"></a>
            <div>Sports Wear</div>
        </div>
      </div>
      <div class="heading5">Traditional Wear</div>
      <div class="container8">
        <div class="category-image"><a href="filteredproducts.php?category_Id=343"><img src="product_images/product44.jpg"></a>
            <div>Kurtas</div>
        </div>
        <div class="category-image"><a href="filteredproducts.php?category_Id=222"><img src="product_images/product47.jpg"></a>
            <div>Sarees</div>
        </div>
        <div class="category-image"><a href="#"><img src="product_images/ghagra.jpg"></a>
            <div>Ghagras</div>
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