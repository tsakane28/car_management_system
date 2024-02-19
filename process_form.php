<?php
// Check if all required form fields are filled in
if (
    !isset($_POST['username']) || empty($_POST['username']) ||
    !isset($_POST['vehicle_reg']) || empty($_POST['vehicle_reg']) ||
    !isset($_POST['date_taken']) || empty($_POST['date_taken']) ||
    !isset($_POST['phone']) || empty($_POST['phone']) ||
    !isset($_POST['purpose']) || empty($_POST['purpose']) ||
    !isset($_POST['time_out']) || empty($_POST['time_out'])
) {
    echo "Please fill in all required fields.";
} else {
    // Replace the database credentials with your own
    $con = mysqli_connect("localhost", "root", "", "sabre");

    // Check if the connection was successful
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        // Prepare the SQL statement
        $sql = "INSERT INTO vehicle_logs (username, vehicle_reg, date_taken, phone, purpose, time_out, time_in, date_returned, signature) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Assign ternary operations to variables
        $timeIn = isset($_POST['time_in']) ? $_POST['time_in'] : null;
        $dateReturned = isset($_POST['date_returned']) ? $_POST['date_returned'] : null;
        $signature = isset($_POST['signature']) ? "confirmed" : null; // Adjust based on how you handle the signature in your form

        // Bind the form data to the prepared statement
        $stmt = $con->prepare($sql);
        $stmt->bind_param(
            'sssssssss',
            $_POST['username'],
            $_POST['vehicle_reg'],
            $_POST['date_taken'],
            $_POST['phone'],
            $_POST['purpose'],
            $_POST['time_out'],
            $timeIn,
            $dateReturned,
            $signature
        );

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "Form data saved successfully.";
            header('Location: index.php');
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement and database connection
        $stmt->close();
        $con->close();
    }
}
?>
