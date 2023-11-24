<?php



//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(!isset($_SESSION["username"])) {
  header("location:index.php");
}

if($_SESSION["type"]!="admin") {
  header("location:index.php");
}

include 'config.php';
?>
<?php
// Include the database connection file
require_once("dbConnection.php");

// Get id from URL parameter
$id = $_GET['id'];

// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$code = $resultData['product_code'];
$name = $resultData['product_name'];
$desc = $resultData['product_desc'];
$img = $resultData['product_img_name'];
$qty = $resultData['qty'];
$price = $resultData['price'];
?>
<html>
<head>	
    <title>Admin Dashboard || Sportshub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/edit.css">
    <script src="js/script.js"></script>
</head>
<body>
<nav class="navbar" role="navigation">
    <div class="navbar-container">
        <div class="brand">
          <h1><a href="admin_dashboard.php">Administrator <span>Portal<span></a></h1>
          </div>
      <div class="menu">
        <ul class="nav-links">
            <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="account.php">Manage</a></li>';
                echo '<li><a href="adminlogout.php">Log Out</a></li>';
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

	   <div class="container">
       <br><br><br>
<center><h2>Edit Products</h2></center>
    <a href="index.php" class="button">Back</a>
    <form name="edit" method="post" action="editAction.php" enctype="multipart/form-data">
        <table>
            <tr> 
                <td>Product code</td>
                <td><input type="text" name="code" value="<?php echo $code; ?>"></td>
            </tr>
            <tr> 
                <td>Product name</td>
                <td><input type="text" name="name" value="<?php echo $name; ?>"></td>
            </tr>
            <tr> 
                <td>Product description</td>
                <td><input type="text" name="desc" value="<?php echo $desc; ?>"></td>
            </tr>
            <tr> 
                <td>Image</td>
                <td><input type="file" name="img" value="<?php echo $img; ?>"></td>
            </tr>
            <tr> 
                <td>Quantity</td>
                <td><input type="text" name="qty" value="<?php echo $qty; ?>"></td>
            </tr>
            <tr> 
                <td>Price</td>
                <td><input type="text" name="price" value="<?php echo $price; ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $id; ?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
    <br><br><br>
</div>

	
		<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>
</body>
</html>
