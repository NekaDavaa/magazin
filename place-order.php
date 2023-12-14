<?php 
include 'core/init.php';
//User obj
$user = new User();

//Payment test obj
$payment = new Payment();

//Validator obj
$validate = new Validator();

//Session Manager
$sessionManager = SessionManager::getInstance();
if (isset($_POST['place-order-button'])) {
	  $card_number = $_POST['cardNumber'];
      $cvv = $_POST['cvv'];
	if ($_POST['cardOption'] == "saved") {
		//TODO Set Order
		echo "Process payment with saved card";
	}
	elseif ($_POST['cardOption'] == "new") {
         if (isset($_POST['saveCard']) && $_POST['saveCard'] == "yes") {
            if ($_POST['savedCardName'] == "") {
            	//This is saved card with empty string
            	$sessionManager->setSession('notification', 'Saved card input cant be empty');
             	header('Location: shopping-cart.php');
    			exit();
            }
            else {
            	 //This is saved card with name
            	 if ($validate->isValidCard($card_number, $cvv) == true) {
             	//TODO setOrder
             }
             else {
             	$sessionManager->setSession('notification', 'Card details are wrong. 16 Digits for card number and 3 digits for CVV');
             	header('Location: shopping-cart.php');
    			exit();
             }
            }
        } else {
             if ($validate->isValidCard($card_number, $cvv) == true) {
             	//THis is new card payment with no save card
             	//TODO setOrder
             }
             else {
             	//THis is new card payment with no save card
             	$sessionManager->setSession('notification', 'Card details are wrong. 16 Digits for card number and 3 digits for CVV');
             	header('Location: shopping-cart.php');
    			exit();
             }
        }
	}
   

}



// if (isset($_POST['place-order-button'])) {
//      $user_id = $user->getUserID();
// 	 $card_number = $_POST['cardNumber'];
// 	 $cvv = $_POST['cvv'];
// 	$saved_card_name = $_POST['savedCardName'];
// 	 $payment->saveCard($user_id, $card_number, $cvv, $saved_card_name);
// 	 header('Location: shopping-cart.php');
// exit();
// } 

