<?php
if (isset($_POST) && strcmp($_POST, "post") == 0) {
	echo "success";
} else {
	echo $_POST;
}
?>