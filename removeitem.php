<?php
include 'core/init.php';
$cart = new Cart();
$productId = $_GET['product_id'];
$cart->removeItem($productId);
header('Location: shopping-cart.php');
exit();
?>
