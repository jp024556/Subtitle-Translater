<?php
	include "includes/db.php";
	if(isset($_GET['dl'])){
		$dl = mysqli_real_escape_string($conn, $_GET['dl']);
		$file = "downloads/".$dl;
		if( !file_exists($file) ) die("File not found");
			// Force the download
			header("Content-Disposition: attachment; filename=" . basename($file) . "");
			header("Content-Length: " . filesize($file));
			header("Content-Type: application/octet-stream;");
			readfile($file);
	}else{
		echo "Invalid approach !";
	}
?>
