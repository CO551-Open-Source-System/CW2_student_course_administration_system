<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<h1 class = "mt-3">Login</h1>
  <div class="login-form container">

    <?php 
    if (!empty($message)){
      echo '<div class="alert alert-danger alert-sm" role="alert">' . $message . '</div>';
    }  
    
    ?>

    <form name="frmLogin" action="authenticate.php" method="post">
      <div class="form-group" class>
        <label for="txtid" class="form-label">Student ID:</label>
        <input name="txtid" type="text" class="form-control"  required/>
      </div>
      <div class="form-group">
        <label for="txtpwd"class="form-label">Password:</label>
        <input name="txtpwd" type="password" class="form-control"  required/>
      </div>
      <input type="submit" value="Login" name="btnlogin" class="btn btn-primary" />
    </form>
  </div>
</body>
</html>

