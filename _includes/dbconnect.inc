<?php
	// Connect to server and select database at the intweb MyPhpAdmin
    //$mysqli = new mysqli("localhost","21428786","mysqluser","db1_21428786");  
	
	// Connect to server and select database
    $mysqli = mysqli_connect("localhost","sudath","test123","cw2_sudath");


	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
	}

?>
