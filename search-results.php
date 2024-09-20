<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}
// Continue with the rest of your search logic here...
?>