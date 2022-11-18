<?php
//collecting values from html file
$min = ($_REQUEST["minCapacity"]);
$max = ($_REQUEST["maxCapacity"]);

//creating bool to check for input validation
$valid = true;

//when inputs aren't numbers, alert user
if (!is_numeric($max) || !is_numeric($min)) {
  echo "Input Must Be Number!";
  $valid = false;
}

//when min is bigger than max alert user
if ($max < $min) {
  echo "Maximum Capacity Must be Larger than Minimum Capacity!";
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
  $query = "SELECT name, capacity, weekday_price, weekend_price FROM venue WHERE licensed = '1' and capacity > $min AND capacity < $max;";
  //store query result
  $result = $conn->query($query);

  //create table using query result
  echo "<table border='1' width='300' cellspacing ='0'>";

  echo "<tr>";
  echo "<td>Venue Name</td>";
  echo "<td>Venue Weekday Price</td>";
  echo "<td>Venue Weekend Price</td>";
  echo "</tr>";

  while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['weekday_price'] . "</td>";
    echo "<td>" . $row['weekend_price'] . "</td>";
    echo "</tr>";
  };

  echo "</table>";

  //close connection to database
  $conn->close();
}
