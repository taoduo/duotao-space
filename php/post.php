<?php
session_start();
$target_dir = "../posts/";
$filename = basename($_FILES["file"]["name"]);
$target_file = $target_dir . $filename;
if($_SESSION['login'] == 1) {
	if (file_exists($target_file)) {
		http_response_code(400);
		echo "File exists. Rename your pdf.";
	} else {
		$moved = move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
	    if ($moved) {
	    	$mysqli = new mysqli("localhost", "duotaosp_WPU6Q", "Bonanza2018", "duotaosp_WPU6Q");
	    	if ($conn->connect_error) {
	    		http_response_code(500);
			    echo "Connection failed: " . $conn->connect_error;
			} else {
		    	$statement = $mysqli->prepare("insert into posts (file_path, post_title, create_date, content_abstract) values (?,?,?,?);");
		    	if ( false===$statement ) {
				  die ('prepare() failed: ' . $mysqli->error);
				}
		    	$result = $statement->bind_param('ssss', $file_path, $title, $create_date，$content_abstract);
		    	if ( false===$result ) {
				  die('bind_param() failed');
				}
		    	$file_path = $target_file;
		    	$title = $_POST['title'];
		    	$create_date = date('Y-m-d');
		    	$content_abstract = $_POST['abstract'];
		    	$result = $statement->execute();
		    	if ( false===$result ) {
				  die('execute() failed: ' . $stmt->error);
				}
		    	http_response_code(200);
		    	echo "Success";
	    	}
	    } else {
	    	http_response_code(500);
	    	echo "Not uploaded because of error #".$_FILES["file"]["error"];
	    }
	}
}
?>