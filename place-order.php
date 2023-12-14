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

//Order obj
$order = new Order();

//Cart obj
$cart = new Cart();

if (isset($_POST['place-order-button'])) {
	  //Empty Cart 
	  if (empty($cart->getCartItems())) {
	  $sessionManager->setSession('notification', 'Cart is empty');
      header('Location: shopping-cart.php');
      exit();
	   }
	   else {
	   	//Cart with items
	   $card_number = $_POST['cardNumber'];
      $cvv = $_POST['cvv'];
	  $choosen_saved_card = $_POST['savedCard'];
	  $total_cart_price = $_POST['TotalCartPrice'];
	  $rand_digits = rand(100000, 999999);
	  $current_date = date("d.m.Y");
	  $user_id = $user->getUserID();
	  
    $order_data =[
     'order_id' => "$rand_digits",
     'order_date' => "$current_date",
     'order_amount' => "$total_cart_price",
     'order_by' => "$user_id",
     'order_status' => 'Paid'
    ];
 
          

   

	if ($_POST['cardOption'] == "saved") {
		if ($payment->isCardSelected($choosen_saved_card) == true) {
		$order->loadData($order_data);
        $result = $order->save();
        if ($result) {
    	sleep(2);
    	header('Location: successful-order.php');
    	exit();

		} else {
    	$sessionManager->setSession('notification', 'Error saving order');
      header('Location: shopping-cart.php');
      exit();}
		}
        else {
        		$sessionManager->setSession('notification', 'The saved card is not valid');
             	header('Location: shopping-cart.php');
    			exit();
        }
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
             	$order->loadData($order_data);
				$result = $order->save();
				if ($result) {
				sleep(2);
				header('Location: successful-order.php');
				exit();
				} else {
				$sessionManager->setSession('notification', 'Error saving order');
				header('Location: shopping-cart.php');
				exit();}
             }
             else {
             	$sessionManager->setSession('notification', 'Card details are wrong. 16 Digits for card number and 3 digits for CVV');
             	header('Location: shopping-cart.php');
    			exit();
             }
            }
        } else {
             if ($validate->isValidCard($card_number, $cvv) == true) {
             $order->loadData($order_data);
				$result = $order->save();
				if ($result) {
				sleep(2);
				header('Location: successful-order.php');
				exit();
				} else {
				$sessionManager->setSession('notification', 'Error saving order');
				header('Location: shopping-cart.php');
				exit();}
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
}