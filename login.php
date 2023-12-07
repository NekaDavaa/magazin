<!-- START BACK END -->
<?php 
include 'core/init.php';
include 'includes/header.php';
?>
<?php 
//Create User object
$user = new User();

//Create Validator object
$validate = new Validator();

//Take given data from user
if (isset($_POST['submit'])) {
    //Store given data from user into array
    $data = array();
    $data['username'] = $_POST['username'];
    $data['password'] = md5($_POST['password']);
    //Validate the array
    $field_array = array('username', 'password');

    if ($validate->isRequired($field_array)) {
        $user->login($data);
    }
}
?>
<!-- END BACK END -->

<!-- START FRONT END -->

<div class="user-system-container">
    <div class="user-system-item">
        <h1>Login</h1>
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
            <?php 
            if (isset($_POST['submit'])) {
            if (!$validate->isRequired($field_array)) {
            echo "<span class='alert alert-danger' role='alert'>Please fill in all fields</span>";}}?> 
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Login"/>
        </form>
    </div>
</div>
<!-- END FRONT END -->
<?php include 'includes/footer.php'; ?>