<?php
session_start();
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
if($_SESSION['login'] == 1) {
	$moved = move_uploaded_file($_FILES["file"]["tmp_name"]);
    if ($moved) {
    	echo "Successfully uploaded";         
    } else {
    	if (is_dir($target_dir) && is_writable($target_dir)) {
    		echo "Not uploaded";         
    	} else {
    		echo "not writable";
    	}
    }
}
?>