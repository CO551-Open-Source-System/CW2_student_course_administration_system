<?php

include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Define the student data to be inserted
$students = array(
    array('John Smith', 'jsmith123', 'password', 'jsmith@example.com'),
    array('Sarah Johnson', 'sjohnson456', 'password', 'sjohnson@example.com'),
    array('David Lee', 'dlee789', 'password', 'dlee@example.com'),
    array('Emily Chen', 'echen101', 'password', 'echen@example.com'),
    array('Michael Davis', 'mdavis246', 'password', 'mdavis@example.com')
);

// Loop through the student data and insert each record into the database
foreach ($students as $student) {
    $sql = "INSERT INTO student (name, username, password, email) VALUES ('$student[0]', '$student[1]', '$student[2]', '$student[3]')";
    $result= mysqli_query($conn, $sql);
}

// Output a message indicating that the seeding was successful
echo "Student records seeded successfully!";

?>