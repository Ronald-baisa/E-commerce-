<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sportshub</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/swipe.css">
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

<section>
  <div class="">
<img class="bg" src="images/bg.jpeg">
</div>
</section>

<center>
  <h1>Top products</h1>
  <swiper-container>
  <swiper-slide><section class="products-section">
    <div class="product-grid">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products WHERE id IN (5,7,6,9,11,14);
');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>

<div class="product-card">

<img onclick="openPopup('<?php echo $obj->price; ?>','<?php echo $obj->product_img_name; ?>')" src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">

<div class="product-details">

<h5 class="product-title"><?php echo $obj->product_name; ?></h5>

<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>

<p class="product-info"><strong>Price :</strong> <?php echo '₱' . $obj->price; ?></p>

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
</section></swiper-slide>
  <swiper-slide><section class="products-section">
    <div class="product-grid">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products WHERE id IN (1,3,5,8,16,10);
');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>

<div class="product-card">

<img onclick="openPopup('<?php echo $obj->price; ?>','<?php echo $obj->product_img_name; ?>')" src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">

<div class="product-details">

<h5 class="product-title"><?php echo $obj->product_name; ?></h5>

<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>

<p class="product-info"><strong>Price :</strong> <?php echo '₱' . $obj->price; ?></p>

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
</section></swiper-slide>
  <swiper-slide><section class="products-section">
    <div class="product-grid">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products WHERE id IN (2,7,1,4,11,19);
');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>

<div class="product-card">

<img onclick="openPopup('<?php echo $obj->price; ?>','<?php echo $obj->product_img_name; ?>')" src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">

<div class="product-details">

<h5 class="product-title"><?php echo $obj->product_name; ?></h5>

<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>

<p class="product-info"><strong>Price :</strong> <?php echo '₱' . $obj->price; ?></p>

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
</section></swiper-slide>
  <swiper-slide><section class="products-section">
    <div class="product-grid">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products WHERE id IN (9,6,3,8,20,22);
');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>

<div class="product-card">

<img onclick="openPopup('<?php echo $obj->price; ?>','<?php echo $obj->product_img_name; ?>')" src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">

<div class="product-details">

<h5 class="product-title"><?php echo $obj->product_name; ?></h5>

<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>

<p class="product-info"><strong>Price :</strong> <?php echo '₱' . $obj->price; ?></p>

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
</section></swiper-slide>
  <swiper-slide><section class="products-section">
    <div class="product-grid">
        <?php
        $i = 0;
        $product_id = array();
        $product_quantity = array();

        $result = $mysqli->query('SELECT * FROM products WHERE id IN (8,5,7,9,20,16);
');
        if ($result === FALSE) {
            die(mysql_error());
        }

if ($result) {
while ($obj = $result->fetch_object()) {
?>

<div class="product-card">

<img onclick="openPopup('<?php echo $obj->price; ?>','<?php echo $obj->product_img_name; ?>')" src="images/products/<?php echo $obj->product_img_name; ?>" class="product-image" alt="Product Image">

<div class="product-details">

<h5 class="product-title"><?php echo $obj->product_name; ?></h5>

<p class="product-info"><strong>Units Available:</strong> <?php echo $obj->qty; ?></p>

<p class="product-info"><strong>Price :</strong> <?php echo '₱' . $obj->price; ?></p>

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
</section></swiper-slide>
</swiper-container></center>
<br><br>
<br>
<br>
<!-- Slider main container -->
<center><div class="swiper">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
    <!-- Slides -->
    <div class="swiper-slide"><img src="images/swiper/1.jpeg"></div>
    <div class="swiper-slide"><img src="images/swiper/2.jpeg"></div>
    <div class="swiper-slide"><img src="images/swiper/3.jpeg"></div>
    ...
  </div>
</div>
</center>
<br><br><br><br>
<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>

      <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
      <script src="js/swipe.js"></script>
</body>
</html>
