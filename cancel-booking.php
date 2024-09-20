<?php
session_start();
include('includes/config.php');

if(strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if(isset($_GET['bookingId'])) {
        $bookingId = intval($_GET['bookingId']);
        $useremail = $_SESSION['login'];

        $sql = "UPDATE tblbooking SET Status = 2 WHERE id = :bookingId AND userEmail = :useremail AND Status = 0";
        $query = $dbh->prepare($sql);
        $query->bindParam(':bookingId', $bookingId, PDO::PARAM_INT);
        $query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $query->execute();

        if($query->rowCount() > 0) {
            $_SESSION['msg'] = "Booking cancelled successfully!";
        } else {
            $_SESSION['msg'] = "Unable to cancel booking. Either the booking is already confirmed or you do not have permission.";
        }
    }
    header('location:my-booking.php');
}
?>
