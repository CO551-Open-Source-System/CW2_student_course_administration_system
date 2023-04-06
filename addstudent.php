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

    //   // build an sql statment to update the student details
    //   $sql = "update student set firstname ='" . $_POST['txtfirstname'] . "',";
    //   $sql .= "lastname ='" . $_POST['txtlastname']  . "',";
    //   $sql .= "house ='" . $_POST['txthouse']  . "',";
    //   $sql .= "town ='" . $_POST['txttown']  . "',";
    //   $sql .= "county ='" . $_POST['txtcounty']  . "',";
    //   $sql .= "country ='" . $_POST['txtcountry']  . "',";
    //   $sql .= "postcode ='" . $_POST['txtpostcode']  . "' ";
    //   $sql .= "where studentid = '" . $_SESSION['id'] . "';";
    //   $result = mysqli_query($conn,$sql);

    //insert the statment 
    
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
   //  student id  
   First Name :
   <input name="txtfirstname" type="text" value="" /><br/>
   Surname :
   <input name="txtlastname" type="text"  value="" /><br/>
   //password
   Number and Street :
   <input name="txthouse" type="text"  value="" /><br/>
   Town :
   <input name="txttown" type="text"  value="" /><br/>
   County :
   <input name="txtcounty" type="text"  value="" /><br/>
   Country :
   <input name="txtcountry" type="text"  value="" /><br/>
   Postcode :
   <input name="txtpostcode" type="text"  value="" /><br/>
   <input type="submit" value="Save" name="submit"/>
   </form>

EOD;

   }

   // render the template
   echo template("templates/default.php", $data);

} else {
   header("Location: index.php");
}

echo template("templates/partials/footer.php");

?>
