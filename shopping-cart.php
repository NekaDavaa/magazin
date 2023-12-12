<?php 
include 'core/init.php';
include 'includes/header.php'; 
$cart = new Cart();
$user = new User();
?>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form action="/submit-order" method="post">
            <div class="billing-info">
            <h3>Billing Information</h3>
            <p>Username: <i><?php echo $user->getUsername(); ?></i></p>
            <p>Phone Number: <i><?php echo $user->getPhoneNumber(); ?></i></p>
            </div>
          <div class="order-summary">
    <h3>Order Summary</h3>
<?php 
if (!empty($cart->getCartItems())) {
foreach ($cart->getCartItems() as $productId => $productInCart): ?>
    <div class='item'>
        <img src='<?php echo $productInCart['product_image']; ?>' class='product-image'>
        <div class="product-info">
            <p class="product-title"><?php echo $productInCart['product_title']; ?></p>
            <p class="product-price"><?php echo $productInCart['price']; ?> lv.</p>
        </div>
        <div class="quantity-modify-wrapper">
            <a href='add-to-cart.php?decrease_quantity=<?php echo $productId; ?>' class='quantity-modify decrease'>-</a>
            <span class='quantity'><?php echo $productInCart['quantity']; ?></span>
            <a href='add-to-cart.php?increase_quantity=<?php echo $productId; ?>' class='quantity-modify increase'>+</a>
        </div>
        <a href='removeItem.php?product_id=<?php echo $productId; ?>' class='remove-item'>Remove item</a>
    </div>
<?php endforeach; }
else {
    echo "<i>Cart is empty</i>";
}
?>
</div>
             <div class="payment-info">
                <h3>Payment Information</h3>
                <div class="payment-choice">
                <label>
                    <input type="radio" name="cardOption" value="saved" onclick="toggleCardInput('saved')" checked>
                    Use Saved Card
                </label>
                <label>
                    <input type="radio" name="cardOption" value="new" onclick="toggleCardInput('new')">
                    Add New Card
                </label>
            </div>
              <div id="saved-card-info" style="display: block;">
    <!-- Add foreach between labels -->
    <label class="card-network-label">
        <input type="radio" name="savedCard" value="card1" checked>
        <img src="https://image.pngaaa.com/837/176837-middle.png" class="card-network-logo" alt="Visa" /> <span>**** **** **** 1234</span>
        <p>My first card</p>
    </label>
</div>
                <div id="new-card-info" style="display: none;">
    <input type="text" name="cardNumber" placeholder="Card Number">
     <!-- EXPIRY DATE START -->
    <?php
    $currentMonth = 1;
    $currentYear = 2024; 
// Month selection
echo '<div class="expiry-date-wrapper">';
echo '<label for="expiry-date">Expiry Date:</label>';
echo '<div class="expiry-date-selects">';
echo '<label for="month">Month:</label>';
echo '<select name="month" id="month">';
for ($m = $currentMonth; $m <= 12; $m++) {
    echo "<option value='$m'>$m</option>";
}
echo '</select>';
// Year selection
echo '<label for="year">Year:</label>';
echo '<select name="year" id="year">';
for ($y = $currentYear; $y <= $currentYear + 10; $y++) { 
    echo "<option value='$y'>$y</option>";
}
echo '</select>';
echo '</div>';
echo '</div>';
   ?>
     <!-- EXPIRY DATE END -->
    <input type="text" name="cvv" placeholder="CVV">
    <label>
    <input type="checkbox" id="saveCard" name="saveCard" value="yes">
    Save this card for future use
    </label>
    <div id="cardNameField" style="display: none;">
    <input type="text" id="savedCardName" name="savedCardName" placeholder="Name this card (e.g., 'My Visa Card')">
    </div>
</div>
</div>
<button type="submit" class="place-order-button">
    Place Order <span class="total-price">Total: <?php echo $cart->getTotalPrice() . " lv.";?></span>
</button>
        </form>
    </div>
    <script type="text/javascript">
        function toggleCardInput(option) {
            var savedCardInfo = document.getElementById('saved-card-info');
            var newCardInfo = document.getElementById('new-card-info');
            savedCardInfo.style.display = option === 'saved' ? 'block' : 'none';
            newCardInfo.style.display = option === 'new' ? 'block' : 'none';
        }
      document.addEventListener('DOMContentLoaded', function() {
    var checkBox = document.getElementById('saveCard');
    var cardNameField = document.getElementById('cardNameField');

    checkBox.addEventListener('change', function() {
        if (this.checked) {
            cardNameField.style.display = 'block';
        } else {
            cardNameField.style.display = 'none';
        }
    });
});
    </script>
<?php include 'includes/footer.php'; ?>