<?php include('server.php') ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Hospital Database</title>
		<link rel="stylesheet" type="text/css" href="../styles/loginstyles.css">
		<link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poiret+One|Quicksand" rel="stylesheet">
	</head>
	<body>
		<div>
			<h2><a style="color:white;">Logout</a></h2>
		</div>
		<div>
			<h1>
				<div class="container">
					<div class="hospital">
						<a>HOSPITAL</a>
					</div>
					<div class="firstpart">
						<a>DATAB</a>
					</div>
					<div class="secondpart">
						<a>æ</a>
					</div>
					<div class="thirdpart">
						<a>S</a>
					</div>
				</div>
			</h1>
			<nav>
				<ul>
					<li><a style="font-size: 18pt;" >Welcome</a></li>
				</ul>
			</nav>
		</div>
		<section class="contact" id="contact">
				<h2 class="contact-title">Register</h2>
				<form action="register.php" method="post" id="contactForm" class="clearfix">
				<?php include('errors.php'); ?>
					<label for="username"></label>
					<input type="text" placeholder="Username" id="username" name="username" required> 
					<label for="email"></label>
					<input type="email" placeholder="Email" id="email" name="email" required>		
					<label for="password"></label>
					<input type="password" placeholder="Password" id="password" name="password_1" required>  
					<label for="cPassword"></label>
					<input type="password" placeholder=" Confirm Password" id="password" name="password_2" required>  
					<button type="submit" name="reg_user">Register</button>
				<div>
					<p class="reg">Have an account? <a href="login.php">Login</a></p>
				</div>
			</form>
		</section>
	</body>
<footer>
		<p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
</footer>
</html>
