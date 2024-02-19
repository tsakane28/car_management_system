<?php
session_start(); // Start the session at the beginning of the script
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
     $sql = "UPDATE vehicle_logs SET approval = $approval_status WHERE id = $booking_id";
  
     // execute the query
     $result = mysqli_query($con, $sql);
  
     // Assuming you have your database connection $con and your operation logic here
     if ($result) {
         // If operation was successful, set a success message
         $_SESSION['message'] = "Booking approved successfully!";
     } else {
         // If operation failed, set an error message
         $_SESSION['message'] = "Error updating booking status: " . mysqli_error($con);
     }
  
     // Redirect to admin.php
     header('Location: admin.php');
     exit();
  }
?>
