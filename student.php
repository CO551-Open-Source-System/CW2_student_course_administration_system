<?php

   // Include configuration and database connection files
   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check if user is logged in
   if (isset($_SESSION['id'])) {
     

      // Include header and navigation templates
      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "SELECT * FROM student;";
      
      
      // Execute the SQL query
      $result = mysqli_query($conn,$sql);

      // Create form to delete selected students
      $data['content'] .= "<form action = 'deletestudents.php' method = 'POST'>";

      // prepare page content
      $data['content'] .= "<table class='student-table'>";
      $data['content'] .= "<tr><th colspan='11' align='center'>Student Details</th></tr>";
      $data['content'] .= "<tr><th>Student ID</th><th>Date of Birth</th>";
      $data['content'] .= "<th>First Name</th><th>Last Name</th><th>House</th>";
      $data['content'] .= "<th>Town</th><th>County</th><th>Country</th><th>Postcode</th><th>Image</th><th>Select to Delete</th></tr>";
      
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid]</td>";
         $data['content'] .= "<td> $row[dob] </td>";
         $data['content'] .= "<td> $row[firstname] </td>";
         $data['content'] .= "<td> $row[lastname] </td>";
         $data['content'] .= "<td> $row[house] </td>";
         $data['content'] .= "<td> $row[town] </td>";
         $data['content'] .= "<td> $row[county] </td>";
         $data['content'] .= "<td> $row[country] </td>";
         $data['content'] .= "<td> $row[postcode] </td>";
         if (isset($row['image'])) {
            $data['content'] .= "<td><img src='getjpg.php?studentid=" . $row['studentid']. "' height='100' width='100'</td>";
            // $data['content'] .= "<td><img src='getjpg.php?studentid=" . base64_encode($row['image']) . "' /></td>";
            //   $data['content'] .= "<td><img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' /></td>";
            // echo "<td><img src='getjpg.php?studentid=" . $row['studentid']. "' height='100' width='100'</td>";
         } else {
            $data['content'] .= "<td></td>";
         }
         $data['content'] .= "<td><input type='checkbox' name='selected_students[]' value='$row[studentid]'></td></tr>";
      }
      $data['content'] .= "</table>";
      
      
      // Add delete button to the form
      $data['content'] .= "<input class=delete-btn' type='submit' name='deletebtn' value='Delete Selected Students' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
      $data['content'] .= "</form>";

      // Render the template
      echo template("templates/default.php", $data);

   } else {
      // Redirect to login page if user is not logged in
      header("Location: index.php");
   }
   
   // Include footer template
   // echo template("templates/partials/footer.php");

?>