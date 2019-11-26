<?php include('server.php') ?>


<!DOCTYPE html>

<html>

<head>

<title>Character Builder</title>

  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  <div class="header">
  	<h2>User Login</h2>
  </div>
	 
  <form method="post" action="login.php">
      
  
  <?php include('errors.php'); ?>
      
    <div class="input-group">
  		<label>Username</label>
  		<input type="text" name="username" >
  	</div>
      
    
    <div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password">
  	</div>
      
    
    <div class="input-group">
  		<button type="submit" class="btn" name="login_user">Login</button>
  	</div>
      
      <p>
  	    Don't have an account yet? <a href="register.php">Sign up</a>
    </p>
    <br>
    <p>
  	    Are you an Admin? <a href="admin_login.php">Log in here</a>
    </p>
  
    </form>
</body>

</html>