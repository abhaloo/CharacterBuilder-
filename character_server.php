<?php

session_start(); 

//initialize variables
$char_name = "";
$char_race = "";
$char_hair = "";
$char_eye_color = ""; 
$char_weight = "";
$char_height = "";
$errors = array(); 

$user_id = $_SESSION['user_id'];

//SHOW CHARACTERS
// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'characterbuilder');

//query to populate dropdown menu 
$query = "SELECT Name FROM characters WHERE user_id = $user_id";
$resultSet = mysqli_query($db, $query);



//Edit Character
if(isset($_POST['editCharacter'])) {

    $char_name = $_POST['character'];
    $user_id = $_SESSION['user_id'];
    $_SESSION['char_name'] = $char_name;

    header('Location: edit_char.php');
    


}

//SET ARMOUR
if(isset($_POST['setArmour'])) {

    

        //echo "<meta http-equiv='refresh' content='0'>";

}

//SET ARMOUR
if(isset($_POST['setWeapon'])) {

    


}
    

//DELETE CHARACTER
if(isset($_POST['deleteCharacter'])) {
    $dropdownlist = $_POST['character'];
    mysqli_query($db,"DELETE FROM characters WHERE Name = '$dropdownlist' ");

}


//CREATE CHARACTER
if (isset($_POST['create_character'])) {

    $char_name = mysqli_real_escape_string($db, $_POST['char_name']);
    $char_race = mysqli_real_escape_string($db, $_POST['char_race']);
    $char_hair = mysqli_real_escape_string($db, $_POST['char_hair']);
    $char_eye_color = mysqli_real_escape_string($db, $_POST['char_eye_color']);
    $char_weight = mysqli_real_escape_string($db, $_POST['char_weight']);
    $char_height = mysqli_real_escape_string($db, $_POST['char_height']);

    if (empty($char_name)) {
        array_push($errors, "No Name: They deserve a name don't you think?");
    }
    
    if (empty($char_hair)) {
        array_push($errors, "No Hair: Yuck");
    }

    if (empty($char_race)) {
        array_push($errors, "No Race: Don't be an anti-racer ");
    }

    if (empty($char_eye_color)) {
        array_push($errors, "No Eye Color: This is important");
    }

    if (empty($char_weight)) {
        array_push($errors, "No weight: You can only be weightless in zero grav!");
    }

    if (empty($char_height)) {
        array_push($errors, "No Height: Height is power");
    }

    if (count($errors) == 0) {
    
    $query = "INSERT INTO characters (Name, user_id,Race, Hairstyle, Eye_Color, Weight, Height) VALUES('$char_name', '$user_id','$char_race','$char_hair', '$char_eye_color','$char_weight','$char_height')";
    mysqli_query($db, $query);

    header('location: character_s.php');


    
    }


}

?>