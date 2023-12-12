<?php
class Order {
    private $db;
    private $user;
    private $cart;

    public function __construct() {
        $this->db = new Database();
        $this->user = new User();
        $this->cart = new Cart();
    }

    public function createOrder()
}