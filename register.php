<!---Include server file--->
<?php include('server.php') ?>

<!---Declare html--->
<!DOCTYPE html>
<html>
<head>
    <!---Title--->
  <title>Registration </title>
  <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>
  
<div class="header">
  	<h2>Create a New Account</h2>
  </div>
	
  <form method="post" action="register.php">
      
  <?php include('errors.php'); ?>
  
    
      <div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
  
    <div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="<?php echo $email; ?>">
  	</div>
  
  
      <div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  
			
      <div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password_2">
  	</div>
      
    
     <div class="input-group">
     <button type="submit" class="btn" name="register_user">Register</button>
  	</div>
  	<p>
  		Already have an account? <a href="login.php">Log in</a>
  	</p>
  </form>
</body>
</html>