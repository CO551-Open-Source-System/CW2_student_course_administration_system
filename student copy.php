<!-- Sudath Nawagamuwage CO551-Open Source System LoogBook 6-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" media="screen" href="stylesheet.css"/>
        <title>PHP log book Sudath Nawagamuwage</title>	
    </head>
    <body>
        <div class="page-container">
            <header>
                <h1>My PHP Log book page</h1>
            </header>
            <div class="content-wrap">
                <div class="container">
                    <?php
                      // Database connection file   
                      include("_includes/dbconnect.inc");
                      //Execute the SQL statement 
                      $sql = "select studentid,firstname from student;";

                      $result = mysqli_query($conn, $sql);


                      echo "<table align='center' border='1'>";
                      echo "<tr><th width='200' align='left'>ID</th><th width='200' align='left'>Name</th><th>Image</th></tr>";
                      
                      //Execute sql statement
                      while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>";
                        echo "<td>" . $row['studentid'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td><img src='getjpg.php?studentid=" . $row['studentid']. "' height='100' width='100'</td>";
                        echo "</tr>";
                      }

                      echo "</table>";

                      mysqli_close($conn);
                    ?>
                  </div>
            </div>
            <!-- footer -->
            <footer class="footer">
            <p>&copy; 2023 My Website. All rights reserved.</p>
            </footer>
        </div>
    </body>
</html>