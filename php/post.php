<?php
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo 'haha';
if(isset($_POST["submit"])) {
	echo 'hoho';
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        # echo "The file " . basename( $_FILES["file"]["name"]). " has been uploaded.";
        echo "haha";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
	echo "lala";
}
?>