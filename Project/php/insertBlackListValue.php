<?php 

	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	$dataReceived = file_get_contents('php://input');	
	$dataReceived = json_decode($dataReceived, true);
	$username = $dataReceived['values'][0];
	$blackListValue = $dataReceived['values'][1];
	$blackListValue = (int)$blackListValue;
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariable = 'CALL person_package.add_blacklist_value(:p_value, :p_uname)';
	
	$dataToSend = oci_parse($db_connection,$sqlVariable);
	
	oci_bind_by_name($dataToSend, ':p_value', $blackListValue);
	oci_bind_by_name($dataToSend, ':p_uname', $username);
	
	oci_execute($dataToSend);
	exit('1');
?>