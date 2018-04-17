<?php
	if(isset($_POST['id'])){
		include "db.php";
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		
		$query = "UPDATE subs SET downloads = (downloads + 1) WHERE id = '{$id}' ";
		$query_run = mysqli_query($conn, $query);
		if($query_run){
			echo $id;
		}else{
			echo "error";
		}
	}
?>