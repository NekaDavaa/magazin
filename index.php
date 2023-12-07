<?php 
include 'core/init.php';
include 'includes/header.php';
?>

<?php

$sessionManager = SessionManager::getInstance();
var_dump ($sessionManager->getSessionData("User"));

?>


<?php include 'includes/footer.php'; ?>