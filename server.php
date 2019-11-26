<?php
session_start();

// initialize variables
$username = "";
$email    = "";

//array for errors
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'characterbuilder');



// REGISTER USER
if (isset($_POST['register_user'])) {
  
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);



  // add corresponding errors into $errors array
  if (empty($username)) { array_push($errors, "We require a username"); }
  if (empty($email)) { array_push($errors, "We require an email"); }
  if (empty($password_1)) { array_push($errors, "We require a password"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The passwords do not match");
  }

  // check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password 
  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
    
    

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    
    //query for user id
     $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
     $result = mysqli_query($db, $query);
     $user_id = mysqli_fetch_object($result);
     
     $_SESSION['user_id'] = $user_id ->id;
    
    header('location: index.html');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  
  
    $password = md5($password); 
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    
  
    if (mysqli_num_rows($results) == 1) {
  
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Login Successful";
      
      //query for user id
      $query = "SELECT id FROM users WHERE username='$username' AND password='$password'";
      $result = mysqli_query($db, $query);
      $user_id = mysqli_fetch_object($result);
      
      $_SESSION['user_id'] = $user_id ->id;
      
      header('location: index.html');
  
    }else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  
  
    
  	$query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    
  
    if (mysqli_num_rows($results) == 1) {
  
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "Login Successful";
      
      //query for admin id
      $query = "SELECT admin_id FROM admin WHERE username='$username' AND password='$password'";
      $result = mysqli_query($db, $query);
      $admin_id = mysqli_fetch_object($result);
      
      $_SESSION['admin_id'] = $admin_id ->admin_id;
      
      header('location: admin_home.php');
  
    }else {
  		array_push($errors, "Wrong username or password");
  	}
  }
}

?>