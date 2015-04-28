<?php 
	
	session_start();
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB'); 
	$dataToReceive = file_get_contents('php://input');
	$dataToReceive = json_decode($dataToReceive,true);
	
	$pet_id = $dataToReceive['dataToSend'][0];
	$selectedOption = $dataToReceive['dataToSend'][1];
	$id = $_SESSION['id'];
	
	$sqlVariableUpdateData = 'BEGIN applications_package.create_return_form(:p_id, :p_pet_id,:p_option);END;';
	
	$dataToSendReturnForm = oci_parse($db_connection, $sqlVariableUpdateData);
	
	oci_bind_by_name($dataToSendReturnForm, ':p_id', $id);
	oci_bind_by_name($dataToSendReturnForm, ':p_pet_id', $pet_id);
	oci_bind_by_name($dataToSendReturnForm,':p_option', $selectedOption);
	
	oci_execute($dataToSendReturnForm);
	exit('1');

?>