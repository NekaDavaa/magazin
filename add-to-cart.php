<?php
include 'core/init.php';

$cart = new Cart();


$productId = $_POST['product_id'];
$productTitle = $_POST['product_title'];
$productImage = $_POST['product_image'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];


$cart->addItem($productId, $productTitle, $productImage, $quantity, $price);


header('Location: index.php');
exit();
?>
