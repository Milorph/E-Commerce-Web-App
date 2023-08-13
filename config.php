<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

try {
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
	exit();
}
