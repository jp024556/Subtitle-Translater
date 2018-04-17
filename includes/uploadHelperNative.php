<?php
include "db.php";
include "translater.php";
if(isset($_POST['id']) && isset($_POST['targetLanguage'])){
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$targetLanguage = mysqli_real_escape_string($conn, $_POST['targetLanguage']);
	
	$query = "SELECT * FROM subs WHERE id = '{$id}'";
	$query_run = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($query_run)){
		$name = $row['name'];
	}
	
$source = '';
$target = $targetLanguage;

$filename = $name."-".$target.".srt";
$filedest = "../downloads/".$filename;

$file = fopen("../downloads/".$name."", "r");

$text = fread($file, filesize("../downloads/".$name.""));
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

$query = "INSERT INTO subs_list (sub_id, name, lang) VALUES ('{$id}', '{$filename}', '{$target}')";
$query_run = mysqli_query($conn, $query);
if($query_run){
	echo "<a href='downloads/".$filename."'>Download ".$filename."</a>";
}else{
	echo 'Error Occurred !';
}
}else{
	echo "error";
}
?>