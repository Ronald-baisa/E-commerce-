<?php
// Include the database connection file
require_once("dbConnection.php");

if (isset($_POST['update'])) {
	// Escape special characters in a string for use in an SQL statement
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$code = mysqli_real_escape_string($mysqli, $_POST['code']);
	$name = mysqli_real_escape_string($mysqli, $_POST['name']);
	$desc = mysqli_real_escape_string($mysqli, $_POST['desc']);
	$qty = mysqli_real_escape_string($mysqli, $_POST['qty']);
	$price = mysqli_real_escape_string($mysqli, $_POST['price']);
	
	// Check for empty fields
	if (empty($code) || empty($name) || empty($desc) || empty($qty) || empty($price)) {
		if (empty($code)) {
			echo "<font color='red'>code field is empty.</font><br/>";
		}
		
		if (empty($name)) {
			echo "<font color='red'>name field is empty.</font><br/>";
		}
		
		if (empty($desc)) {
			echo "<font color='red'>desc field is empty.</font><br/>";
		}
		if (empty($qty)) {
			echo "<font color='red'>qty field is empty.</font><br/>";
		}
		if (empty($price)) {
			echo "<font color='red'>price field is empty.</font><br/>";
		}
	} else {
// Check if a new image is uploaded
if ($_FILES['img']['name'] !== "") {
// Handle the image upload
$newImg = $_FILES['img']['name'];
$target_directory = "images/"; 
// Set your target directory
$target_file = $target_directory . basename($newImg);

if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {
      // Update the database with the new image name
                $updateResult = mysqli_query($mysqli, "UPDATE products SET `product_code`='$code', `product_name`='$name', `product_desc`='$desc', `product_img_name`='$newImg', `qty`='$qty', `price`='$price' WHERE `id`='$id'");
            } else {
                echo "Error uploading file.";
            }
        } else {
            // No new image uploaded, update other fields in the database
            $updateResult = mysqli_query($mysqli, "UPDATE products SET `product_code`='$code', `product_name`='$name', `product_desc`='$desc', `qty`='$qty', `price`='$price' WHERE `id`='$id'");
        }

        // Check if the update was successful
        if ($updateResult) {
            echo "<h1 style='color: green;'>Data added successfully!</h1>";
        header("Refresh: 0; URL=index.php");
        } else {
            echo "Error updating data: " . mysqli_error($mysqli);
        }
    }
}
?>