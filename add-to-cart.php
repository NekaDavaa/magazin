<?php
include 'core/init.php';

$cart = new Cart();

if (isset($_GET['increase_quantity'])) {
    $productId = $_GET['increase_quantity'];
    $cart->increaseQuantity($productId);
    header('Location: shopping-cart.php');
    exit();
} elseif (isset($_GET['decrease_quantity'])) {
    $productId = $_GET['decrease_quantity'];
    $cart->decreaseQuantity($productId);
    header('Location: shopping-cart.php');
    exit();
} else {
    $productId = $_POST['product_id'];
    $productTitle = $_POST['product_title'];
    $productImage = $_POST['product_image'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $cart->addItem($productId, $productTitle, $productImage, $quantity, $price);
}

header('Location: index.php');
exit();
?>
