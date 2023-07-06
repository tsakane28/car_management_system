<?php
// replace the database credentials with your own
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // check if the booking ID has been provided
    if (isset($_POST['booking_id'])) {
        $booking_id = $_POST['booking_id'];
        $approval_status = 2; // set the approval status to "rejected"

        // prepare the SQL query to update the approval status of the booking
        $sql = "DELETE FROM events WHERE id=$booking_id";

        // execute the query
        if (mysqli_query($con, $sql)) {
            echo "<p>The booking request has been rejected.</p>";
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }

    } else {
        echo "<p>Booking ID not provided.</p>";
    }
}

mysqli_close($con);
?>
