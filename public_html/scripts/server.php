<?php 
	if (!isset($_SESSION)) {
		session_start(); 
	}	
	
	include "file_constants.php";
	// variable declaration
	$username = "";
	$email    = "";
	//This resets everytime the page loads so no error message is displayed. Guess it's a feature now...
	$errors = array(); 
	$_SESSION['success'] = "";

	// connect to database
	
	
	$db_info = new mysqli($host, $user, $pass, $db, $port);
	// REGISTER USER
	if (isset($_POST['reg_user'])) {

		// receive all input values from the form
		$username = mysqli_real_escape_string($db_info, $_POST['username']);
		$email = mysqli_real_escape_string($db_info, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db_info, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db_info, $_POST['password_2']);

		// form validation: ensure that the form is correctly filled
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }

		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}
		
		// check if username exists
		$query = "SELECT * FROM login_users WHERE username = '$username' OR email='$email'";
		$results = mysqli_query($db_info, $query);
		
		if (mysqli_num_rows($results) !=0){
			array_push($errors, "This username/ email already exists");
		}
		
		
		// register user if there are no errors in the form
		if (count($errors) == 0) {
			$password = md5($password_1);//encrypt the password before saving in the database

			$query = "INSERT INTO login_users (username, email, password) 
					  VALUES('$username', '$email', '$password')";
					  		
			mysqli_query($db_info, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";

		
			header('location: ../index.html');

		}
	}

	// LOGIN USER
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db_info, $_POST['Username']);
		$password = mysqli_real_escape_string($db_info, $_POST['Password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM login_users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db_info, $query);

			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: ../index.html');
			}else {
				array_push($errors, "Wrong username/password combination");
				$temp = $errors;
				header('location: login.php');
				
			}
		}
	}

?>



