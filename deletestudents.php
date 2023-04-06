<?php
session_start();

// Include configuration and database connection files
include("_includes/config.inc");   
include("_includes/dbconnect.inc");
include("_includes/functions.inc");

// Check if user is logged in
if (isset($_SESSION['id'])) {

   // Check if the delete button was clicked
   if(isset($_POST['deletebtn'])) {

      // Get the IDs of the selected students
      $selected_students = $_POST['selected_students'];
         
      // Loop through the selected students and delete each one
      foreach($selected_students as $studentid) {
         $sql = "DELETE FROM student WHERE studentid = '$studentid'";
         mysqli_query($conn, $sql);
      }
      
      // Redirect to student page after deleting students
      header("Location: student.php");

   } else {
      // Redirect to login page if user is not logged in
      header("Location: index.php");
   }
}

// Include footer template  
echo template("templates/partials/footer.php");