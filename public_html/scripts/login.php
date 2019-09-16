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
				<h2 class="contact-title">Login</h2>
				<form action="server.php" method="post" id="contactForm" class="clearfix">
				<?php include('errors.php') ?>
					<label for="username"></label>
					<input type="text" placeholder="Username" id="username" name="Username" required> 		
					<label for="password"></label>
					<input type="password" placeholder="Password" id="password" name="Password" required>  
					<button type="submit" name="login_user">Login</button>
					<div>
						<p class="reg">Not yet a member? <a href="register.php">Sign up</a></p>
					</div>
				</form>
			</section>
	</body>
	<footer>
		<p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
	</footer>
</html>
