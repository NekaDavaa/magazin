<?php
//Start Session
session_start();

//Include Configuration
require_once('config/config.php');



//Helper Function Files
//require_once('classes/User.php');


//Autoload Classes
function my_autoloader($class_name) {
    require_once('classes/' . $class_name . '.php');
}

spl_autoload_register('my_autoloader');
