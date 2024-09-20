<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pickup_location = $_POST['pickup_location'];
    $pickup_drop_time = $_POST['pickup_drop_time'];

    // Process the form data as needed (e.g., save to database, perform actions)
    // Example:
    // echo "Pickup Location: " . $pickup_location . "<br>";
    // echo "Pickup and Drop Time: " . $pickup_drop_time . "<br>";

    // Redirect after processing
    // header("Location: success_page.php");
    // exit();
}
?>
