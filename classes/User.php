<?php
class User { 
private $db;

public function __construct() {
	$this->db=new Database;
}

public function register($username, $password, $phone_number) {
   //echo $username;
   //echo $password;
   //echo $phone_number;
}
}