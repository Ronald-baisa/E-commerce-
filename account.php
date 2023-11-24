<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();} for php 5.4 and above

if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  echo '<h1>Invalid Login! Redirecting...</h1>';
  header("Refresh: 3; url=index.php");
}

if($_SESSION["type"]==="admin") {
  header("location:admin_dashboard.php");
}

include 'config.php';

?>


<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account || Sportshub</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
<section class="user-account">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <p><?php echo '<h3>Hi ' . $_SESSION['fname'] . '</h3>'; ?></p>
                <p><h4>Account Details</h4></p>
                <p>Below are your details in the database. If you wish to change anything, then just enter new data in the text box and click on update.</p>
            </div>
        </div>

<form id="myForm" method="POST" action="update.php" class="account-form">
<div class="row">
<div class="col-12">
<?php
$result = $mysqli->query('SELECT * FROM users WHERE id=' . $_SESSION['id']);
if ($result === FALSE) {
die(mysql_error());
}

if ($result) {
$obj = $result->fetch_object();
echo '<div class="form-row">';
echo '<label for="fname" class="right inline">First Name</label>';
echo '<input type="text" id="fname" placeholder="' . $obj->fname . '" name="fname">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="lname" class="right inline">Last Name</label>';
echo '<input type="text" id="lname" placeholder="' . $obj->lname . '" name="lname">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="address" class="right inline">Address</label>';
echo '<input type="text" id="address" placeholder="' . $obj->address . '" name="address">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="city" class="right inline">City</label>';
echo '<input type="text" id="city" placeholder="' . $obj->city . '" name="city">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="pin" class="right inline">Zip code</label>';
echo '<input type="text" id="pin" placeholder="' . $obj->pin . '" name="pin">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="email" class="right inline">Email</label>';
echo '<input type="email" id="email" placeholder="' . $obj->email . '" name="email">';
echo '</div>';

echo '<div class="form-row">';
echo '<label for="pwd" class="right inline">Password</label>';
echo '<input type="password" id="pwd" name="pwd">';
echo '</div>';
}
?>

<div class="form-row">
<div class="col-4"></div>
<div class="col-8">
<input type="submit" id="myButton" value="Update" class="form-btn">
<input type="reset" value="Reset" class="form-btn">
</div>
</div>
</div>
</div>
</form>
</div>
</section>
<br><br>
<br>
<br>


    <script src="js/successAlert.js"></script>




<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>
  </body>
</html>
