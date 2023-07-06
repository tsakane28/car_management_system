<h1>Bookings</h1>

<?php
  // replace the database credentials with your own
  $con = mysqli_connect("localhost", "root", "", "sabre");

  // check if the connection was successful
  if (mysqli_connect_errno()) {
      echo '<p>Failed to connect to MySQL: ' . mysqli_connect_error() . '</p>';
  } else {
      // retrieve all bookings from the database
      $sql = "SELECT * FROM events";
      $result = mysqli_query($con, $sql);

      // display a table of bookings with a "Show" button for each row
      if (mysqli_num_rows($result) > 0) {
          echo '<table>';
          echo '<tr><th>Name</th><th>Email</th><th>Event Name</th><th>Status</th><th></th></tr>';
          while ($row = mysqli_fetch_assoc($result)) {
              echo '<tr>';
              echo '<td>' . $row['name'] . '</td>';
              echo '<td>' . $row['email'] . '</td>';
              echo '<td>' . $row['event_name'] . '</td>';
              echo '<td>' . ($row['approved'] ? 'Approved' : 'Pending') . '</td>';
              echo '<td><button class="show-btn" data-booking-id="' . $row['id'] . '">Show</button></td>';
              echo '</tr>';
          }
          echo '</table>';
      } else {
          echo '<p>No bookings found.</p>';
      }
  }
  mysqli_close($con);
?>

<!-- modal to display booking information -->
<div id="booking-modal" class="modal">
  <div class="modal-content">
    <h2 id="modal-title"></h2>
    <p id="modal-description"></p>
    <p>Start: <span id="modal-start"></span></p>
    <p>End: <span id="modal-end"></span></p>
  </div>
</div>

<!-- CSS for the modal -->
<style>

  .modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0,0,0,0.5);
display: none;
}

.modal-content {
  background-color: white;
  padding: 20px;
  margin: 20% auto;
  width: 50%;
  max-width: 800px;
}
</style>

</body>
</html>

