<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])){
  header("location:index.php");
}
include 'config.php';
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Orders || Sportshub</title>
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

<br><br>
<section class="orders-section">
    <div class="orders-container">
        <h3>My COD Orders</h3>
        <hr>

        <?php
        $user = $_SESSION["username"];
        $result = $mysqli->query("SELECT * from orders where email='".$user."'");
        if($result) {
            while($obj = $result->fetch_object()) {
                echo '<div class="order-details">';
                echo '<p><h4>Order ID ->'.$obj->id.'</h4></p>';
                echo '<p><strong>Date of Purchase</strong>: '.$obj->date.'</p>';

                echo '<p><strong>Product Code</strong>: '.$obj->product_code.'</p>';
                echo '<p><strong>Product Name</strong>: '.$obj->product_name.'</p>';
                echo '<p><strong>Price Per Unit</strong>: '.$obj->price.'</p>';
                echo '<p><strong>Units Bought</strong>: '.$obj->units.'</p>';
                echo '<p><strong>Total Cost</strong>: '.$obj->total.'</p>';
                echo '<p><hr></p>';
                echo '</div>';
            }
        }
        ?>
    </div>
</section>
<br><br>



<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>


  </body>
</html>
