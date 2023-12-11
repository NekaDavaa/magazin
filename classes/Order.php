<?php
class Order {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function createOrder($userId, $amount, $status = 'Paid') {
        $this->db->query("INSERT INTO orders (user_id, amount, status, order_date) VALUES (:user_id, :amount, :status, NOW())");

        // Bind params
        $this->db->bind(':user_id', $userId);
        $this->db->bind(':amount', $amount);
        $this->db->bind(':status', $status);

        // Execute
        if($this->db->execute()) {
            return $this->db->lastInsertId(); // Returns the order ID of the newly created order
        } else {
            return false;
        }
    }

    public function getOrder($orderId) {
        $this->db->query("SELECT * FROM orders WHERE id = :order_id");
        $this->db->bind(':order_id', $orderId);

        $row = $this->db->single();
        return $row;
    }

    public function getUserOrders($userId) {
        $this->db->query("SELECT * FROM orders WHERE user_id = :user_id ORDER BY order_date DESC");
        $this->db->bind(':user_id', $userId);

        $results = $this->db->resultSet();
        return $results;
    }
}
