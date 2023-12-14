<?php
class Payment {
    private $db;
    private $validator;
    private $user;

    public function __construct() {
        $this->db = new Database();
        $this->validator = new Validator();
        $this->user = new User();
    }

    public function saveCard($userId, $cardNumber, $cvv, $nameOfCard) {
        if ($this->validator->isValidCard($cardNumber, $cvv)) {
            // Prepare SQL Query
            $this->db->query("INSERT INTO cards (card_number, cvv, name_of_card, user_id) VALUES (:card_number, :cvv, :name_of_card, :user_id)");
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
    public function getAllUserCards() {
      if ($this->user->isLogged()) {
        $userID = $this->user->getUserID();
        $this->db->query("SELECT * FROM cards WHERE user_id = :user_id");
        $this->db->bind(':user_id', $userID);
        $rows = $this->db->resultset();
        return $rows;
      }
      else {
        return array();
      }
    }
     
     public function isCardSelected($selectedCardId) {
        $cards = $this->getAllUserCards();
        
        var_dump($cards);

        // foreach ($cards as $card) {
        //     if ($card->id == $selectedCardId) { // Assuming 'id' is the identifier of the card
        //         return true;
        //     }
        // }
        // return false;
    }

}