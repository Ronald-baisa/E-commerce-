<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if (isset($_SESSION["username"])) {header ("location:index.php");}


?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register || Sportshub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/retype.js"></script>
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

  <section class="card">
    <div class="card-body">
<p>Registration</p>
      <form method="POST" action="insert.php" style="margin-top:30px;">
        <div class="row">
          <div class="col-md-8">

            <div class="row">
              <div class="col-md-4">
                <label for="fname" class="left inline">First Name</label>
              </div>
              <div class="col-md-8">
                <input type="text" id="fname" class="form-control" placeholder="" name="fname">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="lname" class="left inline">Last Name</label>
              </div>
              <div class="col-md-8">
                <input type="text" id="lname" class="form-control" placeholder="" name="lname">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="address" class="left inline">Address</label>
              </div>
              <div class="col-md-8">
                <input type="text" id="address" class="form-control" placeholder="" name="address">
              </div>
            </div>
            <!--
            <div class="row">
              <div class="col-md-4">
                <label for="city" class="left inline">City</label>
              </div>
              <div class="col-md-8">
                <input type="text" id="city" class="form-control" placeholder="" name="city">
              </div>
            </div>
            -->
            <div class="row">
              <div class="col-md-4">
                <label for="pin" class="left inline" max-length="6">Zip Code</label>
              </div>
              <div class="col-md-8">
                <input type="number" id="pin" class="form-control" placeholder="" name="pin">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <label for="email" class="left inline">E-Mail</label>
              </div>
              <div class="col-md-8">
                <input type="email" id="email" class="form-control" placeholder="" name="email">
              </div>
            </div>
<div class="row">
<div class="col-md-4">
<label for="pwd" class="left inline">Password</label>
              </div>
<div class="col-md-8">
<input type="password" id="password" class="form-control" name="pwd"oninput="checkPasswordStrength()">
<div id="passwordStrength"></div>
</div>
</div>
    
<div class="form-group row">
<label for="retypePassword" class="col-md-4 col-form-label text-left">Retype Password</label>
<div class="col-md-8">
<input type="password" class="form-control" id="retypePassword" name="retypePassword" oninput="checkRetypePassword()">
<div id="retypePasswordStatus"></div>
                </div>
            </div>


            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-8">
                <input type="submit" class="btn btn-primary" value="Register">
                <input type="reset" class="btn btn-secondary" value="Reset">
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </section>

 

    <script src="js/passwordstrength.js"></script>
    

<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>
  </body>
</html>
