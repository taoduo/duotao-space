<?php
if (isset($_POST["code"]) && strcmp($_POST["code"], 'post') == 0) {
	echo "yes";
} else {
	echo "no";
}
?>