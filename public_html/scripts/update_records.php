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
        //Get the values that are set
        $input = array( "uNom", "uPhone", "uSpecialty", "uAddress", "uEmail");
        $names = array( "nom", "phoneNumber","specialty", "address","email");
        $used = array(false,false,false,false,false);
        $submit = array();
        $check = false;
        $id = false;
        $nom = false;
        if(isset($_POST['id']) && $_POST['id'] != ""){
            //id is used
            $id = true;
        }
        else{
            $output = "Please enter a employee to search for";
        }

        for($i = 0; $i < 5; $i++){
            if(isset($_POST[$input[$i]]) && $_POST[$input[$i]] != ""){
                $used[$i] = true;
                $check = true;
            }
        }
        $sql = "UPDATE employee SET";
        $success = 0;
        for($i = 0; $i < 5; $i++){
            if($used[$i] != false){
                array_push($submit, $_POST[$input[$i]]);
                
                if($success == 0){
                    $sql = $sql . " $names[$i] = '$submit[$i]'";
                    $success+=1;
                }else{
                    $sql = $sql . ", $names[$i] = '$submit[$i]'";
                }

            }else{
                array_push($submit, "NULL");
            }
        }
        if($id == true){
            $sql = $sql . " WHERE employeeId = ". $_POST['id'];
       }

        if($check != false){
            $query = mysqli_query($conn, $sql);
            if(! $query ) {
                die('Could not get data: ' . mysqli_error($conn));
            }
            else{
                $output = "Data updated successfully";
            }
    }
    $conn->close();
}
?>

<html>
<head>
    <title>Update Records</title>
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
            <h2>Update Employee Records</h2>
        </div>
        <div class="div d3">
            <form class="addForm" action="update_records.php" method="post">
                Select the employee by one of the following:
                <input type="text" name="id" placeholder="ID">
                Enter the information you would like changed
                <input type="text" name="uNom" placeholder="Name">
                <input type="text" name="uPhone" placeholder="Phone Number">
                <input type="text" name="uSpecialty" placeholder="Specialty">
                <input type="text" name="uAddress" placeholder="Address">
                <input type="text" name="uEmail" placeholder="Email Address">
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