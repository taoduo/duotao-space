<?php
session_start();
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
if(isset($_FILES['file']) {
    
if($_SESSION['login'] == 1) {
	$moved = move_uploaded_file($_FILES["file"]["tmp_name"]);
    if ($moved) {
    	echo "Successfully uploaded";         
    } else {
    	echo "Not uploaded because of error #".$_FILES["file"]["error"];
    }
}
} else {
	echo "No file!";
}
?>