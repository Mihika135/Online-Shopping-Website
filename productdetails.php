<?php
        session_start();
        include("connect.php");
        $product_Id = $_GET['product_Id'];

        $sql1 = "SELECT * FROM products, categories WHERE product_Id = $product_Id AND category_Id = cat_Id";
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $result = mysqli_query($conn, $sql1);
        if(mysqli_num_rows($result)>0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['product_name']?></title>
    <link rel="stylesheet" href="css3.css">
    <link rel="stylesheet" href="css2.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css' />
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
</head>
<style>
    .product-details form input[type="submit"]:hover {
    background-color: rgb(240, 51, 18);
    color: #FFFFFF;
  }
.recommend .product-item{
  position: relative;
  width: 25rem;
  margin: 0 auto;
  margin-bottom: 3rem;
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
                    <div class="productcompletedetails">
                        <div class="productimg"><?php echo '<img src="product_images/' .$row['product_image'].'">' ?></div>
                        <div class="product-details">
                            <h2 class="product-name"><?php echo $row['product_name']?></h2>
                            <div>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                            <div>
                            
              <h5 style="font-family:Copperplate, cursive;display: inline-block;font-size: 24px;margin-top: 10px;margin-bottom: 15px;color: #D10024;"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'],2) ?>/-</h5>
                                <span class="available"><?php echo $row['instock']?> Items Available</span>
                            </div>
                            <p><?php echo $row['product_desc']?></p>
                            <div class="product-options">
                                <label>
                                    Size
                                    <select class="input-select">
                                        <option value="0"><?php echo $row['size']?></option>
                                    </select>
                                </label>
                            </div>
                            <ul class="product-links" style="margin-left: -50px">
                                <li>Category: </li>
                                <li><?php echo $row['category_name']?></li>
                            </ul>
                            <!-- <div class="addcart">
                                <div class="btn" style="margin-left: 0px; margin-top: 15px;">
                                    <button class="add-to-cart" pid="" id="product"><i class="fa fa-shoping-cart"></i>Add to Cart?</button>
                                </div>
                            </div> -->
                            <form action="" method="post" style="margin-left: 0px; margin-top: 0px;">
                                <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2">
                                <input type="submit" value="Add To Cart" class="btnAddAction" style="background: rgb(240, 51, 18);border: 0;color: #FFFFFF;width: 420px;padding: 12px 0;text-transform: uppercase;font-size: 14px;font-weight: bold;border-radius: 5px;cursor: pointer;">
                            </form>
                            
                        </div>
                    </div>
                    
                        
                <div class="related" style="position: absolute;top: 1150px;font-size: 20px;font-family: 'Sacramento', cursive;background-color: rgba(224, 255, 255, 0.4);color: tomato;padding: 3px 0px 3px 0px;width:30%;margin-left:550px;text-align:center;">
                        <h3>Related Products</h3>
                    </div>
                    <?php $_SESSION['product_Id'] = $row['product_Id'];
                            }
                        }           
                    ?>
                    <?php
                    include("connect.php");
                    $product_Id = $_GET['product_Id'];
            
                    $sql2 = "SELECT * FROM products, categories WHERE category_Id = cat_Id AND product_Id BETWEEN $product_Id AND $product_Id + 3 LIMIT 3";
                    $run_query = mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($run_query) > 0){
                        ?>
                        <div class="recommend" style="display: grid;
  row-gap: 0;
  grid-template-columns: 1fr 2fr 1fr;
  grid-gap:20px;
  margin-left:30px;
  margin-right: 0px;
  position: absolute;
  top: 900px;">
                            <?php
                    while($row = mysqli_fetch_array($run_query)){
                        $pro_id    = $row['product_Id'];
                        $pro_cat   = $row['category_Id'];
                        $pro_brand = $row['brand'];
                        $pro_name = $row['product_name'];
                        $pro_price = $row['price'];
                        $pro_image = $row['product_image'];

                        $cat_name = $row["category_name"];
                    
                         ?>
                         
                        <div class="product-center container">
                        <div class="product-item">
                        <div class="overlay">
                            <a href="productdetails.php?product_Id=<?php echo $row['product_Id']?>" class="product-thumb">
                            <img src="product_images/<?php echo $row['product_image']?>" alt='' />
                            </a>
                            
                        </div>
                        <div class='product-info'>
                            <span><?php echo $row['category_name']?></span>
                            <h4><a href="productdetails.php?product_Id=<?php echo $row['product_Id']?>" style="text-decoration:none;color:purple;font-family:Copperplate;"><?= $row['product_name'] ?></a></h4>
              <h5 style="font-family:Copperplate, cursive;"><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp;<?= number_format($row['price'],2) ?>/-</h5>
                        </div>
                        <!-- <ul class="icons">
                            <li><i class="fa fa-shopping-cart"></i></li>
                        </ul> -->
                        </div>
                    </div>
                        <?php
                        
                        ;}?></div><?php
                    ;}
                ?>
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