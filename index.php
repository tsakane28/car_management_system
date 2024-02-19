<!DOCTYPE html>
<html>
<head>
	<title>Car Request Form</title>
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
  background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/bg-earth.jpg');
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
    background-color: #243c83;
    border-radius: 20px; /* Rounded corners */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Shadow effect */
}

/* Style the form labels */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #fff; /* White text */
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
    transition: background-color 0.3s; /* Smooth transition */
}

input[type="submit"]:hover {
    background-color: #37475e;
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
.nav-header {
    display: flex; /* Use flexbox */
	flex-direction:column;
    align-items: center; /* Align items vertically */
}

.nav-logo {
    margin-right: 20px; /* Optional: Add margin between logo and nav-bar */
}

/* Optional styles for buttons */
.nav-bar button {
    margin-right: 10px; /* Add margin between buttons */
}
</style>
<body>
	<div class="banner">
	<div class="nav-header">
	<div class="nav-logo">
        <img src="./images/logo.png.png" width="200" alt=""></div>
		<div class="nav-bar">
	<h1>Car Request Form</h1>
	</div>
	</div>
	</div>

	
	<form id="subform" method="POST" action="process_form.php">
		<label for="username">Name:</label><br>
		<input type="text" id="username" name="username" required><br><br>
		
		<label for="vehicle_reg">Vehicle Reg Number:</label><br>
		<input type="text" id="vehicle_reg" name="vehicle_reg" required><br><br>
		
		<label for="date_taken">Date Taken:</label><br>
		<input type="date" id="" name="date_taken" required><br><br>
		
		<label for="phone">Phone:</label><br>
		<input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
		
		<label for="purpose">Purpose:</label><br>
		<textarea id="purpose" name="purpose" required></textarea><br><br>
		
		<label for="time_out">Time Out:</label><br>
		<input type="time" id="time_out" name="time_out" required><br><br>
		
		<label for="time_in">Time In:</label><br>
		<input type="time" id="time_in" name="time_in" ><br><br>
		
		<label for="date_returned">Date Returned:</label><br>
		<input type="date" id="date_returned" name="date_returned" ><br><br>
		
		<label for="signature">Signature:</label><br>
		<input type="checkbox" id="signature" name="signature" value="confirmed" required>
    	<label for="signature">I confirm that the information provided is accurate </label><br><br>
    
		<input type="submit" value="Submit">
	</form>
</body>
</html>
