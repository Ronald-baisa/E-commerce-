<html>
<head>
    <title>Add Data</title>
</head>

<body>
    <?php
    // Include the database connection file
    require_once("dbConnection.php");

    if (isset($_POST['submit'])) {
        // Escape special characters in string for use in SQL statement
        $code = mysqli_real_escape_string($mysqli, $_POST['code']);
        $name = mysqli_real_escape_string($mysqli, $_POST['name']);
        $desc = mysqli_real_escape_string($mysqli, $_POST['desc']);
        $qty = mysqli_real_escape_string($mysqli, $_POST['qty']);
        $price = mysqli_real_escape_string($mysqli, $_POST['price']);

        // Check for empty fields
        if (empty($code) || empty($name) || empty($desc) || empty($qty) || empty($price)) {
            // Display error messages and provide a link to go back
            echo "<font color='red'>One or more fields are empty.</font><br/>";
            echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
        } else {
            // If all fields are filled

            // Handle file upload
            $img = $_FILES['img']['name'];
            $target_directory = "images/"; // Set your target directory
            $target_file = $target_directory . basename($img);

            // Check if the image file is a valid upload
            if (move_uploaded_file($_FILES['img']['tmp_name'], $target_file)) {

                // Insert data into the database
                $result = mysqli_query($mysqli, "INSERT INTO products (`product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES ('$code', '$name', '$desc', '$img', '$qty', '$price')");

                // Display success message
echo "<h1 style='color: green;'>Data added successfully!</h1>";
    header("Refresh: 0; URL=index.php");
            } else {
                // Display an error message if the file upload fails
                echo "<font color='red'>Sorry, there was an error uploading your file.</font><br/>";
                echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
            }
        }
    }
    ?>

</body>
</html>
