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
  <title>Orders</title>
  
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

  <div class="container" style="position:absolute;top:220px;left:200px">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div class="table-responsive-md">
          <table class="table table-bordered table-striped text-center">
            <thead>
              <tr>
                <td colspan="9">
                  <h4 class="text-center text-info m-0">Your Orders!</h4>
                </td>
              </tr>
              <tr>
                <th>Order ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Payment Mode</th>
                <th>Products</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Order Placed</th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'connect.php';
                $username = $_GET['username'];
                $sql = "SELECT * FROM orders WHERE username = '$username'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['email']?></td>
                <td>
                <?php echo $row['address']?>
                </td>
                <td>
                <?php echo $row['pmode']?>
                </td>
                <td><?php echo $row['products']?></td>
                <td>
                <?php echo $row['amount_paid']?>
                </td>
                <td>
                <?php echo $row['order_status']?>
                </td>
                <td>
                <?php echo $row['date_added']?>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

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