<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    include "file_constants.php";
    $output = "";
    $conn = new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }
    if(isset($_POST['submit'])){
        if($_POST['nom'] == "" || $_POST['specialty'] == "" || $_POST['phoneNumber'] == "" || $_POST['address'] ==""|| $_POST['email'] ==""){
            $output = "Please enter data into all the fields above";
        }
        else{

            if(!ctype_digit($_POST['phoneNumber']) || strlen($_POST['phoneNumber']) > 13 || strlen($_POST['phoneNumber']) < 9 ){
                $output = "Please Enter a valid phone number";
            }
            else{
                $nom = $_POST['nom'];
                $specialty = $_POST['specialty'];
                $phoneNumber = $_POST['phoneNumber'];
                $address = $_POST['address'];
                $email = $_POST['email'];

                $sql = "INSERT INTO employee (employeeid, nom, specialty, phoneNumber, address, email) VALUES ('NULL','$nom', '$specialty', '$phoneNumber', '$address', '$email')";
                $query = mysqli_query($conn, $sql);
                if(! $query ) {
                    die('ERROR: ' . mysqli_error($conn));
                } else {
                    $output = "Record added successfully. <br />";
                }
            }
           
        }
    }
        
    
    $conn->close();
?>

<html>
<head>
	<title>Add Records</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One|Quicksand" rel="stylesheet">
</head>
<body>
        <div>
            <h2><a href="logout.php">Logout</a></h2>
        </div>
        <div>
           <h1>
                <div class="container">
                    <div class="hospital">
                        <a href="../index.html" class="styledH">HOSPITAL</a>
                    </div>
                    <div class="firstpart">
                        <a href="../index.html" class="styledH">DATAB</a>
                    </div>
                    <div class="secondpart">
                        <a href="../index.html" class="styledH">æ</a>
                    </div>
                    <div class="thirdpart">
                        <a href="../index.html" class="styledH">S</a>
                    </div>
                </div>
            </h1>
            <nav>
                <ul>
                    <li class="dropdown"><a>Add Records</a>
						<div class="dropdown-content">
							<a href="../scripts/addrecords.php">Employee Table</a>
							<a href="../scripts/add_pat_records.php">Patient Table</a>
						</div></li>
					<li class="dropdown"><a>Update Records</a>
						<div class="dropdown-content">
							<a href="../scripts/update_records.php">Employee Table</a>
							<a href="../scripts/update_pat_records.php">Patient Table</a>
						</div></li>
					<li class="dropdown"><a>View Records</a>
						<div class="dropdown-content">
							<a href="../scripts/view_records.php">Employee Table</a>
							<a href="../scripts/view_pat_records.php">Patient Table</a>
						</div></li>
					<li class="dropdown"><a>Delete Records</a>
						<div class="dropdown-content">
							<a href="../scripts/delete_records.php">Employee Table</a>
							<a href="../scripts/delete_pat_records.php">Patient Table</a>
						</div></li>
					<li class="dropdown"><a>Manage Multimedia</a>
						<div class="dropdown-content">
							<a href="../scripts/video_upload.php">Add Video</a>
							<a href="../scripts/video_stream.php">View Videos</a>
						</div></li>
                </ul>
            </nav>
        </div>
    <div class="master">
        <div class="div d1">
    		<h2>Add Employee Records</h2>
    	</div>
        <div class="div d3">
            <form class="addForm" action="addrecords.php" method="post">
                <input type="text" name="nom" placeholder="Name">
                <input type="text" name="specialty" placeholder="Specialty">
                <input type="text" name="phoneNumber" placeholder="Phone Number">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="email" placeholder="Email">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div class="div results">
            <p><?php echo $output; ?></p>
        </div>
    </div>
</body>
<footer>
        <p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
</footer>
</html>