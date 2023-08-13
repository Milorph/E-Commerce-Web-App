<?php
session_start();

// Establish database connection
$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPass = ""; 
$dbName = "test"; 

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the product id is set
if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    // Fetch product details from the database
    $sql = "SELECT * FROM Product WHERE Product_ID = $product_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Get the product details
        $product_name = $row['Product_Name'];
        $product_price = $row['Product_Price'];

        // Check if the cart is already set, if not create an empty array
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        // Check if the product is already in the cart, if so increase the quantity
        if (array_key_exists($product_id, $_SESSION['cart'])) {
            $_SESSION['cart'][$product_id]['quantity']++;
        } else {
            // Add the product to the cart
            $_SESSION['cart'][$product_id] = array(
                'name' => $product_name,
                'price' => $product_price,
                'quantity' => 1
            );
        }
    }
}

// Close the database connection
$conn->close();

// Redirect to the cart page
header('Location: cart.php');
exit();
?>