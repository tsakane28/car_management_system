<?php

include 'connect.php';

if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
   header('location:login.php');
}

$select_profile = $con->prepare("SELECT * FROM `users` WHERE id = ?");
$select_profile->execute([$user_id]);
$result = $select_profile->get_result();
$fetch_profile = $result->fetch_assoc();

?>
<!DOCTYPE html>
<html>
<head>
<title>Event Registration Form</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
        /* Set default font family and colors */
body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: #37475e;
	margin: 0;
	padding: 0;
}

.booking-form-container {
    max-width: 100vw;
    margin: 0 auto;
    padding: 20px;
    background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/investors.jpg');
    background-size: cover;
    background-position: center;
    border: none;
    font-size: 14px;
    color: #fff;
}
a {
  text-decoration: none;
  color: #000;
}
.booking-form-container h1 {
    font-size: 18px;
    margin-bottom: 10px;
}
button{
    background-color: #1d9cd9;
    border:none;
    width: 10em; /* Add this line */
    height: 3em; /* Add this line */
    margin: 1em;
    border-radius:50px;
    cursor: pointer;
    font-weight:bold;
}
button:hover {
    background-color: #37475e;
	color:white;
}
.booking-form-container label {
    display: block;
    margin-bottom: 10px;
}

.booking-form-container input[type="text"],
.booking-form-container select {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: none;
    box-sizing: border-box;
    margin-bottom: 10px;
}

.booking-form-container button[type="submit"] {
    background-color: #1d9cd9;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-weight:bold;
}

.admin-aside {
    max-width: 100vw;
    margin: 2em;
    padding: 20px;
    background-color: white;
    border: none;
    border-radius:20px;
    font-size: 14px;
}

.admin-aside h2 {
    font-size: 28px;
    margin-bottom: 10px;
}

.admin-aside table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}
.booking-form-container h1{
    font-size: 3em;
}
.admin-aside th {
    text-align: left;
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

.admin-aside td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

.admin-aside .approve-btn,
.admin-aside .approve-btn,
.admin-aside .reject-btn {
    display: inline-block;
    padding: 8px 16px;
    margin: 0.5em; /* Increase the margin-right value to create a gap */
    font-size: 14px;
    font-weight:bold;
    color: black;
    background-color: #1d9cd9;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    border-radius:50px;
    width: calc(50% - 2.5px); /* Add this line */
}


.admin-aside .reject-btn {
    background-color: #red;
    font-weight:bold;
}
.admin-aside .cancel-btn {
    background-color: #red;
    font-weight:bold;
}
.content {
  position: fixed;
  top: 0;
  right: 0;
  z-index: 9999;
  margin: 1em;
}

.box {
  background-color: transparent;
  margin-bottom: 20px;
}

.box h3 {
  font-size: 24px;
  margin-bottom: 10px;
  text-align: center;
  color:white;
}

.box h3 span {
  color: #007bff;
}

.flex-btn {
  display: flex;
  justify-content: center;
  margin-bottom: 10px;
}

.btn {
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  padding: 10px 20px;
  margin-right: 10px;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn:hover {
  background-color: #0062cc;
}

.delete-btn {
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 14px;
  padding: 10px 20px;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.delete-btn:hover {
  background-color: #c82333;
}

</style>
<script>
    function reloadPage() {
        location.reload();
    }
</script>
<body>
<div class="content">

<div class="box">
   <h3>welcome : <span><?= $fetch_profile['name']; ?></span></h3>
   <div class="flex-btn">
      <a href="logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">Logout</a>
   </div>
</div>

</div>
    <div class="booking-form-container">
        <h1>Sabre Events Admin Panel</h1>
        <a href="schedule.php"><button>Schedule</button></a>
        <a href="room.php"><button>Monthly Calender</button></a>
        <button onclick="reloadPage()">Update</button>
        <form method="POST" action="process_form.php">
            <!-- Booking form fields -->
        </form>
    </div>

    <?php
    // replace the database credentials with your own
    $con = mysqli_connect("localhost", "root", "", "sabre");

    // check if the connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
     
       // prepare the SQL query to retrieve all bookings
      $sql = "SELECT * FROM events";

        // execute the query
        $result = mysqli_query($con, $sql);

        // check if there are any rows returned
        if (mysqli_num_rows($result) > 0) {
            // display a table of pending and approved bookings
            echo "<div class='admin-aside'>";
            echo "<h2>Booking Requests</h2>";
            echo "<table>";
            echo "<thead><tr><th>Company Name</th><th>Event Type</th><th>Event Date</th><th>Booking Status</th><th>Actions</th></tr></thead>";
            echo "<tbody>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['company_name'] . "</td>";
                echo "<td>" . $row['event_type'] . "</td>";
                echo "<td>" . $row['event_date'] . "</td>";
                echo "<td>";
                if ($row['approval'] == 0) {
                    // If the booking is pending, display "Pending"
                    echo "Pending";
                } else if ($row['approval'] == 1) {
                    // If the booking has been approved, display "Approved"
                    echo "Approved";
                } else if ($row['approval'] == 2) {
                    // If the booking has been rejected, display "Rejected"
                    echo "Rejected";
                }
                echo "</td>";
                echo "<td>";
                if ($row['approval'] == 0) {
                    // If the booking is pending, generate a form with "Approve" and "Reject" buttons
                    echo "<form method='POST' action='approve_booking.php'>";
                    echo "<input type='hidden' name='booking_id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='approval_status' value='1'>";
                    echo "<button class='approve-btn'>Approve</button>";
                    echo "</form>";
                    echo "<form method='POST' action='reject_booking.php'>";
                    echo "<input type='hidden' name='booking_id' value='" . $row['id'] . "'>";
                    echo "<input type='hidden' name='approval_status' value='2'>";
                    echo "<button class='reject-btn'>Reject</button>";
                    echo "</form>";
                } else if ($row['approval'] == 1) {
                    // If the booking has already been approved, display a simple text that says "Approved"
                    echo "<a href='booking_details.php?id=" . $row['id'] . "'><button class='approve-btn'>Show</button></a>";
                    echo "<form method='POST' action='cancel_booking.php'>";
                    echo "<input type='hidden' name='booking_id' value='" . $row['id'] . "'>";
                    echo "<button class='cancel-btn'>Cancel</button>";
                    echo "</form>";
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
    }
    mysqli_close($con);
    ?>
</body>
</html>
