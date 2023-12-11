<?php 
include 'core/init.php';
include 'includes/header.php'; ?>

  <div class="profile-container">
        <h1>Your Profile</h1>
        <div class="profile-info">
         
            <p>Name: John Doe</p>
            <p>Phone: +359 88 271 1930</p>
     
        </div>
        <div class="order-history">
            <h2>Order History</h2>
            <table>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
                
                <tr>
                    <td>123456</td>
                    <td>2023-01-01</td>
                    <td>$100.00</td>
                    <td>Completed</td>
                </tr>
            </table>
        </div>
    </div>
<?php include 'includes/footer.php'; ?>