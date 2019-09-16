<html>
<head>
	<title>Video Playback</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
    <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poiret+One|Quicksand" rel="stylesheet">
</head>

<?php
	session_start();
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
	include "file_constants.php";
	$playback = array();
	$link = mysql_connect($host, $user, $pass) OR DIE (mysql_error());
	// select the Database
	mysql_select_db($db) OR DIE ("Unable to select db".mysql_error());
	// The SQL query
	$sql= "SELECT id, nom, url FROM videoFiles;";
	$result = mysql_query("$sql") or die("Invalid query: " . mysql_error());
	if(! $result ) {
		die('Could not get data: ' . mysql_error());
	}

	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		array_push($playback, $row['url'].$row['nom']);
	}
	mysql_close($link);
?>

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
    		<p>The videos on record are:</p><br><br>
    		<?php
    		foreach($playback as $name){
    		echo "<iframe width='auto' height='auto'
			src='".$name
			."'></iframe><br/><br/>";} ?>
    	</div>
    </body>
    <footer>
		<p class="statement">&copy Copyright 2018. The Databaes. All Rights Reserved.</p>
	</footer>
    </html>
