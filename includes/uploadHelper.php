<?php
include "db.php";
include "translater.php";
if(isset($_FILES['subFile']) && isset($_POST['targetLanguage'])){
	if(!empty($_FILES['subFile']) && !empty($_POST['targetLanguage'])){
		$sub = $_FILES['subFile'];
		$target = $_POST['targetLanguage'];
		$ext = explode(".", $sub['name']);
		$ext = end($ext);
		if($ext == 'srt'){
			$n = $sub['name']."-orig.".$ext;
			$chk_query = "SELECT * FROM subs WHERE name = '{$n}'";
			$chk_query_run = mysqli_query($conn, $chk_query);
			while($row = mysqli_fetch_assoc($chk_query_run)){
				$id = $row['id'];
			}
			$count = mysqli_num_rows($chk_query_run);
			if($count == 0){
				
				$filename = $sub['name']."-".$target.".".$ext;
				$filedest = "../downloads/".$filename;
				$source = '';

				$file = fopen($sub['tmp_name'], "r");

				$text = fread($file, filesize($sub['tmp_name']));
				fclose($file);

				$slice = ceil(strlen($text)/2000);
				$start = 0;
				$result = "";

				for($i = 0; $i < $slice; $i++){
				$texts = substr($text, $start, 2000);
				$trans = new GoogleTranslate();
				$result .= $trans->translate($source, $target, $texts);
				$start += 2000;
				}
				$result = preg_replace('/\:\s+/', ':', $result);
				$result = preg_replace('/\->\s+/', '--> ', $result);
				$outFile = fopen($filedest, "w");
				fwrite($outFile, $result);
				fclose($outFile);

				$orig_filename = $sub['name']."-orig".".".$ext;
				move_uploaded_file($sub['tmp_name'], "../downloads/".$orig_filename);
				
				$query = "INSERT INTO subs (name) VALUES ('{$orig_filename}')";
				$query_run = mysqli_query($conn, $query);
				$id = mysqli_insert_id($conn);
				
				$query = "INSERT INTO subs_list (sub_id, name, lang) VALUES ('{$id}', '{$filename}', '{$target}')";
				$query_run = mysqli_query($conn, $query);
				
				echo "Go to <a href='subtitles.php?n=".$orig_filename."'>Download Page</a>";
			}else{
				echo "<p class='text-success'>This subtitle is already in our database.</p><a href='subtitles.php?n=".$orig_filename."'>Get your subtitle</a>";
			}
		}else{
			echo "<h3 class='text-warning'>Only (.srt) extension is allowed !</h3>";
		}
	}else{
		echo "<h3 class='text-danger'>All fields are required !</h3>";
	}
}else{
	echo "<h3 class='text-danger'>Invalid Approach !</h3>";
}
?>