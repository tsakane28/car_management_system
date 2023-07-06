<?php
// replace the database credentials with your own
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

   // retrieve the booking ID and approval status from the form data
   $booking_id = $_POST['booking_id'];
   $approval_status = $_POST['approval_status'];

   // prepare the SQL query to update the booking approval status
   $sql = "UPDATE events SET approval = $approval_status WHERE id = $booking_id";

   // execute the query
   $result = mysqli_query($con, $sql);

   // check if the query was successful
   if ($result) {
      echo "Booking approved successfully!";
   } else {
      echo "Error updating booking status: " . mysqli_error($con);
   }
}
// Redirect to index.php
header("Location: admin.php");
exit;
?>
