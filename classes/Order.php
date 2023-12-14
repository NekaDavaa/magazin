<?php
class Order {
    private $db;
    private $data;
    private $user;

    public function __construct() {
        $this->db = new Database();
        $this->user = new User();
    }

    public function loadData(array $data) {
        $this->data = $data;
    }

    public function save() {
        $query = "INSERT INTO `orders` (order_id, order_date, order_amount, order_by, order_status) VALUES (:order_id, :order_date, :order_amount, :order_by, :order_status)";
        
        $this->db->query($query);
        $this->db->bind(':order_id', $this->data['order_id']);
        $this->db->bind(':order_date', $this->data['order_date']);
        $this->db->bind(':order_amount', $this->data['order_amount']);
        $this->db->bind(':order_by', $this->data['order_by']);
        $this->db->bind(':order_status', $this->data['order_status']);

        return $this->db->execute();
    }

    public function getUserOrders() {
        if ($this->user->isLogged()) {
        $userID = $this->user->getUserID();
        $this->db->query("SELECT * FROM orders WHERE order_by = :user_id");
        $this->db->bind(':user_id', $userID);
        $rows = $this->db->resultset();
        return $rows;
        }
        else {
        return array();
        }
    }
      public function countUserOrders() {
        if ($this->user->isLogged()) {
            $orders = $this->getUserOrders();
        return count($orders);
    }
    }
}
