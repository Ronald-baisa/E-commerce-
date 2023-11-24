<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  
  <title>Document</title>
</head>
<body>
  

<?php
if (session_id() == '' || !isset($_SESSION)) {
    session_start();
}

include 'config.php';

if (isset($_SESSION['cart'])) {

    $total = 0;

    foreach ($_SESSION['cart'] as $product_id => $quantity) {

        $result = $mysqli->query("SELECT * FROM products WHERE id = " . $product_id);

        if ($result) {

            if ($obj = $result->fetch_object()) {

                $cost = $obj->price * $quantity;

                $user = $_SESSION["username"];

                $query = $mysqli->query("INSERT INTO orders (product_code, product_name, product_desc, price, units, total, email) VALUES('$obj->product_code', '$obj->product_name', '$obj->product_desc', $obj->price, $quantity, $cost, '$user')");

                if ($query) {
                    $newqty = $obj->qty - $quantity;

                    if ($mysqli->query("UPDATE products SET qty = " . $newqty . " WHERE id = " . $product_id)) {
                      // Successful update
                   echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
                    echo '<script>';
                    echo 'Swal.fire({
                        icon: "success",
                        title: "Success!",
                        text: "Your order was successful.",
                        confirmButtonText: "OK"
                    }).then(() => {
                        window.location.href = "cart.php"; // Redirect after SweetAlert
                    });';
                    echo '</script>';
                    }

                    // Inserted order successfully, show SweetAlert
                    
                }
            }
        }
    }
}

unset($_SESSION['cart']);
header("location:success.php");
?>
    <script src="js/successAlert.js"></script>
</body>
</html>