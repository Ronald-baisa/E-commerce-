<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products ORDER BY id DESC");
?>
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
<html>
<head>
    <title>Admin Dashboard || Sportshub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/table.css">
    <script src="js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
  
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
<br><br><br><br>
<div class="container">
    <a href="add.php"><button>Add New Data</button></a>
    <div class="table-container">
        <table>
            <tr bgcolor='#DDDDDD'>
                <th>Product code</th>
                <th>Product name</th>
                <th>Product description</th>
                <th>Image</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
            <?php
            // Your existing code for fetching and displaying records

            // Fetch the next row of a result set as an associative array
            while ($res = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$res['product_code']."</td>";
                echo "<td>".$res['product_name']."</td>";
                echo "<td>".$res['product_desc']."</td>";
                $imagePath = "images/".$res['product_img_name'];
                echo "<td><img src=\"$imagePath\" alt=\"Product Image\"></td>";
                echo "<td>".$res['qty']."</td>";
                echo "<td>".$res['price']."</td>";
                echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | 
                <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
            }
            ?>
        </table>
    </div>
    </div>
    <!-- Pagination Links -->
 <!--   <div class="pagination">
        <?php
        // Display pagination links
      /*  for ($i = 10; $i <= $totalPages; $i++) {
            echo "<a href='index.php?page=$i' " . ($i == $page ? "class='active'" : "") . ">$i</a> ";
        }
        */
        ?>
    </div>
    -->
    
    <br><br><br><br>
    <br><br><br>
 <footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>

</body>
</html>

