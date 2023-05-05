<?php

// Load the Faker library
require_once 'vendor/autoload.php';

// Include configuration and database connection files
include("_includes/config.inc");
include("_includes/dbconnect.inc");

// Create a new Faker generator 
$faker = Faker\Factory::create();

// Loop 5 times to insert 5 fake student records into the database
for ($i = 0; $i < 5; $i++) {

    // Generate fake data for each field
    $studentid = $faker->regexify('[A-Z]{2}\d{6}');
    $password = password_hash($faker->password, PASSWORD_DEFAULT);
    $dob = $faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d');
    $firstname = $faker->firstName;
    $lastname = $faker->lastName;
    $house = $faker->buildingNumber;
    $town = $faker->city;
    $county = $faker->state;
    $country = 'United Kingdom';
    $postcode = $faker->postcode;
    $uploadDir = 'images/';
    $profile_image = $faker->image($uploadDir, 400, 300, 'people', false);

    
    
    // Construct SQL query to insert the fake data into the database
    $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, image) 
            VALUES ('$studentid', '$password', '$dob', '$firstname', '$lastname', '$house', '$town', '$county', '$country', '$postcode' , '$profile_image')";
    
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