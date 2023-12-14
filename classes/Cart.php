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

     public function increaseQuantity($productId) {
        $cart = $this->getCartItems();
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
            $this->setCartItems($cart);
        }
    }

    public function decreaseQuantity($productId) {
        $cart = $this->getCartItems();
        if (isset($cart[$productId]) && $cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity'] -= 1;
            $this->setCartItems($cart);
        } else {
            $this->removeItem($productId);
        }
    }

    public function getTotalItemCount() {
        $cart = $this->getCartItems();
        $totalItemCount = 0;

        if ($cart) {
            foreach ($cart as $item) {
                $totalItemCount += $item['quantity'];
            }
        }
        return $totalItemCount;
    }
    public function resetCart() {
    $cartSessionKey = $this->getCartSessionKey();
    if ($cartSessionKey) {
        $this->sessionManager->setSession($cartSessionKey, []);
    }
}

   public function getTotalPriceForProduct($productId) {
        $cart = $this->getCartItems();
        if (isset($cart[$productId])) {
            return $cart[$productId]['quantity'] * $cart[$productId]['price'];
        }
        return 0;
    }

}