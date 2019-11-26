<?php 
  session_start(); 

//Check if user is logged in 
//isset checks if there is a field with the name 'username' in a submitted form 

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
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

<div class="header">
	<h2>Home page</h2>
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
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		
			<small>
						<p>ID:  <i style="color: #889;">(<?php echo $_SESSION['user_id']; ?>)</i> </p>
						<br>
						
						<div class="input-group">
            <input type='button'value='View Characters' class="btn" onclick="document.location.href='characters.php';"/>         
        	</div>
					
					<br>
					<p> <a href="user_home.php?logout='1'" style="color: red;">Logout</a> </p>
					</small>

        
        
        
    <?php endif ?>

    
</div>
		
</body>
</html>