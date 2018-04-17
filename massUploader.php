<?php include "includes/header.php"; ?>

<?php
if(isset($_POST['submit'])){
	$count = count($_FILES['k']['name']);
	$_c = 0;
	for($i=0; $i<$count; $i++){
		$name = $_FILES['k']['name'][$i]."-orig.srt";
		$dest = "downloads/".$name;
		if(move_uploaded_file($_FILES['k']['tmp_name'][$i], $dest)){
			$query = "INSERT INTO subs (name) VALUES ('{$name}')";
			$query_run = mysqli_query($conn, $query);
			$_c++;
		}
	}


}
?>
    <!-- Page Content -->
    <div class="container">
	<?php if(isset($_c)){ echo "<div class='alert alert-info'><kbd>".$_c."</kbd> subtitles uploaded :)</div>"; } ?>
		<form class="form" action="massUploader.php" method="POST" enctype="multipart/form-data">
		<div class="alert alert-danger">Mass Uploader - Only For Site Administrator<br />Should Not To Be Used On <kbd>Live Website</kbd></div>
			<input type="file" name="k[]" multiple /><br /><br />
			<input type="submit" class="btn btn-custom" name="submit" value="Mass Upload" />
		</form>
		<div class="well text-center" id="response"></div>
    </div>
    <!-- /.container -->

<?php include "includes/footer.php"; ?>
