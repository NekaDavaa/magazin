<?php
class User { 
private $db;

public function __construct() {
	$this->db=new Database;
}

public function register($data) {
  //Insert query
  $this->db->query("INSERT INTO users (username, password, phone_number) VALUES (:username, :password, :phone_number)");
  
  //Bind params
  $this->db->bind(':username', $data['username']);
  $this->db->bind(':password', $data['password']);
  $this->db->bind(':phone_number', $data['phone_number']);
   
  //Execute
  $this->db->execute();

}

public function login($data) {
     
     //Select Query
     $this->db->query("SELECT * FROM users WHERE username = :username AND password = :password");
     //Bind params
     $this->db->bind(':username', $data['username']);
     $this->db->bind(':password', $data['password']);

     //Fetch the reuslt (Should be one)
     $row = $this->db->single();
     if ($this->db->rowCount() > 0) {
           $sessionManager = SessionManager::getInstance();
            $sessionManager->setSession('User', ['id' => $row->id, 'username' => $data['username']]);
           $sessionManager->setSession('notification', "You have successfully logged in.");
     } 
}


public function isLogged() {
        $sessionManager = SessionManager::getInstance();
       if (!$sessionManager->getSessionData("User") == NULL) {
          return true;
       }
      return false;
   }

 public function logout() {
    $sessionManager = SessionManager::getInstance();
    $sessionManager->unsetSession("User");
 }
   
}