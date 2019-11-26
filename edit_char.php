<?php include('character_server.php') ?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Edit Character</title>
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
				<h1>Edit Character</h1>
			</div>

		<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<div class="content">
						<header>
							<h2><?php echo $_SESSION['char_name']; ?></h2>
						</header>


							<?php
							$char_name  = $_SESSION['char_name'];
							$user_id  = $_SESSION['user_id'];
							$db = mysqli_connect('localhost', 'root', '', 'characterbuilder');
							$results = mysqli_query($db,"SELECT * FROM characters WHERE Name='$char_name' AND user_id='$user_id'");
							$row = mysqli_fetch_array($results); 
							$armour = $row['armour'];
							$weapon = $row['weapon'];
							mysqli_data_seek($results, 0);
							
							?>
						
						
						<table class="striped">
						<tr class="header">
							<td>Intelligence</td>
							<td>Strength</td>
							<td>Endurance</td>
							<td>Dexterity</td>
							<td>Toughness</td>
							</tr>
							<?php
							while ($row = mysqli_fetch_array($results)) {
								echo "<tr>";
								echo "<td>".$row['intelligence']."</td>";
								echo "<td>".$row['strength']."</td>";
								echo "<td>".$row['endurance']."</td>";
								echo "<td>".$row['dexterity']."</td>";
								echo "<td>".$row['toughness']."</td>";
								echo "</tr>";
							}

							?>
						</table>

						<?php
						
						if(isset($_POST['setArmour'])) {
   										
					
							$armour = $_POST['armour'];
							
							$query1 = "SELECT armour FROM characters";
							$armourResult1 = mysqli_query($db, $query1);
							$value1 = mysqli_fetch_array($armourResult1);
							$char_armour = $value1['armour']; 
							
							if($char_armour != $armour){


								$query = "SELECT * FROM armour WHERE armour_name = '$armour'";
								$armourResult = mysqli_query($db, $query);
								$value = mysqli_fetch_array($armourResult);
						
								$intel_armour = $value['intel_effect'];
								$strength_armour = $value['strength_effect'];
								$endur_armour = $value['endur_effect'];
								$dext_armour = $value['dext_effect'];
								$tough_armour = $value['toughness_effect'];
						
								//retrieve current character stats
								$query2 = "SELECT * FROM characters WHERE Name = '$char_name'";
								$charResult = mysqli_query($db, $query2);
								$value2 = mysqli_fetch_array($charResult);
								
								$char_intel = $value2['intelligence'];
								$char_strength = $value2['strength'];
								$char_endur = $value2['endurance'];
								$char_dext = $value2['dexterity'];
								$char_toughness = $value2['toughness'];
						
								//calculate stat updates
								$new_intel = $char_intel + $intel_armour;
								$new_strength = $char_strength + $strength_armour;
								$new_endur = $char_endur + $endur_armour;
								$new_dext = $char_dext + $dext_armour;
								$new_tough = $char_toughness + $tough_armour;
						
								//update character stats
								$query3 = "UPDATE characters SET intelligence = '$new_intel', strength = '$new_strength', 
																endurance= '$new_endur',
																dexterity = '$new_dext',
																toughness = '$new_tough',
																armour = '$armour'            
																WHERE Name = '$char_name'";
								$setArmour = mysqli_query($db, $query3);

								if (mysqli_query($db, $query3)) {
									$message = "Record updated successfully";
								} else {
									$message =  "Error updating record: " . mysqli_error($db);
								}

								echo "<meta http-equiv='refresh' content='0'>";
								
							}
							
						}
					
						?>


						<h4>Armour</h4>
						<h4>Equipped: <?php echo $armour?></h4>
						<form method = "post">
                        <select name = "armour" action = 'character_server.php'>   
								
								<?php 

								$armour = mysqli_query($db,"SELECT armour_name FROM armour ");								
								while($rows = $armour ->fetch_assoc())
								{
									$char_armour = $rows['armour_name'];
								
									echo "<option value = '$char_armour'> $char_armour </option>"; 
								}
								?>                
                            </select> 
                            <br>
							<input type='submit'name = 'setArmour' value='Equip' class="button" />  
						</form> 
						
						<?php
						
						
						if(isset($_POST['setWeapon'])) {
   										
					
							$weapon = $_POST['weapon'];
							
							$query1 = "SELECT weapon FROM characters";
							$weaponResult1 = mysqli_query($db, $query1);
							$value1 = mysqli_fetch_array($weaponResult1);
							$char_weapon = $value1['weapon']; 
							
							if($char_weapon != $weapon){

								$query = "SELECT * FROM weapons WHERE weapon_name = '$weapon'";
								$weaponResult = mysqli_query($db, $query);
								$value = mysqli_fetch_array($weaponResult);
						
								$intel_weapon = $value['intel_effect'];
								$strength_weapon = $value['strength_effect'];
								$endur_weapon = $value['endur_effect'];
								$dext_weapon = $value['dext_effect'];
								$tough_weapon = $value['toughness_effect'];
						
								//retrieve current character stats
								$query2 = "SELECT * FROM characters WHERE Name = '$char_name'";
								$charResult = mysqli_query($db, $query2);
								$value2 = mysqli_fetch_array($charResult);
								
								$char_intel = $value2['intelligence'];
								$char_strength = $value2['strength'];
								$char_endur = $value2['endurance'];
								$char_dext = $value2['dexterity'];
								$char_toughness = $value2['toughness'];
						
								//calculate stat updates
								$new_intel = $char_intel + $intel_weapon;
								$new_strength = $char_strength + $strength_weapon;
								$new_endur = $char_endur + $endur_weapon;
								$new_dext = $char_dext + $dext_weapon;
								$new_tough = $char_toughness + $tough_weapon;
						
								//update character stats
								$query3 = "UPDATE characters SET intelligence = '$new_intel', strength = '$new_strength', 
																endurance= '$new_endur',
																dexterity = '$new_dext',
																toughness = '$new_tough',
																weapon = '$weapon'            
																WHERE Name = '$char_name'";
								$setWeapon = mysqli_query($db, $query3);

								if (mysqli_query($db, $query3)) {
									$message = "Record updated successfully";
								} else {
									$message =  "Error updating record: " . mysqli_error($db);
								}

								echo "<meta http-equiv='refresh' content='0'>";
								
							}
							
						}
					
						?>











						<h4>Weapon</h4>
						<h4>Equipped: <?php echo $weapon ?></h4>
						<form method = "post">
                        <select name = "weapon" action = 'character_server.php'>   
								
								<?php 

								$weapon = mysqli_query($db,"SELECT weapon_name FROM weapons");								
								while($rows = $weapon ->fetch_assoc())
								{
									$char_weapon = $rows['weapon_name'];
								
									echo "<option value = '$char_weapon'> $char_weapon </option>"; 
								}
								?>                
                            </select> 
                            <br>
							<input type='submit'name = 'setWeapon' value='Equip' class="button" />  
                        </form> 
						
      
  
	
		<br>
		<br>						
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