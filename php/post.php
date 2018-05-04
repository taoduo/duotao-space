<?php
session_start();
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
if($_SESSION['login'] == 1) {
	$err = move_uploaded_file($_FILES["file"]["tmp_name"]);
    echo $err;
}
?>