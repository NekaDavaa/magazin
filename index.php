<?php 
include 'core/init.php';
include 'includes/header.php';
?>

 <div class="product-grid-container">
        <?php 
         $products = [1,2,3,4,5,6,7,8,9,10];
        foreach ($products as $product): ?>
            <div class="product-grid-item">
                <img src="https://w7.pngwing.com/pngs/853/610/png-transparent-christmas-and-holiday-season-merry-christmas-food-holidays-decor.png" alt="">
                <h5>H5 Heading</h5>
                <p>H6 Description</p>
                 <button class="buy-button">Buy Now</button>
            </div>
        <?php endforeach; ?>
    </div>

<?php include 'includes/footer.php'; ?>