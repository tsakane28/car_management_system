<?php
session_start(); // Start the session at the very beginning

// replace the database credentials with your own
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // check if the booking ID has been provided
    if (isset($_POST['booking_id'])) {
        $booking_id = $_POST['booking_id'];
        $approval_status = 2; // Assuming you're setting a status for some reason

        // prepare the SQL query to delete the booking
        $sql = "DELETE FROM vehicle_logs WHERE id = $booking_id";

        // execute the query
        if (mysqli_query($con, $sql)) {
            $_SESSION['snackbar_message'] = "The booking request has been rejected.";
        } else {
            $_SESSION['snackbar_message'] = "Error updating record: " . mysqli_error($con);
        }
        header('Location: admin.php'); // Redirect to the page where you want to show the snackbar
        exit();
    } else {
        $_SESSION['snackbar_message'] = "Booking ID not provided.";
        header('Location: admin.php'); // Adjust the redirection as necessary
        exit();
    }
}

mysqli_close($con);
?>
