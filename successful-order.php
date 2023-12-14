<?php 
include 'core/init.php';
include 'includes/header.php'; ?>



<!DOCTYPE html>
<html>
<head>
    <title>Delayed Action</title>
 <script type="text/javascript">
        setTimeout(function() {
            window.location.href = 'index.php';
        }, 3000);
    </script>
</head>
<body>
   <div class="profile-container">
   <h1 class="succesful-order">Thank you for your order! :)</h1>
</div>
<?php
//Reset cart
$cart->resetCart();
?>
</body>
</html>


<?php include 'includes/footer.php'; ?>

