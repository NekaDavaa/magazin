<?php 
include 'core/init.php';
include 'includes/header.php';
?>

<div class="user-system-container">
    <div class="user-system-item">
         <h1>Register</h1>
        <form class="user-system-flex">
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
            <input type="submit" name="submit" class="btn btn-primary" value="Register"/>
        </form>
    </div>
</div>

<?php include 'includes/footer.php'; ?>