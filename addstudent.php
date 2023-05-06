<?php

// Include configuration and database connection files
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if user is logged in
if (isset($_SESSION['id'])) {

    // Include header and navigation templates
    echo template("templates/partials/header.php");
    echo template("templates/partials/nav.php");

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        
        // Hash the password
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if (isset($_FILES['image'])){

            $imagedata = addslashes(file_get_contents($_FILES['image']['tmp_name']));

            // Insert the new student record into the database with the image filepath
            $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode, image)
            VALUES ('$_POST[studentid]', '$hashed_password', '$_POST[dob]', '$_POST[firstname]', '$_POST[lastname]',
            '$_POST[house]', '$_POST[town]', '$_POST[county]', '$_POST[country]', '$_POST[postcode]', '$imagedata')";

            // Execute the SQL query
            if (mysqli_query($conn, $sql)) {
                $data['content'] = "<p>New student record has been added.</p>";
            } else {
                $data['content'] = "<p>Error: " . mysqli_error($conn) . "</p>";
            }

        } 
    

    } else {

        // Render the add student form
        $data['content'] = <<<EOD
        <h2 style="font-size: 24px; color: #2c3e50; margin-bottom: 20px;">Add New Student</h2>
        <form name="frmdetails" action="" method="post" enctype="multipart/form-data">
            Student ID:
            <input name="studentid" type="text" value="" required /><br/>
            Password:
            <input name="password" type="password" value="" required /><br/>
            Date of Birth:
            <input name="dob" type="date" value="" /><br/>
            First Name:
            <input name="firstname" type="text" value="" required /><br/>
            Last Name:
            <input name="lastname" type="text" value="" required /><br/>
            Address:
            <input name="house" type="text" value="" /><br/>
            Town:
            <input name="town" type="text" value="" /><br/>
            County:
            <input name="county" type="text" value="" /><br/>
            Country:
            <input name="country" type="text" value="" /><br/>
            Postcode:
            <input name="postcode" type="text" value="" /><br/>
            Image:
            <input type="file" name="image"><br/>
            <input type="submit" value="Save" name="submit"/>
        </form>
EOD;
    }

    // Render the template
    echo template("templates/default.php", $data);

} else {
    // Redirect to login page if user is not logged in
    header("Location: index.php");
}

// Include footer template
// echo template("templates/partials/footer.php");

?>