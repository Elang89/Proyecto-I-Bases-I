<?php 
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'GET'){
		var_dump $_SESSION;
	} else {
		echo "No request was made.";
		return false;
	}
?>