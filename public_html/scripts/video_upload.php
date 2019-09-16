<?php
	session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
	include "file_constants.php";
	$err_resp = "";
	if(isset($_POST['submit'])) {
		$name = $_FILES['fileToUpload']['name'];
		$temp = $_FILES['fileToUpload']['tmp_name'];
		$target_dir = "uploaded/";
		$url = "http://ugrad.bitdegree.ca/~judeabufarha/scripts/$target_dir";
		if(is_uploaded_file($temp)) {
			$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if file already exists
			if (file_exists($target_file)) {
				$err_resp= "Sorry, file already exists.";
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 10000000) {
			$err_resp= "Sorry, your file is too large.";
			$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "mp4" ) {
				$err_resp= "Sorry, only JPG, JPEG, PNG, GIF, MP3, MP4 files are allowed.";
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			$err_resp= "Sorry, your file was not uploaded.";
			// if everything is ok, try to upload file
			} else {
				//chmod($target_file,0755);
				if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
					$err_resp = "The file ". basename( $_FILES['fileToUpload']['name']). " has been uploaded.";

					$link = mysql_connect($host, $user, $pass) OR DIE (mysql_error());
					// select the Database
					mysql_select_db ($db) OR DIE ("Unable to select db".mysql_error());
					// The SQL query
					$sql = "INSERT INTO videoFiles VALUES ('', '$name', '$url');";
					// Insert the file
					mysql_query($sql) or die("Error in Query: " . mysql_error());
					$err_resp = $err_resp . '<br/><p>File successfully saved in database with id ='. mysql_insert_id().' </p>';
					mysql_close($link);
					} else {
						$err_resp = "Sorry, there was an error uploading your file.";
					}
				}
			} else {
				$err_resp =  "No file selected!";
			}
		}
?>
<html>
<head>
	<title>Video Playback</title>
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
						<h2>Upload a Video</h2><br/>
						<p> Due to server space, videos exceeding 15 seconds will not upload </p>
					</div>
					<form class= "addForm" action="video_upload.php" method="POST" enctype="multipart/form-data">
	      		<input type="file" name="fileToUpload" />
	      		<input type="submit" name="submit" value ="Upload" />
	    		</form>
					<div class="div d3">
						<p><?php echo $err_resp;?></p>
					</div>
				</div>
  	</body>
  	<footer>
		<p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
	</footer>
</html>
