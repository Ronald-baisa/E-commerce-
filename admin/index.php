<?php
include 'config.php';
//if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
if(session_id() == '' || !isset($_SESSION)){session_start();}

if(isset($_SESSION["username"])){

header("location:admin_dashboard.php");
}

?>

<!doctype html>
<html class="no-js" lang="en">

    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login || Sportshub</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>

<body>

<nav class="navbar" role="navigation">
    <div class="navbar-container">
        <div class="brand">
          <h1><a href="adminlogin.php">Administrator <span>Portal</span></a></h1>
          </div>
      <div class="menu">
        <ul class="nav-links">

            <?php
            if(isset($_SESSION['username'])){
                echo '<li><a href="account.php">My Account</a></li>';
                echo '<li><a href="logout.php">Log Out</a></li>';
            }
            else{
                echo '<li><a class="adminlogin" href="index.php">Log In</a></li>';
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
         <center><p>Login your account </p></center>
      <form method="POST" action="adminverify.php">
        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-left">Email</label>
          <div class="col-md-8">
            <input type="email" class="form-control" id="email" placeholder="admin@sample.com" name="username">
          </div>
        </div>
        <div class="form-group row">
          <label for="password" class="col-md-4 col-form-label text-left">Password</label>
          <div class="col-md-8">
            <input type="password" class="form-control" id="password" name="pwd">
          </div>
<span class="password-toggle" onclick="togglePasswordVisibility()"></span>
        </div>
        <div class="form-group row">
          <div class="col-md-4"></div>
          <div class="col-md-8">
            <button type="submit" class="btn btn-primary">Login</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </div>
      </form>
    </div>

  </section>
      <script src="js/showpassword.js"></script>
<footer>
    <p>&copy; Sportshub. All Rights Reserved.</p>
</footer>


  </body>
</html>
