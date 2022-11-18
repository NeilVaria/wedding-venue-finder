<?php
//collecting values from html file
$month = ($_REQUEST["month"]);

//creating bool to check for input validation
$valid = true;

//validates user inputs
if ($month > 12 || $month < 1 || !is_numeric($month)) {
  echo "Invalid Input";
  $valid = false;
}

//if pass validation
if ($valid) {

  $servername = "sci-mysql";
  $username = "coa123wuser";
  $password = "grt64dkh!@2FD";
  $dbname = "coa123wdb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  //sql query
  $query = "SELECT name, COUNT(booking_date) FROM venue LEFT JOIN venue_booking ON venue.venue_id = venue_booking.venue_id WHERE MONTH(venue_booking.booking_date) = $month GROUP BY venue.name ORDER BY COUNT(venue_booking.booking_date) DESC;";
  //store query result
  $result = $conn->query($query);


  //create table using query result
  echo "<table border='1' width='300' cellspacing ='0'>";

  echo "<tr>";
  echo "<td>Venue Name</td>";
  echo "<td>Amount of bookings in month $month</td>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['COUNT(booking_date)'] . "</td>";
    echo "</tr>";
  };


  //close connection to database
  $conn->close();
}
