<!DOCTYPE html>
<html>
<head>
	<title>Wishlist</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
<style>
    p {
        text-align: center;
    }
</style>
<div class="header">
    <h1 class="title">Wishlist</h1>
    <a href="home.php"><p>Back to Home</p></a>
</div>
	<?php
	// Start the session
	session_start();

	if(isset($_SESSION["wishlist"]) && is_array($_SESSION["wishlist"]) && count($_SESSION["wishlist"]) > 0) {
		// Connect to MySQL database
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		// Prepare the SQL statement
		$sql = "SELECT Product_Name, Product_Category, Product_Price FROM Product WHERE Product_ID = ?";
		$stmt = $conn->prepare($sql);
		$stmt->bind_param("i", $product_id);
	
		// Loop through each product ID in the wishlist and retrieve its details from the database
		echo "<table class='container'>";
		echo "<tr><th>Product Name</th><th>Product Category</th><th>Product Price</th></tr>";
		foreach ($_SESSION["wishlist"] as $product_id) {
			// Execute the prepared statement
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $row["Product_Name"] . "</td>";
					echo "<td>" . $row["Product_Category"] . "</td>";
					echo "<td>" . $row["Product_Price"] . "</td>";
					echo "<td><a href='remove_from_wishlist.php?product_id=" . $product_id . "' class='wishlist-btn'>❌</a></td>";
					echo "</tr>";
				}
			}
		}
	
		// Close the prepared statement
		$stmt->close();
		echo "</table>";
	} else {
		echo "<p>Your wishlist is empty.</p>";
	}
	?>
</body>
</html>