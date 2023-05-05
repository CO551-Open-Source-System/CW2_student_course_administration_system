<?php

// Load the Faker library
require_once 'vendor/autoload.php';

// Include configuration and database connection files
include("_includes/config.inc");
include("_includes/dbconnect.inc");

// Create a new Faker generator 
$faker = Faker\Factory::create('en_GB');// Set the Faker generator to use the UK locale


// Loop 5 times to insert 5 fake student records into the database
for ($i = 0; $i < 5; $i++) {

    // Generate fake data for each field
    $studentid = $faker->regexify('[0-9]{8}');
    $password = password_hash($faker->password, PASSWORD_DEFAULT);
    $dob = $faker->dateTimeBetween('-18 years')->format('Y-m-d');
    $firstname = $faker->firstName;
    $lastname = $faker->lastName;
    $house = $faker->streetAddress;
    $town = $faker->city;
    $county = $faker->county;
    $country = 'UK';
    $postcode = $faker->postcode;
    // $uploadDir = 'images/';
    // $profile_image = $faker->image($uploadDir, 400, 300, 'people', false);

    
    
    // Construct SQL query to insert the fake data into the database
    $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode) 
            VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode')";
    
    // Execute the SQL query
    $result = mysqli_query($conn, $sql);
    
    // Check if there was an error inserting the record, and display the error message if there was
    if (!$result) {
        die("Error inserting record: " . mysqli_error($conn));
    }
}

// Display a success message once all the records have been inserted
echo "Records inserted successfully.";

// Close the database connection
mysqli_close($conn);
?>