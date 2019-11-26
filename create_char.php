<?php include('character_server.php') ?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Create A New Character</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="login.php">Logout</a>
				<nav>
					<a href="index.html">Home</a>
				</nav>
			</header>

		<!-- Nav -->
			<nav id="menu">
				<ul class="links">
					<li><a href="index.html">Home</a></li>
					<li><a href="elements.html">Elements</a></li>
					<li><a href="generic.html">Generic</a></li>
				</ul>
			</nav>

		<!-- Heading -->
			<div id="heading" >
				<h1>Create A New Character</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Fill in Details</h2>
						</header>
						<form method="post" action="create_char.php">
      
  <?php include('errors.php'); ?>
  
	<br>
      <div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="char_name" value="<?php echo $char_name; ?>">
    </div>
	
		<br>	
    <div class="input-group">
  	  <label>Race</label>
  	  <input type="text" name="char_race" value="<?php echo $char_race; ?>">
  	</div>
  
		<br>
      <div class="input-group">
  	  <label>Eye Color</label>
  	  <input type="text" name="char_eye_color" value="<?php echo $char_eye_color; ?>">
  	</div>
	
		<br>
      <div class="input-group">
  	  <label>Hairstyle</label>
  	  <input type="text" name="char_hair" value="<?php echo $char_hair; ?>">
  	</div>
			
		<br>
      <div class="input-group">
  	  <label>Weight</label>
  	  <input type="text" name="char_weight" value="<?php echo $char_weight; ?>">
  	</div>

		<br>
      <div class="input-group">
  	  <label>Height</label>
  	  <input type="text" name="char_height" value="<?php echo $char_height; ?>">
  	</div>

		<br>
    <br>
                
     <div class="input-group">
     <button type="submit" class="btn" name="create_character">Create Character</button>
  	</div>

  </form>
                    
 
      <input type='submit'value='Back' class="button" onclick="document.location.href='character_s.php';"/>      


                
      </section>

		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>