<?php
  /* this logs out the user */
  session_start();
  if(isset($_SESSION['name']) && isset($_SESSION['usertype'])){
		unset($_SESSION['name']);
		unset($_SESSION['usertype']);
		//exit('1');
  }
  // else {
		// exit ('0');
  // }
header('location: ../index.php');
?>