
<?php include('server.php') ?>



<!DOCTYPE html>
<html>
<head>
	<title>Add Equipment</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php 

if(isset($_POST['add_equip'])){
$equip_type = mysqli_real_escape_string($db, $_POST['equip_type']);
$equip_name = mysqli_real_escape_string($db, $_POST['equip_name']);
$intel_effect = mysqli_real_escape_string($db, $_POST['intel_effect']);
$strength_effect = mysqli_real_escape_string($db, $_POST['strength_effect']);
$endur_effect = mysqli_real_escape_string($db, $_POST['endur_effect']);
$dext_effect = mysqli_real_escape_string($db, $_POST['dext_effect']);
$tough_effect = mysqli_real_escape_string($db, $_POST['tough_effect']);

if (empty($equip_type)) { array_push($errors, "Equipment type is required"); }
if (empty($equip_name)) { array_push($errors, "Equipment name is required"); }
if (empty($intel_effect)) { array_push($errors, "Intelligence effect is required"); }


if (count($errors) == 0) {

    if ($equip_type == 'Armour' || $equip_type == 'armour'){
    $query = "INSERT INTO armour (armour_name, intel_effect, strength_effect,toughness_effect,dext_effect,endur_effect) 
              VALUES('$equip_name', '$intel_effect', '$strength_effect','$tough_effect','$dext_effect','$endur_effect')";
    mysqli_query($db, $query);
    }

    if ($equip_type == 'Weapon' || $equip_type == 'weapon'){
        $query = "INSERT INTO weapons (weapon_name, intel_effect, strength_effect,toughness_effect,dext_effect,endur_effect) 
                  VALUES('$equip_name', '$intel_effect', '$strength_effect','$tough_effect','$dext_effect','$endur_effect')";
        mysqli_query($db, $query);
    }


    header('location: admin_home.php');
  
}
}
?>

<body>

    <div class="header">
        <h2>Add Equipment</h2>
    </div>

    
        
            
            <br>
            <br>
            
            <form method="post" action="register.php">
        
        <?php include('errors.php'); ?>
    
        
        <div class="input-group">
        <label>Equipment Type (Armour or Weapon)</label>
        <input type="text" name="equip_type" >
        </div>
    
        <div class="input-group">
        <label>Name</label>
        <input type="text" name="equip_name" >
        </div>
    
    
        <div class="input-group">
        <label>Intelligence Effect</label>
        <input type="text" name="intel_effect">
        </div>
    
                
        <div class="input-group">
        <label>Strength Effect</label>
        <input type="text" name="strength_effect">
        </div>
        
        <div class="input-group">
        <label>Endnurance Effect</label>
        <input type="text" name="endur_effect">
        </div>
        
        <div class="input-group">
        <label>Dexterity Effect</label>
        <input type="text" name="dext_effect">
        </div>
        
        <div class="input-group">
        <label>Toughness Effect</label>
        <input type="text" name="tough_effect">
        </div>
        
        
        <div class="input-group">
        <button type="submit" class="btn" name="add_equip">Add</button>
        </div>
        <p>
            <a href="admin_home.php">Back</a>
        </p>
 
   
    

</body>

</html>