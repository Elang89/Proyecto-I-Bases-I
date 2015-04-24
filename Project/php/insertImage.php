<?php
 
	$db_connection = $db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	
	session_start();
	$id = $_SESSION['id'];
	$image = file_get_contents('php://input');
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableInsertImage = 'BEGIN image_package.add_user_image(:p_id, :p_image);END;';
	
	$dataToInsert = oci_parse($db_connection, $sqlVariableInsertImage);
	
	oci_bind_by_name($dataToInsert, ':p_id', $id);
	oci_bind_by_name($dataToInsert, ':p_image', $image);
	
	oci_execute($dataToInsert);
	
	oci_close($db_connection);
	exit('1');

?>