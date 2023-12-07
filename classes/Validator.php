<?php
class Validator {
     
     public function __construct() {

     }
        
     //Required array        
	 public function isRequired($field_array){
		foreach($field_array as $field){
			if($_POST[''.$field.''] == ''){
				return false;
			}
		}
		return true;
	 }
}