<?php
if (isset($_POST["data"]) && strcmp($_POST["data"], "post") == 0) {
	echo "success";
} else {
	echo "failure";
}
?>