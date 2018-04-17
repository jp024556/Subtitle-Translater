<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Subtitle Guru - All Language Subtitles</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Subtitle Guru</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="upload.php">Upload Subtitles</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="about.php">About Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container jumbotron">
	<?php
		include "includes/db.php";
		$query = "SELECT * FROM subs";
		$query_run = mysqli_query($conn, $query);
		$c = mysqli_num_rows($query_run);
	?>
		<h3><a href="upload.php">Translate any subtitle to any language !</a></h3>
		<h5><span><a href="upload.php">Upload and translate a new file</a> - </span><span><a href="about">Learn about the Subtitle Guru</a></span><span> - We have <?php echo $c; ?> subtitles</span></h5>
		<!-- Search Box -->
		<form action="search.php" method="GET" class="form-custom">
			<input type="text" name="q" placeholder="Search subtitles ..." />
			<input type="submit" class="btn btn-info" name="submit" value="Search" />
		</form>
	</div>