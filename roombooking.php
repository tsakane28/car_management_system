<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabre</title>
</head>
<link rel="stylesheet" href="4/w3.css">
<style>
        /* Set default font family and colors */
body {
	font-family: Arial, sans-serif;
	color: #333;
	background-color: #ffff;
	margin: 0;
	padding: 0;
}
.content {
  background-image: linear-gradient(to bottom right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.4)),url('images/investors.jpg');
  background-size: cover;
  background-position: center;
  width: 100%;
}

.box {
    display: flex;
    height: 100px;
    width: 100%;
    justify-content: space-between;
}
.book{
    margin: 2em;
}
.box h3 {
  font-size: 30px;
  margin-left: 1em;
  color:white;
}

.book-btn {
  background-color: #dc3545;
  color: #fff;
  border: none;
  border-radius: 35px;
  font-size: 14px;
  font-weight: bolder;
  padding: 10px 20px;
  text-decoration: none;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.book-btn:hover {
  background-color: #c82333;
}

.row {
    justify-content:center;
  display: flex;
  flex-wrap: wrap;
}

/* Create four equal columns that sits next to each other */
.column {
  flex: 20%;
  max-width: 25%;
  padding: 0 4px;
}

.column img {
  margin-top: 8px;
  vertical-align: middle;
  width: 100%;
}
.container {
  position: relative;
  width: 100%;
}
.text-block {
  position: absolute;
  top: 0px;
  left: 0px;
  background-color: black;
  color: white;
  padding-left: 0.5em;
  padding-right:  0.5em;
  border-radius:  20px 0 20px;
  cursor:none;
}
.plus-block {
  position: absolute;
  bottom: 0px;
  right: 0px;
  background-color: black;
  color: white;
  padding-left: 1em;
  padding-right:  1em;
  border-radius:  20px 0 20px;
}
.plus-block .h1{
    font-size: 20px;
}
.tooltip {
    cursor: pointer;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -60px;
  opacity: 0;
  transition: opacity 0.3s;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
  border-radius: 20px;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  color: black;
  font-size: 30px;
  font-weight: bolder;
  padding: 16px 32px;
  cursor:none;
}
#overlay {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
#overlay1 {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
#overlay2 {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
#overlay3 {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
#overlay4 {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
#overlay5 {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(0,0,0,0.7);
  z-index: 2;
  cursor: pointer;
  padding: 1em;
  color:white;
  /* Add the blur effect */
  backdrop-filter: blur(3px);
    /* Set a fixed height for the overlay */
    max-height: 100vh;
    overflow-y: scroll; /* Enable vertical scrolling */
}
/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 800px) {
  .column {
    flex: 50%;
    max-width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    flex: 100%;
    max-width: 100%;
  }
}
</style>
<body>
    <section>
        <div class="content">
      
            <div class="box">
                <div class="header">
                    <h3>SABRE BOOKING</h3>
                </div>
                <div class="book">
                  <a href="index.php" class="book-btn">Book</a>
                </div>
            </div>
        </div>
    </section>
      <section>
        <div class="row">
            <div class="column">
                <div class="container">
                    <img src="images/legends.webp" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Legends</h4>
                    </div>
                    <div id="overlay3" onclick="off3()" >
                    <h1>LEGENDS - LARGE CONFERENCE SUITE</h1>
                    <h3>Corporate Functions, Conferences, Training</h3>
                    <ul>
                    <li>
                      <strong>Room Type:</strong> Large Conference Suite with a private dining/cocktail area
                    </li>
                    <li>
                      <strong>Seats:</strong> Up to 120 delegates
                    </li>
                    <li>
                      <strong>Room Function:</strong> 
                      <ul>
                        <li>Large Business Meetings</li>
                        <li>Conferences</li>
                        <li>Training</li>
                        <li>Seminars</li>
                        <li>Workshops</li>
                        <li>Presentations</li>
                        <li>Promotions</li>
                        <li>Product Launches</li>
                        <li>Corporate Breakfasts</li>
                        <li>Award Ceremonies</li>
                        <li>Team Building</li>
                        <li>Diplomatic Functions</li>
                        <li>Board Meetings</li>
                        <li>Focus Groups</li>
                        <li>Other Corporate Related Events</li>
                      </ul>
                    </li>
                    <li>
                      <strong>Amenities:</strong> High Definition Projector, 3m x 2m Screen, Speakers, White Boards, prompter TV, air conditioning and WiFi
                    </li>
                    <li>
                      <strong>Additional Equipment:</strong> Each room has a Stationery box which includes a presentation clicker, white board markers, calculator, punch, stapler and other basic stationery. On request we can provide flip charts, extra speakers, microphones, lectern, conference calling speaker with microphone on a first come first serve basis. All equipment is provided at no additional cost.
                    </li>
                    <li>
                      <strong>Facilities:</strong> 
                      <ul>
                        <li>Garden tables and chairs for breakaways, dining or meetings</li>
                        <li>Solar and Generator electricity backup</li>
                        <li>Secure Parking</li>
                        <li>Ample Bathrooms</li>
                      </ul>
                    </li>
                  </ul>
                  </div>
                    <div class="tooltip" onclick="on3()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    
                    <div class="middle">
                      <div class="text">Legends</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="container">
                    <img src="images/investors.jpg" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Investors</h4>
                    </div>
                    <div id="overlay" onclick="off()" >
                    <h1>INVENTORS - SMALL CORPORATE SUITE</h1>
                    <h3>Meetings</h3>
                    <h1>Room Type: Small Corporate Suite</h1>
                    <p><strong>Seats:</strong> Up to 8 delegates</p>
                    <p><strong>Room Function:</strong>
                    <ul>
                      <li>Business Meetings</li>
                      <li>Board Meetings</li>
                      <li>Focus Groups</li>
                    </ul></p>
                    <p><strong>Amenities:</strong></p>
                    <ul>
                      <li>55” TV</li>
                      <li>White Board Table and 1 Wall Mounted White Board</li>
                      <li>Air Conditioning</li>
                      <li>WiFi</li>
                    </ul>
                    <p><strong>Additional Equipment:</strong></p>
                    <p>Each room has a Stationery box which includes a presentation clicker, white board markers, calculator, punch, stapler and other basic stationery. On request, we can provide flip charts, extra speakers, microphones, lectern, conference calling speaker with microphone on a first come first serve basis. All equipment is provided at no additional cost.</p>
                    <p><strong>Facilities:</strong></p>
                    <ul>
                      <li>Garden tables and chairs for breakaways or meetings</li>
                      <li>Dining area</li>
                      <li>Solar and Generator electricity backup</li>
                      <li>Secure Parking</li>
                      <li>Ample Bathrooms</li>
                    </ul>
                  </div>
                    <div class="tooltip" onclick="on()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    
                    <div class="middle">
                      <div class="text">Investors</div>
                    </div>
                </div>
            </div>
            <div class="column">
                <div class="container">
                    <img src="images/Explorers.JPG" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Explorers</h4>
                    </div>
                    <div id="overlay1" onclick="off1()">
                    <h1>EXPLORERS - MEDIUM CORPORATE SUITE</h1>
                    <h3>Training, Seminars, Meetings</h3>
                    <h1>Room Type - Medium Corporate Suite</h1>
  
                    <h2>Seats</h2>
                    <p>Up to 18 delegates</p>
                    
                    <h2>Room Function</h2>
                    <ul>
                      <li>Business Meetings</li>
                      <li>Training</li>
                      <li>Seminars</li>
                      <li>Workshops</li>
                      <li>Presentations</li>
                      <li>Team Building</li>
                      <li>Board Meetings</li>
                      <li>Focus Groups</li>
                    </ul>
                    
                    <h2>Amenities</h2>
                    <ul>
                      <li>65” TV</li>
                      <li>2 Wall Mounted White Boards</li>
                      <li>Air conditioning</li>
                      <li>WiFi</li>
                    </ul>
                    
                    <h2>Additional Equipment</h2>
                    <p>Each room has a Stationery box which includes:</p>
                    <ul>
                      <li>Presentation clicker</li>
                      <li>White board markers</li>
                      <li>Calculator</li>
                      <li>Punch</li>
                      <li>Stapler</li>
                      <li>Other basic stationery</li>
                    </ul>
                    <p>On request, we can provide the following equipment on a first come first serve basis:</p>
                    <ul>
                      <li>Flip charts</li>
                      <li>Extra speakers</li>
                      <li>Microphones</li>
                      <li>Lecturn</li>
                      <li>Conference calling speaker with microphone</li>
                    </ul>
                    <p>All equipment is provided at no additional cost.</p>
                    
                    <h2>Facilities</h2>
                    <ul>
                      <li>Garden tables and chairs for breakaways or meetings</li>
                      <li>Dining area</li>
                      <li>Solar and Generator electricity backup</li>
                      <li>Secure Parking</li>
                      <li>Ample Bathrooms</li>
                    </ul>
                   </div>
                    <div class="tooltip" onclick="on1()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    <div class="middle">
                      <div class="text">Explorers</div>
                    </div>
                  </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="container">
                    <img src="images/Leaders.JPG" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Leaders</h4>
                    </div>
                    <div id="overlay2" onclick="off2()">
                    <h1>LEADERS - LARGE CORPORATE SUITE</h1>
                    <h3>Meetings, Training, Corporate Functions</h3>
                    <h1>Room Type – Large Corporate Suite with a private dining/cocktail area</h1>
                    <div class="room-details">
                      <h2>Seats</h2>
                      <p>Up to 45 delegates</p>
                    </div>

                    <div class="room-details">
                      <h2>Room Function</h2>
                      <ul>
                      <li>Business Meetings</li>
                      <li>Small Training Groups</li>
                      <li>Presentations</li>
                      <li>Board Meetings</li>
                      <li>Focus Groups</li>
                      <li>Large Business Meetings</li>
                      <li>Conferences</li>
                      <li>Training</li>
                      <li>Seminars</li>
                      <li>Workshops</li>
                      <li>Product Launches</li>
                      <li>Corporate Breakfasts</li>
                      <li>Award Ceremonies</li>
                      <li>Team Building</li>
                      <li>Diplomatic Functions</li>
                      <li>Other Corporate Related Events</li>
                    </ul>
                    </div>

                    <div class="room-details">
                      <h2>Amenities</h2>
                      <ul class="amenities-list">
                        <li>86” Centered TV</li>
                        <li>2 x 65” side TVs and 1 x 55” back prompter TV</li>
                        <li>2 Wall Mounted White boards</li>
                        <li>Air conditioning</li>
                        <li>WiFi</li>
                      </ul>
                    </div>

                    <div class="room-details">
                      <h2>Additional Equipment</h2>
                      <ul class="additional-equipment-list">
                        <li>Each room has a Stationery box which includes a presentation clicker, white board markers, calculator, punch,
                          stapler, and other basic stationery.</li>
                        <li>On request, we can provide flip charts, extra speakers, microphones, lectern, conference calling speaker with
                          microphone on a first come first serve basis.</li>
                        <li>All equipment is provided at no additional cost.</li>
                      </ul>
                    </div>

                    <div class="room-details">
                      <h2>Facilities</h2>
                      <ul>
                        <li>The facilities also include garden tables and chairs for breakaways, dining or meetings.</li>
                        <li>Solar and Generator electricity backup</li>
                        <li>Secure Parking</li>
                        <li>Ample Bathrooms</li>
                      </ul>
                    </div>
                   </div>
                    <div class="tooltip" onclick="on2()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    <div class="middle">
                      <div class="text">Leaders</div>
                    </div>
                  </div>
            </div>
            <div class="column">
                <div class="container">
                    <img src="images/Philosophers.JPG" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Philosophers</h4>
                    </div>
                    <div id="overlay5" onclick="off5()">
                    <h1>PHILOSOPHERS - EXECUTIVE BOARD ROOM</h1>
                    <h3>Meetings and Training</h3>
                    <h2>Room Type - Medium Corporate Suite</h2> 
                    <h3>Seats</h3>
                    <p>Up to 16 delegates</p>
                    
                    <h3>Room Function</h3>
                    <ul>
                      <li>Business Meetings</li>
                      <li>Small Training Groups</li>
                      <li>Presentations</li>
                      <li>Board Meetings</li>
                      <li>Focus Groups</li>
                    </ul>
                    
                    <h3>Amenities</h3>
                    <ul>
                      <li>65” TV</li>
                      <li>2 Wall Mounted White Boards</li>
                      <li>Air conditioning</li>
                      <li>WiFi</li>
                    </ul>
                    
                    <h3>Additional Equipment</h3>
                    <p>Each room has a Stationery box which includes:</p>
                    <ul>
                      <li>Presentation clicker</li>
                      <li>White board markers</li>
                      <li>Calculator</li>
                      <li>Punch</li>
                      <li>Stapler</li>
                      <li>Other basic stationery</li>
                    </ul>
                    <p>On request, we can provide the following equipment (first come first serve basis):</p>
                    <ul>
                      <li>Flip charts</li>
                      <li>Extra speakers</li>
                      <li>Microphones</li>
                      <li>Lecturn</li>
                      <li>Conference calling speaker with microphone</li>
                    </ul>
                    <p>All equipment is provided at no additional cost.</p>
                    
                    <h3>Facilities</h3>
                    <ul>
                      <li>Garden tables and chairs for breakaways or meetings</li>
                      <li>Dining area</li>
                      <li>Solar and Generator electricity backup</li>
                      <li>Secure Parking</li>
                      <li>Ample Bathrooms</li>
                    </ul>
                    </div>
                    <div class="tooltip"  onclick="on5()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    <div class="middle">
                      <div class="text">Philosophers</div>
                    </div>
                  </div>
            </div>
            <div class="column">
                <div class="container">
                    <img src="images/Visionaries.JPG" alt="Avatar" class="image" style="width:100%">
                    <div class="text-block">
                        <h4>Visionaries</h4>
                    </div>
                    <div id="overlay4" onclick="off4()">
                    <h1>VISIONARIES - MEDIUM CORPORATE SUITE</h1>
                    <h3>Meetings, Seminars, Training</h3>
                    <h2>Room Type: Versatile Medium Corporate Suite</h2>
                    <strong>Seats:</strong> Up to 30 delegates</li>
                        <p><strong>Room Function:</strong></p> 
                        <ul>
                          <li>Business Meetings</li>
                          <li>Training</li>
                          <li>Seminars</li>
                          <li>Workshops</li>
                          <li>Presentations</li>
                          <li>Team Building</li>
                          <li>Board Meetings</li>
                          <li>Focus Groups</li>
                        </ul>
                        <strong>Amenities:</strong> 
                        <ul>
                          <li>75” TV</li>
                          <li>4 Wall Mounted White Boards</li>
                          <li>Air conditioning</li>
                          <li>WIFI</li>
                        </ul>
                        <strong>Additional Equipment:</strong>
                        <ul>
                          <li>Each room has a Stationery box which includes:</li>
                          <ul>
                            <li>Presentation clicker</li>
                            <li>White board markers</li>
                            <li>Calculator</li>
                            <li>Punch</li>
                            <li>Stapler</li>
                            <li>Other basic stationery</li>
                          </ul>
                          <li>On request, we can provide:</li>
                          <ul>
                            <li>Flip charts</li>
                            <li>Extra speakers</li>
                            <li>Microphones</li>
                            <li>Lecturn</li>
                            <li>Conference calling speaker with microphone (first come first serve basis)</li>
                          </ul>
                          <li>All equipment is provided at no additional cost.</li>
                        </ul>
                     
                        <strong>Facilities:</strong>
                        <ul>
                          <li>Garden tables and chairs for breakaways, dining or meetings</li>
                          <li>Solar and Generator electricity backup</li>
                          <li>Secure Parking</li>
                          <li>Ample Bathrooms</li>
                        </ul>
                    </div>
                    <div class="tooltip"onclick="on4()">
                        <div class="plus-block">
                            <h1>+</h1>
                            <span class="tooltiptext">Click to view room details</span>
                        </div>
                    </div>
                    <div class="middle">
                      <div class="text">Visionaries</div>
                    </div>
                  </div>
            </div>
        </div>
    </section>
</body>
<script>
    function on() {
      document.getElementById("overlay").style.display = "block";
    }
    
    function off() {
      document.getElementById("overlay").style.display = "none";
    }
    function on1() {
      document.getElementById("overlay1").style.display = "block";
    }
    
    function off1() {
      document.getElementById("overlay1").style.display = "none";
    }
    function on2() {
      document.getElementById("overlay2").style.display = "block";
    }
    
    function off2() {
      document.getElementById("overlay2").style.display = "none";
    }
    function on3() {
      document.getElementById("overlay2").style.display = "block";
    }
    
    function off3() {
      document.getElementById("overlay2").style.display = "none";
    }
    function on4() {
      document.getElementById("overlay4").style.display = "block";
    }
    
    function off4() {
      document.getElementById("overlay4").style.display = "none";
    }
    function on5() {
      document.getElementById("overlay5").style.display = "block";
    }
    
    function off5() {
      document.getElementById("overlay5").style.display = "none";
    }
    </script>
</html>