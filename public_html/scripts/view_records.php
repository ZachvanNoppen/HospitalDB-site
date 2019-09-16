<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    include "file_constants.php";
    $err_resp ="";
    $data = array();
    $conn = new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error){
        $err_resp = "Connection failed:".$conn->connect_error;
    }
    if(isset($_POST['submit'])){
        $check = true;
        if(isset($_POST['id']) && ($_POST['id'] != "")){
            $id = $_POST['id'];
            $sql = "SELECT * FROM employee WHERE employeeId = $id";
        }
        elseif(isset($_POST['nom']) && ($_POST['nom'] != "")){
            $nom = $_POST['nom'];
            $sql = "SELECT * FROM employee WHERE nom = '$nom'";
        }
        elseif(isset($_POST['specialty']) && ($_POST['specialty'] != "")){
            $specialty = $_POST['specialty'];
            $sql = "SELECT * FROM employee WHERE specialty = '$specialty'";
        }
        elseif(isset($_POST['id']) && ($_POST['id'] != "") && isset($_POST['nom']) && ($_POST['nom'] != "")){
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $sql = "SELECT * FROM employee WHERE employeeId = $id AND nom = '$nom'";
        }
        elseif(isset($_POST['id']) && ($_POST['id'] != "") && isset($_POST['specialty']) && ($_POST['specialty'] != "")){
            $id = $_POST['id'];
            $specialty = $_POST['specialty'];
            $sql = "SELECT * FROM employee WHERE employeeId = $id AND specialty = '$specialty'";
        }
        elseif(isset($_POST['id']) && ($_POST['id'] != "") && isset($_POST['nom']) && ($_POST['specialty'] != "") && isset($_POST['specialty']) && ($_POST['specialty'] != "")){
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $specialty = $_POST['specialty'];
            $sql = "SELECT * FROM employee WHERE employeeId = $id AND nom = '$nom' AND specialty = '$specialty'";
            
        }
        else{
            $err_resp = "Please enter input into the feilds.";
            $check = false;
        }
        
        if($check != false){
            $query = mysqli_query($conn, $sql);
            if(! $query ) {
                $err_resp = 'Could not get data: ' . mysqli_error($conn);
            }
            while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                array_push($data, "ID : {$row['employeeId']}  <br> ". "Name : {$row['nom']} <br> ". "Specialty : {$row['specialty']} <br> ". "Phone Number: {$row['phoneNumber']}  <br> ". "Address : {$row['address']} <br> ". "Email : {$row['email']} <br> ". "--------------------------------<br>");
            }
            if(sizeof($data) != 0){
                $err_resp = "Fetched data successfully\n";
            }
            else{
                $err_resp = "No data matching your input was found\n";
            }
    }
    $conn->close();
}
?>

<html>
<head>
    <title>View Records</title>
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
            <h2>View Employee Records</h2>
        </div>
        <div class="div d3">
            <form class="addForm" action="view_records.php" method="post">
                Search by one of the following:
                <input type="text" name="id" placeholder="ID">
                <input type="text" name="nom" placeholder="Name">
                <input type="text" name="specialty" placeholder="specialty">
                <input type="submit" name="submit">
            </form>
        </div>
        <div class="div results">
            <p><?php echo $err_resp; ?></p>
            <p>
            </p>
            <p> <?php foreach($data as $value){echo $value;} ?></p>
        </div>
    </div>
</body>
<footer>
        <p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
</footer>
</html>