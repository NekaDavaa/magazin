<!-- START BACK END -->
<?php 
include 'core/init.php';
include 'includes/header.php';
?>
<?php 
//Create Database Object
$db = new Database();

//Create User object
$user = new User();

//Create Validator object
$validate = new Validator();
if (isset($_POST['submit'])) {
    //Store given data from user into array
    $data = array();
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['phone_number'] = $_POST['phone_number'];
    //Validate the array
    $field_array = array('username', 'password', 'phone_number');

    if ($validate->isRequired($field_array)) {
        echo "if entered";
    }
}
?>
<!-- END BACK END -->

<!-- START FRONT END -->
<div class="user-system-container">
    <div class="user-system-item">
         <h1>Register</h1>
        <form class="user-system-flex" method="POST">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username"/>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password"/>
            </div>
            <div class="input-group">
                <label for="phone">Phone</label>
                <input type="number" name="phone_number" id="phone_number"/>
            </div>
              <div class="input-group">
            <?php 
            if (isset($_POST['submit'])) {
            if (!$validate->isRequired($field_array)) {
            echo "<span class='alert alert-danger' role='alert'>Please fill in all fields</span>";}}?> 
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
        </form>
    </div>
</div>
<!-- END FRONT END -->
<?php include 'includes/footer.php'; ?>