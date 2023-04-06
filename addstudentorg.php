<?php

// / Include configuration and database connection files
include("_includes/config.inc");
include("_includes/dbconnect.inc");
include("_includes/functions.inc");


// check if user is logged in
if (isset($_SESSION['id'])) {

   // Include header and navigation templates
   echo template("templates/partials/header.php");
   echo template("templates/partials/nav.php");

   // if the form has been submitted
   if (isset($_POST['submit'])) {
    
   
     
    // hash the password 
    $hash_password = password_hash($_POST
    ['password'], PASSWORD_DEFAULT);

    //Insert the value to database
    $sql = "INSERT INTO student (studentid, password, dob, firstname, lastname, house, town, county, country, postcode)"; 
    $sql = $sql . " values ('$_POST[studentid]','$hash_password','$_POST[dob]',
    '$_POST[firstname]','$_POST[lastname]','$_POST[house]','$_POST[town]',
    '$_POST[county]','$_POST[country]','$_POST[postcode]')"; 
    
    
    // check the queary
    // echo $sql;
    
    // Execute the SQL query
    $result = mysqli_query($conn,$sql);

    $data['content'] = "<p>student recoard has been added</p>";

   }
   else {


      // using <<<EOD notation to allow building of a multi-line string
      // see http://stackoverflow.com/questions/6924193/what-is-the-use-of-eod-in-php for info
      // also http://stackoverflow.com/questions/8280360/formatting-an-array-value-inside-a-heredoc
      $data['content'] = <<<EOD

   <h2>Add New Studenet</h2>
   <form name="frmdetails" action="" method="post">
   <!-- student id -->  
   First Name :
   <input name="firstname" type="text" value="" required /><br/>
   Surname :
   <input name="lastname" type="text"  value="" required /><br/>
   <!-- password -->
   Number and Street :
   <input name="house" type="text"  value="" /><br/>
   Town :
   <input name="town" type="text"  value="" /><br/>
   County :
   <input name="county" type="text"  value="" /><br/>
   Country :
   <input name="country" type="text"  value="" /><br/>
   Postcode :
   <input name="postcode" type="text"  value="" /><br/>
   <input type="submit" value="Save" name="submit"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {

    // Redirect to login page if user is not logged in
    header("Location: index.php");
}

// Include footer template
echo template("templates/partials/footer.php");

?>
