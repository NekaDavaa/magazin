<?php 
include 'core/init.php';
include 'includes/header.php';
//User object
$user = new User();
//Product object
$prod = new Product();
$prod->loadFromXml("magazin_bg_products_new.xml");
//Cart object
$cart = new Cart();
?>
<div class="cart-debugging">




</div>


  <!-- Main FE dont DELETE -->
 <div class="product-grid-container">
        <?php  
          // echo "<pre>";
          // var_dump($prod->getAllProducts());
          // echo "</pre>";

        foreach ($prod->getAllProducts() as $product): ?>
            <div class="product-grid-item">
                <img src="<?php echo $product->product_image; ?>" alt="">
                <h3><?php echo $product->product_title; ?></h3>


                 <?php if ($user->isLogged()) : ?>
                 <p class="product-price"><?php echo $product->product_price; ?> lv.</p>
<form action="add-to-cart.php" method="post">
<input type="hidden" name="product_id" value="<?php echo $product->product_sku; ?>">
<input type="hidden" name="product_title" value="<?php echo $product->product_title; ?>">
<input type="hidden" name="product_image" value="<?php echo $product->product_image; ?>">
<input type="hidden" name="quantity" value="1"> 
<input type="hidden" name="price" value="<?php echo $product->product_price; ?>">
<button type="submit" class="buy-button">Buy Now</button>
</form>

             <?php else : ?>
             	<p class="text-danger">Please log in to see prices</p>
             <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php include 'includes/footer.php'; ?>