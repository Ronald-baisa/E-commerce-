<?php
include 'config.php';
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact || Sportshub</title>
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


<header>
        <h1>Contact Us</h1>
    </header>

    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Get in Touch</h2>
                    <p>Have any questions or feedback? We'd love to hear from you!</p>
                    <p>Email us at: <a href="mailto:sportshub@email.com">sportshub@email.com</a></p>
                </div>
            </div>
        </div>
    </section>


<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>
  </body>
</html>
