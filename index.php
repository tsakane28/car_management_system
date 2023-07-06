<!DOCTYPE html>
<html>
<head>
	<title>Event Registration Form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>
    /* Set default font family and colors */
body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: #ffff;
	margin: 0;
	padding: 0;
}

.banner {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100;
  background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/investors.jpg');
  background-size: cover;
  background-position: center;
  margin-bottom:2em;
}

.banner h1 {
  text-align: center;
  color:white;
}

/* Center the form on the page */
form {
	max-width: 600px;
	margin: 0 auto;
	padding: 20px;
}

/* Style the form labels */
label {
	display: block;
	margin-bottom: 5px;
	font-weight: bold;
}

/* Style the form inputs */
input[type="text"],
input[type="email"],
input[type="tel"],
input[type="number"],
input[type="time"],
input[type="date"],
textarea,
select {
    width: 100%;
    padding: 10px;
    border: none;
	border-radius: 35px;
    box-sizing: border-box;
    margin-bottom: 20px;
    font-size: 16px;
	background-color: #F4F4F4;
}



/* Style the form submit button */
input[type="submit"] {
	background-color: #1d9cd9;
	color: #fff;
	border: none;
	padding: 10px 20px;
	border-radius: 35px;
	cursor: pointer;
	font-size: 18px;
	width: 100%;
}

input[type="submit"]:hover {
	background-color: #37475e;
	color:white;
}

/* Style the form error messages */
.error-message {
	color: red;
	font-style: italic;
	margin-top: 5px;
}

/* Add some spacing around the form fields */
.form-group {
	margin-bottom: 20px;
}

</style>
<body>
	<div class="banner">
	<h1>Sabre Event Booking Form</h1>
	</div>
	
	<form id="subform" method="POST" action="process_form.php">
		<label for="company_name">Company Name:</label><br>
		<input type="text" id="company_name" name="company_name" required><br><br>
		
		<label for="event_leader_name">Event Leader Name:</label><br>
		<input type="text" id="event_leader_name" name="event_leader_name" required><br><br>
		
		<label for="phone">Phone:</label><br>
		<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
		
		<label for="physical_address">Physical Address for Invoice:</label><br>
		<textarea id="physical_address" name="physical_address" required></textarea><br><br>
		
		<label for="vat">VAT:</label><br>
		<input type="text" id="vat" name="vat" required><br><br>
		
		<label for="email">Email address:</label><br>
		<input type="email" id="email" name="email" required><br><br>
		
		<label for="event_type">Event Type:</label><br>
        <select id="event_type" name="event_type" required>
        <option value selected ></option>
        <option value="training">Training</option>
        <option value="conference">Conference</option>
		<option value="meeting">Meeting</option>
		<option value="workshop">Workshop</option>
        <option value="other">Other</option>
		</select><br><br>

		<label for="event_duration">Event Duration:</label><br>
		<select name="event_duration" class="form-control" required>
	    <option value selected ></option>
        <option value="halfday">Half Day</option>
        <option value="fullday">Full Day</option>
		<option value="evening">Evening</option>
        <option value="hoursm">Hours of Meeting</option>                                                
        </select>
		<label for="event_date">Event Date:</label><br>
		<input type="date" id="event_date" name="event_date" required><br><br>
		
		<label for="event_name">Event Name (if applicable):</label><br>
		<input type="text" id="event_name" name="event_name"><br><br>
		
		<label for="num_delegates">Number of Delegates:</label><br>
		<input type="number" id="num_delegates" name="num_delegates" min="1" required><br><br>
		
		<label for="event_start_time">Event Start Time:</label><br>
		<input type="time" id="event_start_time" name="event_start_time" required><br><br>
		
		<label for="event_end_time">Event End Time:</label><br>
		<input type="time" id="event_end_time" name="event_end_time" required><br><br>
		
		<label for="room">Room:</label><br>
		<select id="room_name" name="room_name" required>
			<option value="inventors">INVENTORS</option>
			<option value="explorers">EXPLORERS</option>
			<option value="philosophers">PHILOSOPHERS</option>
            <option value="visionaries">VISIONARIES</option>
			<option value="legends">LEGENDS CONFERENCE VENUE</option>
		</select><br><br>
		
		<label for="catering_package">Catering Package:</label><br>
        <select id="cateringpack" name="cateringpack" required>
			<option value="gold">Gold</option>
			<option value="silver">Silver</option>
			<option value="bronze">Bronze</option>
		</select><br><br>
		
		<label for="tea_break_time">Tea/Meal/Break Time:</label><br>
		<select id="break_time" name="break_time" required>
			<option value="Arrival">Arrival</option>
			<option value="Mid Morning">Mid Morning</option>
			<option value="Lunch">Lunch</option>
			<option value="Afternoon">Afternoon</option>
			<option value="Evening">Evening</option>
		</select><br><br>
		<label for="special_dietary_reqs">Special Dietary Requirements:</label><br>
		<textarea id="special_dietary_reqs" name="special_dietary_reqs"></textarea><br><br>
		
		<label for="bar_reqs">Bar Requirements:</label><br>
		<textarea id="bar_reqs" name="bar_reqs"></textarea><br><br>
		
		<input type="submit" value="Submit">
	</form>
</body>
<script>
	function checkDelegates() {
  var numDelegates = document.getElementById("num_delegates").value;
  var roomSelection = document.getElementById("room_name").value;

  var roomCapacity = 0;

  // Set the room capacity based on the selected room option
  switch (roomSelection) {
    case "inventors":
      roomCapacity = 8;
      break;
    case "explorers":
      roomCapacity = 18;
      break;
    case "philosophers":
      roomCapacity = 16;
      break;
    case "visionaries":
      roomCapacity = 30;
      break;
    case "legends":
      roomCapacity = 120;
      break;
    default:
      break;
  }

  // Check if the number of delegates exceeds the room capacity
  if (parseInt(numDelegates) > roomCapacity) {
    alert(
      "Error: The selected room can accommodate a maximum of " +
        roomCapacity +
        " delegates."
    );
    return false; // Prevent form submission if there's an error
  }

  return true; // Proceed with form submission
}
document.getElementById("subform").addEventListener("submit", function(event) {
  // Prevent form submission
  event.preventDefault();

  // Call the checkDelegates() function
  var isValid = checkDelegates();

  // Proceed with form submission if validation passes
  if (isValid) {
    event.target.submit();
  }
});

</script>
</html>
