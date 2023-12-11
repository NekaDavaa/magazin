<?php 
include 'core/init.php';
include 'includes/header.php'; ?>
    <div class="checkout-container">
        <h2>Checkout</h2>
        <form action="/submit-order" method="post">
            <div class="billing-info">
                <h3>Billing Information</h3>
                <input type="text" name="name" placeholder="Full Name">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="city" placeholder="City">
            </div>
          <div class="order-summary">
    <h3>Order Summary</h3>
    <div class="item">
        <img src="https://dummyimage.com/193x129.png/cc0000/ffffff" alt="Item 1" class="product-image">
        <p>Item 1 - $10</p>
        <a href="#" class="quantity-modify decrease">-</a>
        <span class="quantity">1</span>
        <a href="#" class="quantity-modify increase">+</a>
        <a href="#">Remove item</a>
    </div>
    <div class="item">
        <img src="https://dummyimage.com/193x129.png/cc0000/ffffff" alt="Item 2" class="product-image">
        <p>Item 2 - $20</p>
        <a href="#" class="quantity-modify decrease">-</a>
        <span class="quantity">1</span>
        <a href="#" class="quantity-modify increase">+</a>
        <a href="#">Remove item</a>
    </div>
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
    <input type="text" name="expDate" placeholder="Expiry Date">
    <input type="text" name="cvv" placeholder="CVV">
    <input type="text" name="savedCardName" placeholder="Name this card (e.g., 'My Visa Card')">
    <label>
        <input type="checkbox" name="saveCard" value="yes">
        Save this card for future use
    </label>
</div>
</div>
<button type="submit" class="place-order-button">
    Place Order <span class="total-price">Total: $30</span>
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
    </script>
<?php include 'includes/footer.php'; ?>