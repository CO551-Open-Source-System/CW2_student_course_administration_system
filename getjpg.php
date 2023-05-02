<?php

header("Content-type: image/jpg");

  // Database connection file
  include("_includes/dbconnect.inc");

  // Define the SQL statement for selecting id to print the image sound
  $sql = "SELECT image FROM student WHERE studentid='" . $_GET['studentid'] ."';";
	
   // Execute sql statement
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  
  $jpg = $row['image'];

  echo $jpg;
?>