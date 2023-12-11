<?php
class Cart {
    private $sessionManager;
    private $userSessionKey = 'User';
    private $cartSessionKeyPrefix = 'cart_items_'; 

    public function __construct() {
        $this->sessionManager = SessionManager::getInstance();
    }

  private function getCartSessionKey() {
    $user = $this->sessionManager->getSessionData($this->userSessionKey);
    if ($user && isset($user['id'])) {
        return $this->cartSessionKeyPrefix . $user['id'];
    }
    return null;
}


    public function addItem($productId, $productTitle, $productImage, $quantity, $price) {
        $cartSessionKey = $this->getCartSessionKey();
        if (!$cartSessionKey) {
            return; 
        }

        $cart = $this->getCartItems() ?? [];
        $cart[$productId] = [
             'product_title' => $productTitle,
            'product_image' => $productImage,
            'quantity' => $quantity,
            'price' => $price
        ];
        $this->setCartItems($cart);
    }

    public function removeItem($productId) {
        $cartSessionKey = $this->getCartSessionKey();
        if (!$cartSessionKey) {
            return; 
        }

        $cart = $this->getCartItems();
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $this->setCartItems($cart);
        }
    }

    public function getCartItems() {
        $cartSessionKey = $this->getCartSessionKey();
        return $cartSessionKey ? $this->sessionManager->getSessionData($cartSessionKey) : null;
    }

    private function setCartItems($cart) {
        $cartSessionKey = $this->getCartSessionKey();
        if ($cartSessionKey) {
            $this->sessionManager->setSession($cartSessionKey, $cart);
        }
    }

    public function getTotalPrice() {
        $cart = $this->getCartItems();
        if (!$cart) {
            return 0;
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }
        return $total;
    }

    



    

    /* Cart functions end */

    /*
    public function checkout() {
        $user = $this->sessionManager->getSessionData('User');
        if (!$user) {
            // Handle the case where the user is not logged in
            return false;
        }

        $order = new Order();
        $totalPrice = $this->getTotalPrice();
        
        // Create an order and get the order ID
        $orderId = $order->createOrder($user['id'], $totalPrice);
        
        if ($orderId) {
            // Clear the cart items after successful checkout
            $this->setCartItems([]);
            return $orderId;
        } else {
            return false; // Checkout failed
        }
    }
    */
 
}