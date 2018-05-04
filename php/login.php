<?php
session_start();
if (isset($_POST["code"]) && strcmp($_POST["code"], 'post') == 0) {
	$_SESSION['login'] = 1;
	echo "yes";
} else {
	echo "no";
}
?>