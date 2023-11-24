
<?php

//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

include 'config.php';


?>
<?php
$user = true; // Replace this with your actual check

if ($user) {
    // Output JavaScript script for SweetAlert
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
    echo '<script>';
    echo 'Swal.fire({
        icon: "success",
        title: "Success!",
        text: "Your order  was successful.",
        confirmButtonText: "OK"
    }).then(() => {
        window.location.href = "orders-update.php"; // Redirect after SweetAlert
    });';
    echo '</script>';
}

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <title>Shopping Cart || Sportshub</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/cart.css">
        <script src="js/vendor/modernizr.js"></script>
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

<br><br><br>
<section class="cart-section">
    <div class="cart-header">
        <?php
            echo '<p><h3>Your Shopping Cart</h3></p>';

            if(isset($_SESSION['cart'])) {
                $total = 0;
                echo '<table class="cart-table">';
                echo '<tr>';
                echo '<th>Code</th>';
                echo '<th>Name</th>';
                echo '<th>Image</th>';
                echo '<th>Quantity</th>';
                echo '<th>Cost</th>';
                echo '</tr>';
foreach($_SESSION['cart'] as $product_id => $quantity) {
$result = $mysqli->query("SELECT product_code, product_name,product_img_name, product_desc, qty, price FROM products WHERE id = ".$product_id);

if($result){
while($obj = $result->fetch_object()) {
$cost = $obj->price * $quantity;//work out the line cost
$total = $total + $cost; //add to the total cost

echo '<tr>';
echo '<td>'.$obj->product_code.'</td>';
echo '<td>'.$obj->product_name.'</td>';
echo '<td><img src="images/products/' . $obj->product_img_name . '" alt="Product Image" style="max-width: 50px; max-height: 50px;"></td>';
echo '<td>'.$quantity.'&nbsp;<a class="quantity-button" href="update-cart.php?action=add&id='.$product_id.'">+</a>&nbsp;<a class="quantity-button" href="update-cart.php?action=remove&id='.$product_id.'">-</a></td>';
echo '<td>'.$cost.'</td>';
echo '</tr>';
}
}
}

echo '<tr>';
echo '<td colspan="4" align="right">Total</td>';

echo '<td>'.$total.'</td>';
echo '</tr>';

echo '<tr>';
echo '<td colspan="4" align="right"><a href="update-cart.php?action=empty" class="cart-action-button">Empty Cart</a>&nbsp;<a href="products.php" class="cart-action-button">Continue</a>';
if(isset($_SESSION['username'])) {
echo '<a href="orders-update.php"><button class="cod-button"  id="myButton">Order</button></a>';

} else {
echo '<a href="login.php"><button class="login-button">Buy</button></a>';
}

echo '</td>';
echo '</tr>';

echo '</table>';
} else {
echo "You have no items in your shopping cart.";
}
?>
    </div>
</section>

<br><br>



<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>

    <script src="js/successAlert.js"></script>
    <script src="js/vendor/jquery.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
