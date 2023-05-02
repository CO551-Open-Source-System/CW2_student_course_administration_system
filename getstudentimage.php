<?php

// Include configuration and database connection files
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Get the student ID from the query string
$studentid = $_GET['studentid'];

// Build the SQL statement to select the image data for the student
$sql = "SELECT image FROM student WHERE studentid = $studentid";

// Execute the SQL query
$result = mysqli_query($conn, $sql);

// Get the image data from the result set
$row = mysqli_fetch_assoc($result);
$imageData = $row['image'];

// Set the content type header to indicate that the response is an image
header("Content-type: image/jpeg");

// Output the image data
echo $imageData;

?>