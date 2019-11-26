<?php 
  session_start(); 

//Check if user is logged in 
//isset checks if there is a field with the name 'session' in a submitted form 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
	<h2>Welcome Admin</h2>
</div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome Admin, ID: <strong><?php echo $_SESSION['admin_id']; ?></strong></p>
        <p> <a href="characters.php">Add Weapons/Armour</a></p>
        <p> <a href="user_home.php?logout='1'" style="color: red;">logout</a> </p>
        
    <?php endif ?>

    







</div>
		
</body>
</html>