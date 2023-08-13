<?php
    session_start();

    if(isset($_GET["product_id"])) {
        $product_id = $_GET["product_id"];
        if (($key = array_search($product_id, $_SESSION["wishlist"])) !== false) {
            unset($_SESSION["wishlist"][$key]);
        }
        
        if (empty($_SESSION["wishlist"])) {
            header("Location: home.php"); // Redirect to a page indicating an empty wishlist
        } else {
            header("Location: wishlist.php"); // Redirect back to the wishlist
        }
        exit();
    }
?>
