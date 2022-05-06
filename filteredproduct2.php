<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="author" content="Sahil Kumar">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Shopping Cart System</title>
  <link rel="stylesheet" href="css2.css">
    <link rel="stylesheet" href="css3.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
</head>

<body>
  <!-- Navbar start -->
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
  <!-- Navbar end -->
  <div class="container9">
          <h1><?php if($_GET['category_Id'] == 123){
            echo "Party";
          }
          else if($_GET['category_Id'] == 766){
            echo "Casual";
          }
          else if($_GET['category_Id'] == 111){
            echo "Sports";
           }
          else if($_GET['category_Id'] == 343){
            echo "Kurtas";
          }
          else if($_GET['category_Id'] == 222){
            echo "Sarees";
          }
          else {
            echo "Products";
          }?>
          </h1>
        <form>

        <div class="dropdown2">
              <button class="dropbtn2">Filter</button>
              <div id="myDropdown" class="dropdown-content2">
              <a href="shop.php">All Products</a>
                <a href="filteredproduct2.php?category_Id=123">Party</a>
                <a href="filteredproduct2.php?category_Id=766">Casual</a>
                <a href="filteredproduct2.php?category_Id=111">Sports</a>
                <a href="filteredproduct2.php?category_Id=343">Kurtas</a>
                <a href="filteredproduct2.php?category_Id=222">Sarees</a>
                <a href="filteredprice.php">Price</a>
              </div>
            </div>
          </form>
      </div>
  <!-- Displaying Products Start -->
  <div class="container" style="position:relative;top:300px;display: flex;align-items: center;justify-content: center;flex-wrap: wrap;max-width: 120rem;margin: 0 auto;padding: 0 2rem;">
    <div id="message"></div>
    <div class="row mt-2 pb-3">
      <?php
  			include 'connect.php';
              $category_Id = $_GET['category_Id'];
  			$stmt = $conn->prepare('SELECT * FROM products WHERE category_Id =?');
            $stmt -> bind_param("s", $category_Id);
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
  		?>
      <div class="product-item">
        <div class="overlay">
          <a class="product-thumb">
            <img src="product_images/<?= $row['product_image'] ?>" class="card-img-top" height="250">
        </a>
        </div><br>
            <div class="product-info">
            <h4><a href="productdetails.php?product_Id=<?php echo $row['product_Id']?>" style="text-decoration:none;color:purple;font-family:Copperplate;"><?= $row['product_name'] ?></a></h4>
              <h5 style="font-family:Copperplate, cursive;"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'],2) ?>/-</h5>

            </div>
              
            <div class="card-footer p-1">
              <form action="" class="form-submit">
                <div class="row p-2">
                  <div class="col-md-6 py-1 pl-4">
                    <b>Quantity : </b>
                  </div>
                  <div class="col-md-6">
                    <input type="number" class="form-control pqty" value="5">
                  </div>
                </div>
                <input type="hidden" class="pid" value="<?php echo $row['product_Id'] ?>">
                <input type="hidden" class="pname" value="<?php echo $row['product_name'] ?>">
                <input type="hidden" class="pprice" value="<?php echo $row['price'] ?>">
                <input type="hidden" class="pimage" value="<?php echo $row['product_image'] ?>">
                <input type="hidden" class="pcode" value="<?php echo $row['product_code'] ?>">
                <button class="btn btn-info btn-block addItemBtn" style="background-color: tomato;border:none;"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Add to
                  cart</button>
              </form>
            </div>
          
        
      </div>
      <?php endwhile; ?>
    </div>
  </div>
  <!-- Displaying Products End -->

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();

      var pqty = $form.find(".pqty").val();

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {
          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
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