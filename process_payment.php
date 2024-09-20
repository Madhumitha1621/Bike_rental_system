<?php
session_start();
// Process payment logic here

// Assuming payment was successful, set session variable
$_SESSION['payment_success'] = true;

// Redirect back to update_password.php
header('Location: payment.php');
exit;
?>
