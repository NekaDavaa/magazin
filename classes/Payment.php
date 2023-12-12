<?php
class Payment {
    private $db;
    private $validator;

    public function __construct() {
        $this->db = new Database();
        $this->validator = new Validator();
    }

    public function saveCard($userId, $cardNumber, $cvv, $nameOfCard) {
        if ($this->validator->isValidCard($cardNumber, $cvv)) {
            // Prepare SQL Query
            $this->db->query("INSERT INTO payment_cards (card_number, cvv, name_of_card, user_id) VALUES (:card_number, :cvv, :name_of_card, :user_id)");
            // Bind values
            $this->db->bind(':card_number', $cardNumber);
            $this->db->bind(':cvv', $cvv);
            $this->db->bind(':name_of_card', $nameOfCard);
            $this->db->bind(':user_id', $userId);
            // Execute
            return $this->db->execute();
        }
        return false;
    }
}
