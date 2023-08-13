<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Check if the form was submitted


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productID = $_POST["product_id"];

    // Image upload handling
    $targetDir = "images/products/";
    $imageName = time() . '_' . basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $imageName;
    move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath);

    // Database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    $sql = "UPDATE Product SET Product_Image_Path = '$targetFilePath' WHERE Product_ID = $productID";
    $result = $conn->query($sql);

    if ($result) {
        echo "Image added successfully";
    } else {
        echo "Error updating image: " . $conn->error;
    }

    $conn->close();
}
?>
