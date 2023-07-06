<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
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
        background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/investors.jpg');
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
        <h1>Sabre Schedule</h1>

        <!-- You can add other elements on the right side of the header if needed -->
        <div></div>
    </header>
<?php
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// prepare the SQL query to retrieve the event details grouped by various fields
$sql = "SELECT room_name, MONTH(event_date) AS month, event_type, event_date, event_start_time, event_end_time, company_name, GROUP_CONCAT(event_name SEPARATOR ', ') AS events FROM events GROUP BY room_name, MONTH(event_date), event_type, event_date, event_start_time, event_end_time, company_name";

// execute the query and retrieve the result
$result = mysqli_query($con, $sql);

// initialize an array to store the results
$events_by_group = array();

// loop through the result set and store the data in the array
while ($row = mysqli_fetch_assoc($result)) {
    $room_name = $row['room_name'];
    $month = $row['month'];
    $event_type = $row['event_type'];
    $event_date = $row['event_date'];
    $event_start_time = $row['event_start_time'];
    $end_time = $row['event_end_time'];
    $company_name = $row['company_name'];
    $events = $row['events'];

    // add the data to the array
    if (!isset($events_by_group[$room_name])) {
        $events_by_group[$room_name] = array();
    }
    if (!isset($events_by_group[$room_name][$month])) {
        $events_by_group[$room_name][$month] = array();
    }
    if (!isset($events_by_group[$room_name][$month][$event_type])) {
        $events_by_group[$room_name][$month][$event_type] = array();
    }
    if (!isset($events_by_group[$room_name][$month][$event_type][$event_date])) {
        $events_by_group[$room_name][$month][$event_type][$event_date] = array();
    }
    if (!isset($events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time])) {
        $events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time] = array();
    }
    if (!isset($events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time][$end_time])) {
        $events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time][$end_time] = array();
    }
    if (!isset($events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time][$end_time][$company_name])) {
        $events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time][$end_time][$company_name] = array();
    }

    // add the event to the array
    array_push($events_by_group[$room_name][$month][$event_type][$event_date][$event_start_time][$end_time][$company_name], $events);
}

// loop through the array and display the data in a table
echo '<table>';
echo '<tr><th>Room Name</th><th>Month</th><th>Event Type</th><th>Event Date</th><th>Start Time</th><th>End Time</th><th>Company Name</th><th>Events</th></tr>';
foreach ($events_by_group as $room_name => $months) {
    foreach ($months as $month => $types) {
        foreach ($types as $type => $dates) {
            foreach ($dates as $date => $times) {
                foreach ($times as $event_start_time => $end_times) {
                    foreach ($end_times as $end_time => $companies) {
                        foreach ($companies as $company => $events) {
                            echo "<tr><td>$room_name</td><td>$month</td><td>$type</td><td>$date</td><td>$event_start_time</td><td>$end_time</td><td>$company</td><td>" . implode(', ', $events) . "</td></tr>";
                        }
                    }
                }
            }
        }
    }
}
echo '</table>';

mysqli_close($con);

?>
</body>
</html>
