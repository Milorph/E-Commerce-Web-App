
<!DOCTYPE html>

<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Storeal: E-Commerce Website!</title>
    <style>
		body {
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
			background-color: #f5f5f5;
		}

		.container {
			max-width: 1200px;
			margin: 0 auto;
			padding: 20px;
		}


		.header {
			display: flex;
			justify-content: space-between;
			align-items: center;
			background-color: #0072C6;
			color: #fff;
			padding: 20px;
			position: sticky;
			top: 0;
			z-index: 100;
		}

		.header h1 {
			font-size: 36px;
			margin: 0;
			padding: 0;
		}

		.header nav {
			display: flex;
			align-items: center;
		}

		.header nav a {
			color: #fff;
			text-decoration: none;
			font-size: 18px;
			margin: 0 10px;
			padding: 10px;
			border-radius: 5px;
			transition: background-color 0.3s ease-in-out;
		}

		.header nav a:hover {
			background-color: #fff;
			color: #333;
		}

	

		main {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
			grid-gap: 20px;
			justify-items: center;
			}
			.product img {
				display: block;
				margin-left: auto;
				margin-right: auto;
				width: 40%;
				height: auto;
			}


			.container {
			display: grid;
			grid-template-columns: repeat(auto-fit, minmax(500px, 1fr));
			grid-gap: 20px;
			justify-content: center;
			align-content: center;
			}


			.product {
			display: flex;
			flex-direction: column;
			justify-content: space-between;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
			}
			.product:hover {
			box-shadow: 0 4px 8px rgba(0,0,0,0.4);
			}

			.product h2 {
			font-size: 24px;
			font-weight: 700;
			margin-bottom: 10px;
			}

			.product p {
			font-size: 16px;
			line-height: 1.5;
			margin-bottom: 20px;
			}

			.product button {
			background-color: #f39c12;
			color: #fff;
			font-size: 16px;
			font-weight: 700;
			padding: 10px 20px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			}

		.product button:hover {
			background-color: #fff;
			color: #333;
		}


		.footer {
			background-color: #0072C6;
			color: #fff;
			padding: 20px;
			text-align: center;
		}
		.footer p {
			margin: 0;
			padding: 0;
        }
        .footer a {
        color: #fff;
        text-decoration: none;
        margin-left: 10px;
        }


    </style>
</head>
<body>
	
		<header class="header">
			<h1>Storeal</h1>
		
			<nav id="main-nav">
				<a href="landingpage.html">Home</a>
				<a href="home.php">Dashboard</a>
				<a href="all_products.php">Products</a>
				<a href="wishlist.php">Wishlist</a>
				<a href="cart.php">Cart</a>
				<a href="auth.php">Login/Sign-up</a>
			</nav>
		</header>

    <?php include 'display_products.php'; ?>

    <footer class="footer">
        <p>&copy; 2023 Storeal. All rights reserved. | <a href="terms.html">Terms of Use</a> | <a href="privacy.html">Privacy Policy</a></p>
    </footer>
</body>
</html>