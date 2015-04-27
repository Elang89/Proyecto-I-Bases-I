<?php
	
	session_start();
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	$dataToReceive = file_get_contents('php://input');
	$dataToReceive = json_decode($dataToReceive,true);
	$id = $_SESSION['id'];
	$id = (int)$id;
	
	$answer1 = $dataToReceive['dataToSend'][0];
	$answer2 = $dataToReceive['dataToSend'][1];
	$answer3 = $dataToReceive['dataToSend'][2];
	$answer4 = $dataToReceive['dataToSend'][3];
	$answer5 = $dataToReceive['dataToSend'][4];
	$questionGroupId = $dataToReceive['dataToSend'][5];
	$questionGroupId = (int)$questionGroupId;
	
	$sqlVariableCreateAnswerGroup = 'BEGIN applications_package.create_answer_group(:p_id, :q_id, :p_answer1, :p_answer2, :p_answer3, :p_answer4, :p_answer5);END;';
	
	$dataToInsertAnswerGroup = oci_parse($db_connection, $sqlVariableCreateAnswerGroup);
	
	oci_bind_by_name($dataToInsertAnswerGroup,':p_answer1', $answer1);
	oci_bind_by_name($dataToInsertAnswerGroup,':p_answer2', $answer2);
	oci_bind_by_name($dataToInsertAnswerGroup,':p_answer3', $answer3);
	oci_bind_by_name($dataToInsertAnswerGroup,':p_answer4', $answer4);
	oci_bind_by_name($dataToInsertAnswerGroup,':p_answer5', $answer5);
	oci_bind_by_name($dataToInsertAnswerGroup, ':p_id', $id );
	oci_bind_by_name($dataToInsertAnswerGroup, ':q_id', $questionGroupId);
	
	
	oci_execute($dataToInsertAnswerGroup);
	exit('1');

?>