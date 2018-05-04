<?php
if (isset($_POST["code"]) && strcmp($_POST["code"], 'post') == 0) {
	echo $_POST["code"];
} else {
	echo $_POST[0];
}
?>