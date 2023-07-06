<?php
// check if all required form fields are filled in
if (!isset($_POST['company_name']) || empty($_POST['company_name']) || !isset($_POST['event_leader_name']) || empty($_POST['event_leader_name']) || !isset($_POST['phone']) || empty($_POST['phone']) || !isset($_POST['physical_address']) || empty($_POST['physical_address']) || !isset($_POST['email']) || empty($_POST['email']) || !isset($_POST['event_type']) || empty($_POST['event_type']) || !isset($_POST['event_duration']) || empty($_POST['event_duration']) || !isset($_POST['event_date']) || empty($_POST['event_date']) || !isset($_POST['event_name']) || empty($_POST['event_name']) || !isset($_POST['num_delegates']) || empty($_POST['num_delegates'])) {
    echo "Please fill in all required fields.";
} else {
    // replace the database credentials with your own
    $con = mysqli_connect("localhost", "root", "", "sabre");

    // check if the connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        // Check if the room is available during the proposed event time
        $room_name = $_POST['room_name'];
        $event_date = $_POST['event_date'];
        $event_start_time = $_POST['event_start_time'];
        $event_end_time = $_POST['event_end_time'];

        $sql_check = "SELECT * FROM events WHERE room_name = ? AND event_date = ? AND ((event_start_time <= ? AND event_end_time >= ?) OR (event_start_time <= ? AND event_end_time >= ?) OR (event_start_time >= ? AND event_end_time <= ?))";
        $stmt_check = $con->prepare($sql_check);
        $stmt_check->bind_param("ssssssss", $room_name, $event_date, $event_start_time, $event_end_time, $event_start_time, $event_end_time, $event_start_time, $event_end_time);
        $stmt_check->execute();
        $result = $stmt_check->get_result();

        if ($result->num_rows > 0) {
            // The room is already booked during the proposed event time
            echo "<script>alert('We are sorry, the room is occupied.'); 
            window.location.href = 'index.php';</script>";
            exit();
        } else {
            // The room is available, proceed with saving the form data
            $sql = "INSERT INTO events (company_name, event_leader_name, phone, physical_address, vat, email, event_type, event_duration, event_date, event_name, num_delegates, event_start_time, event_end_time, room_name, cateringpack, break_time, special_dietary_reqs, bar_reqs) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            // bind the form data to the prepared statement
            $stmt = $con->prepare($sql);
            $stmt->bind_param('ssssssssssssssssss', $_POST['company_name'], $_POST['event_leader_name'], $_POST['phone'], $_POST['physical_address'], $_POST['vat'], $_POST['email'], $_POST['event_type'], $_POST['event_duration'], $_POST['event_date'], $_POST['event_name'], $_POST['num_delegates'], $_POST['event_start_time'], $_POST['event_end_time'], $_POST['room_name'], $_POST['cateringpack'], $_POST['break_time'], $_POST['special_dietary_reqs'], $_POST['bar_reqs']);

            // execute the prepared statement
            if ($stmt->execute()) {
                echo "Form data saved successfully.";
            } else {
                echo "Error: " . $stmt->error;
            }
        }
    }
}
// Redirect to index.php
header("Location: index.php");
exit;

?>