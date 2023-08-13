<?php

$dbHost = "localhost"; 
$dbUser = "root"; 
$dbPass = ""; 
$dbName = "test"; 


$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Product";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .button-container {
            display: flex;
            gap: 10px;
        }
    </style>
    
</head>
<body>
    <main class="container">
        <?php while ($row = $result->fetch_assoc()) { ?>
            <div class="product">
                <img src="<?php echo $row['Product_Image_Path']; ?>" alt="<?php echo $row['Product_Name']; ?>">
                <h2><?php echo $row['Product_Name']; ?></h2>
                <p>Reviews: <?php echo $row['Avg_Star_Rate']; ?> ⭐</p>
                <p><?php echo $row['Product_Description']; ?></p>
                <h3>Price: $<?php echo $row['Product_Price']; ?></h3>
                <div class="button-container">
                
                    <form method="POST" action="add_to_cart.php">
                        <button type="submit" name="product_id" value="<?php echo $row['Product_ID']; ?>">Add to Cart</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </main>
</body>
</html>