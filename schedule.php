<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Requests</title>
    <style>
                /* Set default font family and colors */
body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: #ffff;
	margin: 0;
	padding: 0;
}
        table {
            border-collapse: collapse;
            width: 96vw;
            margin: 20px;
            padding: 1em;
        }
                th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #37475e;
            color:white;
        }
        /* Header styles */
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/bg-earth.jpg');
        background-size: cover;
        background-position: center;
        color: #fff;
        padding: 10px;
        margin-bottom: 1em;
        height: 80px;
    }

    /* Back button styles */
   button {
        font-size: 16px;
        color: #fff;
        font-weight:bold;
        background-color: #1d9cd9;
        border: none;
        margin-right: 20px;
        border-radius:35px;
        width: 100%;
        height: 30px;
    }
    button:hover {
        background-color: #37475e;
	    color:white;
    }

    /* Title styles */
    h1 {
        font-size: 24px;
        margin: 0;
    }

    </style>
</head>
<body>
<header>
        <!-- Add a link to go back to the previous page -->
        <a href="#" class="back-button" onclick="history.back();"><button>Back</button></a>

        <!-- Add the title of your page -->
        <h1>Car Requests Schedule</h1>

        <!-- You can add other elements on the right side of the header if needed -->
        <div></div>
    </header>
    <?php
$con = mysqli_connect("localhost", "root", "", "sabre");

// Check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {
    // Prepare the SQL query to retrieve the event details
    $sql = "SELECT * FROM vehicle_logs ORDER BY date_taken, time_out";

    // Execute the query and retrieve the result
    $result = mysqli_query($con, $sql);

    // Check if there are any rows returned
    if (mysqli_num_rows($result) > 0) {
        // Display the schedule table
        echo '<table>';
        echo '<tr><th>Name</th><th>Vehicle Reg Number</th><th>Date Taken</th><th>Phone</th><th>Purpose</th><th>Time Out</th><th>Time In</th><th>Date Returned</th></tr>';
        
        // Loop through the result set and display each row as a schedule entry
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['username'] . '</td>';
            echo '<td>' . $row['vehicle_reg'] . '</td>';
            echo '<td>' . $row['date_taken'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['purpose'] . '</td>';
            echo '<td>' . $row['time_out'] . '</td>';
            echo '<td>' . $row['time_in'] . '</td>';
            echo '<td>' . $row['date_returned'] . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No schedule entries found.";
    }

    // Close the database connection
    mysqli_close($con);
}
?>

</body>
</html>
