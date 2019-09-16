<?php 
	session_start(); 

	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must log in first";
		//header('location: login.php');
		include ('server.php');
		//include_once ('login.php'); // This will insure that login.php is included only once
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		//header("location: login.php");
		//include ('login.php');
		include_once ('server.php'); // This will insure that login.php is included only once
		$_SESSION['msg'] = "You must log in first";


	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<div>
		<h2>Home Page</h2>
	</div>
	<div>
	
	You can add your text here....<br>
	
		<!-- notification message -->
		<?php  if (!isset($_SESSION['username'])) : ?>
			<div>
				<h3>
					<?php echo $_SESSION['msg']; ?>
				</h3>
				<p>
					<a href="login.php">Login</a>
				</p>
			</div>
		<?php elseif (isset($_SESSION['success'])) : ?>
			<div>
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif; ?>

	Or you can add your text here....<br>



		<!-- logged in user information -->
		<?php  if (isset($_SESSION['username'])) : ?>
			<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
			<p>If you want to upload a multimedia file you can <a href="multimedia_upload.php" style="color: red;">click here</a> </p>
			<p> <a href="scripts/login.php?logout='1'" style="color: red;">logout</a> </p>
		<?php endif; ?>
	</div>
		
</body>
</html>
