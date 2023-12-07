<?php
class User { 
private $db;

public function __construct() {
	$this->db=new Database;
}

public function register($data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";


  //Insert query
  $this->db->query("INSERT INTO users (username, password, phone_number) VALUES (:username, :password, :phone_number)");
  
  //Bind params
  $this->db->bind(':username', $data['username']);
  $this->db->bind(':password', $data['password']);
  $this->db->bind(':phone_number', $data['phone_number']);
   
  //Execute
  $this->db->execute();

}
}