<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About Us || BOLT Sports Shop</title>
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

<section class="about-option">
  <div class="">
<img class="bg" src="images/bg.jpeg">
      <div class="about">
       <center> <span>ABOUT US</span></center>
      <br><p>"Welcome to Sportshub, your one-stop destination for all things sports! We're passionate about helping athletes and sports enthusiasts find the best gear to enhance their performance and elevate their game. Explore a wide range of high-quality sports equipment, from basketballs to soccer cleats, fitness apparel to tennis rackets, all conveniently available at your fingertips. With a commitment to top-notch quality, competitive prices, and exceptional customer service, we're here to support your sporting journey. Whether you're a seasoned pro or just starting, Sportshub is the ultimate destination for all your sports equipment needs. Gear up, get active, and take your passion to the next level with us!"</p>

    </div>
</div>
</section>
<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>








  </body>
</html>
