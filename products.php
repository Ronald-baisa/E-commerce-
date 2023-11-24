<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Products || Sportshub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

<nav class="navbar" role="navigation">
    <div class="navbar-container">
        <div class="brand">
            <h1><a href="index.php">Sports<span>hub</span></a></h1>
        </div>
      <div class="menu">
        <ul class="nav-links">
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
            <li><a href="cart.php">View Cart</a></li>
            <li><a href="orders.php">My Orders</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="logout.php">Log Out</a></li>';
            }
            else{
                echo '<li><a href="login.php">Log In</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>
        </ul>
      </div> 
              <div class="menu-toggle">
            <a href="#"><i class="fas fa-bars"></i></a>
        </div>
    </div>
</nav>

<br><br><br><br>
<center><h1>AVAILABLE PRODUCTS</h1></center><br>
<section class="products-section">
    <div class="product-grid ">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>
<div class="product-card">
<img src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">
<div class="product-details">
<h5 class="product-title"><?php echo $obj->product_name; ?></h5>
<p class="product-info"><strong>Product Code:</strong> <?php echo $obj->product_code; ?></p>
<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>
<p class="product-info"><strong>Price :</strong> <?php echo '₱' .$obj->price; ?></p>

<?php
if ($obj->qty > 0) {
?>
<a href="update-cart.php?action=add&id=<?php echo $obj->id; ?>" class="add-to-cart-btn">Add To Cart</a>
<?php
} else {
echo '<p class="out-of-stock-msg">Out Of Stock!</p>';
}
?>
</div>
</div>
<?php
$i++;
}
}
$_SESSION['product_id'] = $product_id;
?>
    </div>
</section>

<br><br>
<br>
<br>



 <footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   


  </body>
</html>
