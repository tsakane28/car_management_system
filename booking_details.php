<?php
$con = mysqli_connect("localhost", "root", "", "sabre");

// check if the connection was successful
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// prepare the SQL query to retrieve all form data from the database
$sql = "SELECT * FROM events";

// execute the query and retrieve the result
$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Booking Receipt</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}

		th,
		td {
			text-align: left;
			padding: 8px;
			border: 1px solid #ddd;
		}

		tr:nth-child(even) {
			background-color: #f2f2f2;
		}


    header {
  display: flex;
  justify-content: center;
}

.header-container {
  display: flex;
  justify-content: space-between;
  align-items: center;
  width: 100%;
  max-width: 800px; /* adjust as needed */
  padding: 10px;
}

.back-button {
  order: 1;
}

h1 {
  order: 2;
  color:white;
}

button{
    order: 3;
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

	</style>
</head>

<body>
<header>
  <div class="header-container">
    <a href="#" class="back-button" onclick="history.back();"><button>Back</button></a>
    <h1>Booking Details</h1>
    <button onclick="exportToExcel()">Export to Excel</button>
  </div>
</header>


	<div class="booking-receipt-container">
		<table>
			<tr>
				<th>Item</th>
				<th>Details</th>
			</tr>
			<?php while ($row = mysqli_fetch_assoc($result)) { ?>
			<tr>
				<td>Company Name:</td>
				<td><?php echo $row['company_name']; ?></td>
			</tr>
			<tr>
				<td>Event Leader Name:</td>
				<td><?php echo $row['event_leader_name']; ?></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><?php echo $row['phone']; ?></td>
			</tr>
			<tr>
				<td>Physical Address for Invoice:</td>
				<td><?php echo $row['physical_address']; ?></td>
			</tr>
			<tr>
				<td>VAT:</td>
				<td><?php echo $row['vat']; ?></td>
			</tr>
			<tr>
				<td>Email address:</td>
				<td><?php echo $row['email']; ?></td>
			</tr>
			<tr>
				<td>Event Type:</td>
				<td><?php echo $row['event_type']; ?></td>
			</tr>
			<tr>
				<td>Event Duration:</td>
				<td><?php echo $row['event_duration']; ?></td>
			</tr>
			<tr>
				<td>Event Date:</td>
				<td><?php echo $row['event_date']; ?></td>
			</tr>
			<tr>
				<td>Event Name (if applicable):</td>
				<td><?php echo $row['event_name']; ?></td>
			</tr>
			<tr>
				<td>Number of Delegates:</td>
				<td><?php echo $row['num_delegates']; ?></td>
			</tr>
			<tr>
				<td>Event Start Time:</td>
				<td><?php echo $row['event_start_time']; ?></td>
			</tr>
			<tr>
				<td>Event End Time:</td>
				<td><?php echo $row['event_end_time']; ?></td>
			</tr>
			<tr>
				<td>Room:</td>
				<td><?php echo $row['room_name']; ?></td>
			</tr>
			<tr>
				<td>Catering Package:</td>
				<td><?php echo $row['cateringpack']; ?></td>
			</tr>
			<tr>
				<td>Tea/Meal/Break Time:</td>
				<td><?php echo $row['break_time']; ?></td>
			</tr>
			<tr>
				<td>Special Dietary Requirements:</td>
				<td><?php echo $row['special_dietary_reqs']; ?></td>
			</tr>
			<tr>
				<td>Bar Requirements:</td>
				<td><?php echo $row['bar_reqs']; ?></td>
			</tr>
			<?php } ?>
		</table>
	</div>
</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>
<script>
function exportToExcel() {
    // Define the filename for the exported file
    var fileName = "booking_receipt.xlsx";

    // Retrieve the HTML table element
    var table = document.querySelector("table");

    // Convert the table to a SheetJS workbook object
    var workbook = XLSX.utils.table_to_book(table);

    // Convert the workbook object to a binary Excel file
    var excelFile = XLSX.write(workbook, { bookType: 'xlsx', type: 'binary' });

    // Create a Blob object from the binary Excel file
    var blob = new Blob([s2ab(excelFile)], {type: "application/octet-stream"});

    // Create a link element to download the exported file
    var link = document.createElement("a");
    link.href = URL.createObjectURL(blob);
    link.download = fileName;

    // Click the link to trigger the download
    link.click();

    // Utility function to convert string to ArrayBuffer
    function s2ab(s) {
        var buf = new ArrayBuffer(s.length);
        var view = new Uint8Array(buf);
        for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
        return buf;
    }
}
</script>


<style>
  /* Set default font family and colors */
body {
  font-family: Arial, sans-serif;
  color: #333;
  background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)), url('images/investors.jpg');
  background-size: cover;
  background-position: center;
  margin: 0;
  padding: 0;
}

.booking-receipt-container {
  max-width: 1000px;
margin: 2em auto;
padding: 20px;
background-color: #f7f7f7;
border: 1px solid #ddd;
font-size: 14px;
}

.booking-receipt-container h1 {
font-size: 18px;
margin-bottom: 10px;
}

.booking-receipt-container table {
width: 100%;
border-collapse: collapse;
margin-top: 10px;
}

.booking-receipt-container th {
text-align: left;
padding: 8px;
border-bottom: 1px solid #ddd;
}

.booking-receipt-container td {
padding: 8px;
border-bottom: 1px solid #ddd;
}
</style>

<?php
mysqli_close($con);
?>

