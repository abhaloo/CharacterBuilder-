
<?php include('character_server.php') ?>
<!DOCTYPE HTML>
<!--
	Industrious by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Characters</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<a class="logo" href="index.html">Home</a>
				<nav>
					<a href="login.php">Logout</a>
				</nav>
			</header>


		<!-- Heading -->
			<div id="heading" >
				<h1>Characters</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2>Select A Character</h2>
						</header>
                        
                        <form method = "post">
                        <select name = "character" action = 'character_server.php'>   
								
								<?php 
								while($rows = $resultSet ->fetch_assoc())
								{
									$char_name = $rows['Name'];
								
									echo "<option value = '$char_name'> $char_name </option>"; 
								}
								?>                
                            </select> 
                            <br>
							<input type='submit'name = 'editCharacter' value='Edit Character' class="button" />  
                            <input type='submit'name = 'deleteCharacter' value='Delete Character' class="button" />  
                        </form> 
                    
                <br>

                              
                 
                <input type='submit'value='Create A New Character' class="button" onclick="document.location.href='create_char.php';"/>         

                 
             
            
                    
                    
                    
                   </div>
				</div>
            
                
            </section>
                    
		

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>