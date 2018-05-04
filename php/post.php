<?php
session_start();
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
if($_SESSION['login'] == 1) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        # echo "The file " . basename( $_FILES["file"]["name"]). " has been uploaded.";
        echo "haha";
    } else {
        echo $_FILES["file"]["tmp_name"];
    }
}
?>