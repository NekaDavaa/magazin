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

        // Validate Card Details
    public function isValidCard($cardNumber, $cvv) {
        // Check card number length
        if (strlen($cardNumber) != 16) {
            return false;
        }
        // Check CVV length
        if (strlen($cvv) != 3) {
            return false;
        }
        return true;
    }
}