<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monthly Calendar</title>
    <style>
                        /* Set default font family and colors */
body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: #ffff;
	margin: 0;
	padding: 0;
    font-weight:bold;
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
table {
border-collapse: collapse;
margin: 0 auto;
font-family: Arial, sans-serif;
font-size: 14px;
width: 100%;
max-width: 1200px;
}

    th,
    td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #37475e;
        color:white;
    }

    .cell {
        height: 50px;
        max-width: 30px;
    }

    .date {
        font-weight: bold;
        font-size: 16px;
    }

    .event {
        margin-top: 5px;
        font-size: 12px;
        color: #999;
    }

    .time {
        font-weight: bold;
    }

    .room,
    .company {
        color: #555;
    }

    form {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    label {
        margin-right: 10px;
    }

    select {
        padding: 5px;
        border-radius: 50px;
        border: none;
        background-color: #F4F4F4;
        width: 300px;
        margin:1em;
    }

    input[type="submit"] {
        background-color:#1d9cd9;
        color: white;
        padding: 8px 14px;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        margin: 1em;
    }

    input[type="submit"]:hover {
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
        height:80px;
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
        <h1>Monthly Requests Calendar</h1>

        <!-- You can add other elements on the right side of the header if needed -->
        <div></div>
    </header>

<?php
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// get the month and year from the URL parameters or form submission
if (isset($_GET['month']) && isset($_GET['year'])) {
    $month = $_GET['month'];
    $year = $_GET['year'];
} elseif (isset($_POST['month']) && isset($_POST['year'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
} else {
    $month = date('m');
    $year = date('Y');
}

// get the number of days in the selected month
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// get the name of the selected month
$month_name = date('F', mktime(0, 0, 0, $month, 1, $year));

// get the first day of the selected month
$first_day = date('D', mktime(0, 0, 0, $month, 1, $year));

// create an array of weekdays
$weekdays = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');

// prepare the SQL query to retrieve the events for the selected month
$sql = "SELECT * FROM vehicle_logs WHERE MONTH(date_taken) = '$month' AND YEAR(date_taken) = '$year'";

// execute the query and retrieve the result
$result = mysqli_query($con, $sql);

// initialize an array to store the events
$vehicle_logs = array();

// loop through the result set and add the events to the array
while ($row = mysqli_fetch_assoc($result)) {
    $date_taken = date('j', strtotime($row['date_taken']));
    $time_out = date('g:i A', strtotime($row['time_out']));
    $username = $row['username'];
    $vehicle_reg = $row['vehicle_reg'];

    //add the event to the array
    array_push($vehicle_logs, array('date' => $date_taken, 'time' => $time_out, 'username' => $username, 'vehicle_reg' => $vehicle_reg));
}

// create a form to allow users to select the month and year
echo '<form method="post">';
echo '<label for="month">Month:</label>';
echo '<select id="month" name="month">';
for ($i = 1; $i <= 12; $i++) {
    $selected = ($i == $month) ? 'selected' : '';
    echo '<option value="' . $i . '" ' . $selected . '>' . date('F', mktime(0, 0, 0, $i, 1, $year)) . '</option>';
}
echo '</select>';

echo '<label for="year">Year:</label>';
echo '<select id="year" name="year">';
for ($i = date('Y') - 5; $i <= date('Y') + 5; $i++) {
    $selected = ($i == $year) ? 'selected' : '';
    echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
}
echo '</select>';

echo '<input type="submit" value="Go">';
echo '</form>';
// create a table with rows for each week of the selected month and columns for each day of the week
echo '<table>';
echo '<tr><th colspan="7">' . $month_name . ' ' . $year . '</th></tr>';
echo '<tr>';
foreach ($weekdays as $weekday) {
    echo '<th>' . $weekday . '</th>';
}
echo '</tr>';

// calculate the number of blank cells at the beginning of the selected month
$blank_cells = array_search($first_day, $weekdays);

for ($i = 0; $i < ($num_days + $blank_cells); $i++) {
    if ($i % 7 == 0) {
        echo '<tr>';
    }
    if ($i < $blank_cells || $i >= ($num_days + $blank_cells)) {
        echo '<td class="cell"></td>';
    } else {
        $day = $i - $blank_cells + 1;
        $date = $year . '-' . $month . '-' . $day;
        echo '<td class="cell">';
        echo '<div class="date">' . $day . '</div>';

        // check if there are any events
        // on this date and time
        foreach ($vehicle_logs as $vehicle_log) {
            if ($vehicle_log['date'] == $day) {
                echo '<div class="event">';
                echo '<span class="time">' . $vehicle_log['time'] . ' - </span>';
                echo '<span class="username">' . $vehicle_log['username'] . ' - </span>';
                echo '<span class="vehicle_reg">' . $vehicle_log['vehicle_reg'] . '</span>';
                echo '</div>';
            }
        }

        echo '</td>';
    }
    if ($i % 7 == 6) {
        echo'</tr>';
    }
}

echo '</table>';
mysqli_close($con);
?>
</body>
</html>