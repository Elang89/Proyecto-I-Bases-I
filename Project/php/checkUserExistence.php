<?php
/* This file makes calls the appropriate queries in the database to validate if the user exists or not,
*based on those results it will return a 0 for false or a 1 for true, which is then handled by javascript*/

	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	$result;
	$result_admin;
	$result_id;
	$dataToReceive = file_get_contents('php://input');
	$dataToReceive = json_decode($dataToReceive,true);
	$username = $dataToReceive['dataToSend'][0];
	$password = $dataToReceive['dataToSend'][1];

	if(!$db_connection){                                    /* checks if connection with the database works */
	 	exit ("Server could not connect to database");
	 }

	$sqlVariableCheckUser = 'BEGIN :result := usuario_package.findUsers(:username, :password);END;';
	$sqlVariableCheckAdmin = 'BEGIN :result_admin := usuario_package.findAdminUsers(:username);END;';
	$sqlVariableCheckPersonId = 'BEGIN :result_id := person_package.find_person_id(:username);END;';
	

	$dataToReceiveCheckUser = oci_parse($db_connection, $sqlVariableCheckUser);
	$dataToReceiveCheckAdmin = oci_parse($db_connection, $sqlVariableCheckAdmin);
	$dataToReceivePersonId = oci_parse($db_connection, $sqlVariableCheckPersonId);

	oci_bind_by_name($dataToReceiveCheckUser,':username', $username);
	oci_bind_by_name($dataToReceiveCheckUser,':password', $password);
	oci_bind_by_name($dataToReceiveCheckUser,':result',$result);
	oci_bind_by_name($dataToReceiveCheckAdmin,':username',$username);
	oci_bind_by_name($dataToReceiveCheckAdmin,':result_admin', $result_admin);
	oci_bind_by_name($dataToReceivePersonId, ':username', $username);
	oci_bind_by_name($dataToReceivePersonId, ':result_id', $result_id, 200);
	
	oci_execute($dataToReceiveCheckUser);
	oci_execute($dataToReceiveCheckAdmin);
	oci_execute($dataToReceivePersonId);
	$result = (int)$result;
	$result_admin = (int)$result_admin;
	$result_id = (int)$result_id;

	if($result == 1 && $result_admin == 1){
		session_start();
		$_SESSION['name'] = $username;
		$_SESSION['usertype'] = 1;
		$_SESSION['id'] = $result_id;
		exit ('2');
	}else if ($result == 1 && $result_admin == 0) {
		session_start();
		$_SESSION['name'] = $username;
		$_SESSION['usertype'] = 0;
	    $_SESSION['id'] = $result_id;
		exit ('1');
	} else {
		exit('0');
	}
	oci_close($db_connection);
?>