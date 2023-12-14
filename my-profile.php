<?php 
include 'core/init.php';
include 'includes/header.php'; 
$fluid_message = "";
//Order obj
$all_order = new Order();
//User obj
$user = new User();
$user_orders = $all_order->getUserOrders();
$counted_user_orders = $all_order->countUserOrders();
$fluidMeterValue = $counted_user_orders + 1; 
switch ($fluidMeterValue) {
    case '2':
    $fluid_message = "2 Orders left to your free delivery :)";
    break;

    case '3':
    $fluid_message = "1 Orders left to your free delivery :)";
    break;

    case '4':
    $fluid_message = "Claim your reward :)";
    break;
      default: 
      $fluid_message = "3 Orders left to your free delivery :)";
}

?>
  <script src="fluid.js"></script>
  <div class="profile-container">
        <h1>Your Profile</h1>
        <div class="profile-info">
            <div class="profile-header">
            <div class="profile-name-phone">
            <p>Name: <?php echo $user->getUsername(); ?></p>
            <p>Phone: <?php echo $user->getPhoneNumber(); ?></p>
            </div>
            <div class="fluid-wrapper">
            <div id="fluid-meter"></div>
            <p><?php echo $fluid_message; ?></p>
            </div>
            </div>
        <div class="order-history">
            <h2>Order History</h2>
            <table>
 <?php if (empty($user_orders)): ?>
    <i>Make your first order :)</i>
<?php else: ?>
     <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
    <?php foreach ($user_orders as $order) : ?>
                    <tr>
                    <td><?php echo $order->order_id; ?></td>
                    <td><?php echo $order->order_date; ?></td>
                    <td><?php echo $order->order_amount; ?></td>
                    <td>Paid</td>
                    </tr>
<?php endforeach; ?>
<?php endif; ?>

               
            </table>
        </div>
 <script type="text/javascript">
    var fm = new FluidMeter();
    fm.init({
        targetContainer: document.getElementById("fluid-meter"),
    });
    fm.setPercentage(<?php echo $fluidMeterValue; ?>);
</script>
    </div>
<?php include 'includes/footer.php'; ?>