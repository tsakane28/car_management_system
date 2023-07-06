<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sabre Business World</title>
	<link rel="stylesheet" href="style.css">
</head>
<style>
    /* General Styles */

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}

body {
	font-family: Arial, sans-serif;
	font-size: 16px;
	line-height: 1.5;
	color: #333;
}

.container {
	max-width: 1200px;
	margin: 0 auto;
	padding: 0 20px;
}

/* Header */

header {
	background-color: #212121;
	color: #fff;
	padding: 80px 0;
	position: relative;
	text-align: center;
}

nav {
	position: absolute;
	top: 20px;
	right: 20px;
}

nav ul {
	list-style: none;
}

nav ul li {
	display: inline-block;
	margin-left: 20px;
}

nav ul li:first-of-type {
	margin-left: 0;
}

nav ul li a {
	color: #fff;
	text-decoration: none;
}

.header-content {
	max-width: 700px;
	margin: 0 auto;
}

h1 {
	font-size: 48px;
	margin-bottom: 20px;
}

p {
	font-size: 24px;
	margin-bottom: 40px;
}

.button {
	display: inline-block;
	font-size: 18px;
	padding: 10px 20px;
	background-color: #fff;
	color: #212121;
	border-radius: 4px;
	text-decoration:none;
transition: background-color 0.3s ease-in-out;
}

.button:hover {
background-color: #f2f2f2;
}

/* About Section */

#about {
background-color: #f7f7f7;
padding: 80px 0;
text-align: center;
}

#about h2 {
font-size: 36px;
margin-bottom: 40px;
}

#about p {
max-width: 800px;
margin: 0 auto 40px auto;
}

/* Services Section */

#services {
padding: 80px 0;
}

#services h2 {
font-size: 36px;
margin-bottom: 40px;
text-align: center;
}

.service {
display: flex;
flex-direction: column;
align-items: center;
margin-bottom: 40px;
}

.service h3 {
font-size: 24px;
margin-bottom: 20px;
}

.service p {
max-width: 400px;
text-align: center;
}

/* Contact Section */

#contact {
background-color: #f7f7f7;
padding: 80px 0;
text-align: center;
}

#contact h2 {
font-size: 36px;
margin-bottom: 40px;
}

form label {
display: block;
font-size: 24px;
margin-bottom: 10px;
}

input[type="text"],
input[type="email"],
textarea {
display: block;
width: 100%;
padding: 10px;
margin-bottom: 20px;
border-radius: 4px;
border: none;
background-color: #f2f2f2;
}

input[type="submit"] {
display: inline-block;
background-color: #212121;
color: #fff;
font-size: 18px;
padding: 10px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}

input[type="submit"]:hover {
background-color: #333;
}

/* Footer */

footer {
background-color: #333;
color: #fff;
padding: 20px 0;
text-align: center;
}

footer p {
font-size: 18px;
}
</style>
<body>

	<header>
		<nav>
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">About</a></li>
				<li><a href="#">Services</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
		<div class="header-content">
			<h1>Sabre Business World</h1>
			<p>Your one-stop shop for all your business needs</p>
			<a href="#" class="button">Get Started</a>
		</div>
	</header>
	
	<section id="about">
		<div class="container">
			<h2>About Us</h2>
			<p>Sabre Business World is a platform that provides businesses with all the resources they need to grow and succeed. Our team of experts can help you with everything from marketing to finance to human resources.</p>
			<a href="#" class="button">Learn More</a>
		</div>
	</section>
	
	<section id="services">
		<div class="container">
			<h2>Our Services</h2>
			<div class="service">
				<h3>Marketing</h3>
				<p>We can help you create effective marketing strategies that will help you reach your target audience.</p>
			</div>
			<div class="service">
				<h3>Finance</h3>
				<p>Our financial experts can help you manage your finances, prepare budgets, and analyze your financial data.</p>
			</div>
			<div class="service">
				<h3>Human Resources</h3>
				<p>We can assist you with recruitment, employee management, benefits administration, and more.</p>
			</div>
		</div>
	</section>
	
	<section id="contact">
		<div class="container">
			<h2>Contact Us</h2>
			<form action="#">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name">
				
				<label for="email">Email:</label>
				<input type="email" id="email" name="email">
				
				<label for="message">Message:</label>
				<textarea id="message" name="message"></textarea>
				
				<input type="submit" value="Send Message">
			</form>
		</div>
	</section>
	
	<footer>
		<div class="container">
			<p>&copy; Sabre Business World 2023. All rights reserved.</p>
		</div>
	</footer>
</body>
</html>
