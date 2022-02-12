<?php
session_start();
print_r($_POST);
$user_id = $_SESSION['user']['id'];
$products_id = $_POST['id'];
$quantity = $_POST['quantity'];


echo $user_id . " " . $products_id . " " . $quantity;


$conn = new PDO("mysql:host=localhost;dbname=finalproject", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$stmt = $conn->prepare("INSERT INTO orders (users_id, products_id, quantity)
  VALUES (:users_id, :products_id, :quantity)");
$stmt->bindParam(':users_id', $user_id);
$stmt->bindParam(':products_id', $products_id);
$stmt->bindParam(':quantity', $quantity);
$stmt->execute();


$stmt = $conn->prepare("SELECT * FROM orders where users_id = $user_id");
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
print_r($products);


$_SESSION['successorder'] = true;

return header("location:index.php");
