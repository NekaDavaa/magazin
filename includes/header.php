<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title><?php echo SITE_NAME; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link rel="stylesheet" href="styles/main.css">
</head>
<body>
	<div class="header">
      <div class="website-logo">
                  <a href="../magazin"><?php echo SITE_NAME; ?></a>
      </div>
      <div class="profile">
            <?php 
            //User object
            $user = new User(); 
            //Logout logic
            if (isset($_GET['action']) && $_GET['action'] == 'logout') {
                  if ($user->isLogged()) {
                        $user->logout();
                        $sessionManager = SessionManager::getInstance();
                        $sessionManager->setSession('logoutnotification', "You have successfully logged out.");
                        header("Location: login.php");
                        exit;
                  }
            }
            //Display logout button
            if ($user->isLogged()) : ?>
            <div class="right-side-wrapper">
            <a href="shopping-cart.php">
            <div class="mini-header-cart btn-primary btn-lg">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  <span class="cart-count">0</span>
            </div>
            </a>
            <div class="logout btn-danger btn-lg" >
                  <i class="fa fa-power-off" aria-hidden="true"></i>
                  <a href="?action=logout">Log out</a>
            </div>
      </div>
            <?php else :?>
            <div class="login">
            	<a href="login.php" class="btn-primary btn-lg">Login</a>
            </div>
            <div class="register">
            	<a href="register.php" class="btn-warning btn-lg">Register</a>
            </div>
      <?php endif; ?>
      </div>
	</div>