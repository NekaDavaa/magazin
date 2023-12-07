<?php 
include 'core/init.php';
include 'includes/header.php';
//User object
$user = new User();
?>

 <div class="product-grid-container">
        <?php 
         $products = [1,2,3,4,5,6,7,8,9,10];
        foreach ($products as $product): ?>
            <div class="product-grid-item">
                <img src="https://w7.pngwing.com/pngs/853/610/png-transparent-christmas-and-holiday-season-merry-christmas-food-holidays-decor.png" alt="">
                <h3>Product name</h3>
                 <?php if ($user->isLogged()) : ?>
                 <p>5.00lv.</p>
                 <button class="buy-button">Buy Now</button>
             <?php else : ?>
             	<p class="text-danger">Please log in to see prices</p>
             <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </div>

<?php include 'includes/footer.php'; ?>