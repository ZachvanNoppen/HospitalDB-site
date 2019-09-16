<?php
    session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    include "file_constants.php";
    $err_resp = "";
    $conn = new mysqli($host,$user,$pass,$db);
    if ($conn->connect_error){
        $err_resp="Connection failed:".$conn->connect_error;
    }
    if(isset($_POST['submit'])){
        $check = true;
        if(isset($_POST['id']) && ($_POST['id'] != "")){
            $id = $_POST['id'];
            $sql = "DELETE FROM patient WHERE patientId = $id";
        }
        elseif(isset($_POST['nom']) && ($_POST['nom'] != "")){
            $nom = $_POST['nom'];
            $sql = "DELETE FROM patient WHERE nom = '$nom'";
        }
        elseif(isset($_POST['id']) && ($_POST['id'] != "") && isset($_POST['nom']) && ($_POST['nom'] != "")){
            $id = $_POST['id'];
            $nom = $_POST['nom'];
            $sql = "DELETE FROM patient WHERE patientId = $id AND nom = '$nom'";
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
            else{
                $err_resp = "Data deleted successfully";
            }
    }
    $conn->close();
}
?>

<html>
<head>
    <title>Delete Records</title>
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
            <h2>Delete Patient Records</h2>
            <p class="delInBox">Search by one of the following:</p>
        </div>
        <div class="div d3">
            <form class="addForm" action="delete_pat_records.php" method="post">
                
                <input type="text" name="id" placeholder="ID">
                <input type="text" name="nom" placeholder="Name">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
        <div class="div results">
            <p><?php echo $err_resp; ?></p>
        </div>
    </div>
</body>
<footer>
        <p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
</footer>
</html>