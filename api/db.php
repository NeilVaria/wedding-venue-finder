<?php
// This file cycles throught the list of dates, to find all of the venues for each date 
// and stores the results in an array of objects which have the date as an index, so that
// the range date functionality works and the website can display all of the venues that
// are availible for each date in the range from the user input. 



$servername = "rvis.ddns.net:13306";
$username = "nvaria";
$password = "Belmont47";
$dbname = "coa123wdb";

//gather variables from the script.js file
$firstdate = $_REQUEST['first_date'];
$last_date = $_REQUEST['last_date'];
$party_size = $_REQUEST['party_size'];
$catering_grade = $_REQUEST['catering_grade'];
$list_of_dates = explode(',', $_REQUEST['list_of_dates']);

//connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//create an array for the array of objects
$results = array();
foreach ($list_of_dates as $date) { //for each date in the array of dates
    $day_results = array();

    //sql query to gather all of the data from the database using all the user inputs
    $query = "SELECT name, capacity, licensed, cost, weekday_price, weekend_price, COUNT(booking_date) 
    FROM venue LEFT JOIN catering ON venue.venue_id = catering.venue_id LEFT JOIN venue_booking ON venue.venue_id = venue_booking.venue_id 
    WHERE capacity > $party_size AND grade = $catering_grade AND NOT EXISTS (
        SELECT 
        venue_id 
        FROM 
        venue_booking 
        WHERE 
        venue_booking.booking_date = '$date' 
        AND venue_booking.venue_id = venue.venue_id
    ) 
    GROUP BY venue.name, venue.capacity, venue.licensed, venue.weekday_price, venue.weekend_price, catering.cost;";
    //stores the result of from the sql query
    $result = $conn->query($query);

    //creates an object containing all of the results
    while ($row = $result->fetch_assoc()) {
        $object = array(
            "name" => $row['name'],
            "capacity" => $row['capacity'],
            "licensed" => $row['licensed'],
            "cost" => $row['cost'],
            "weekday_price" => $row['weekday_price'],
            "weekend_price" => $row['weekend_price'],
            "count" => $row['COUNT(booking_date)'],
        );
        //stores the object into the array
        array_push($day_results, $object);
    }
    $results[$date] = $day_results; //push the date with the object into the array of objects
}
echo json_encode($results);// echo the results
