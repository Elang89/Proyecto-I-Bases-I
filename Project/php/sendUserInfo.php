<?php
	/* Made by Ernesto Lang 3/22/2015 */
	/* The following code is used to receive data from the client-side(JavaScript/HTML), a JSON is sent through JavaScript by using AJAX and 
	 * sending an XMLHTTP request. PHP retrieves the JSON data, decodes into a PHP array equivalent, which is then deconstructed, to insert data
	 * into the appropriate database tables, once this is finished a response is sent back to the client-side application, which should indicate
	 * whether PHP was succesful inserting the data into the database.
	 */	

	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');  /*Used to establish connection between database and server*/																										  
	$finalArray = file_get_contents('php://input');									  /*Data retrieval*/			
	$finalArray = json_decode($finalArray,true); 									  /*JSON decoding*/				
	$username = $finalArray['finalArray'][0];              /* These variables are the data to be sent to the database */
	$password = $finalArray['finalArray'][1];
	$name = $finalArray['finalArray'][3];
	$firstLastName = $finalArray['finalArray'][4];
	$secondLastName = $finalArray['finalArray'][5];
	$email = $finalArray['finalArray'][6];
	$phone = $finalArray['finalArray'][7];
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableUsuarioCheck = 'BEGIN :result := usuario_package.findUsers(:username, :password);END;';
	$sqlVariableUsuarioTable = 'CALL usuario_package.add_user(:username, :password)';  /* SQL statement to send */
	$sqlVariablePersonTable = 'CALL person_package.add_person(:name, :first_ln, :second_ln, :username_person)';
	$sqlVariableEmailTable = 'CALL email_package.add_email(:email, :username)';
	$sqlVariablePhoneTable = 'CALL phone_package.add_phone(:phone, :username)';
	$dataToReceiveUsuario = oci_parse($db_connection, $sqlVariableUsuarioCheck);
	$dataToInsertUsuario = oci_parse($db_connection, $sqlVariableUsuarioTable);                         /* prepares statements to be sent to database */
	$dataToInsertPerson = oci_parse($db_connection, $sqlVariablePersonTable);
	$dataToInsertEmail = oci_parse($db_connection, $sqlVariableEmailTable);
	$dataToInsertPhone = oci_parse($db_connection, $sqlVariablePhoneTable);		                                   
	
	oci_bind_by_name($dataToReceiveUsuario, ':username', $username);
	oci_bind_by_name($dataToReceiveUsuario, ':password', $password);
	oci_bind_by_name($dataToReceiveUsuario, 'result', $result, 1);
	oci_bind_by_name($dataToInsertUsuario, ':username', $username);                    /* binds variables to their string names */
	oci_bind_by_name($dataToInsertUsuario, ':password', $password);
	oci_bind_by_name($dataToInsertPerson, ':name', $name);
	oci_bind_by_name($dataToInsertPerson, ':first_ln', $firstLastName);
	oci_bind_by_name($dataToInsertPerson, ':second_ln', $secondLastName);
	oci_bind_by_name($dataToInsertPerson, ':username_person', $username);
	oci_bind_by_name($dataToInsertEmail, ':email', $email);
	oci_bind_by_name($dataToInsertEmail, ':username',$username);
	oci_bind_by_name($dataToInsertPhone, ':phone', $phone);
	oci_bind_by_name($dataToInsertPhone, ':username',$username);
		
	oci_execute($dataToReceiveUsuario);
	$result = (int)$result;
	
	if($result == 1){
		exit ('0');
	} else {
		$arrayOfDataToSend[0] = $dataToInsertUsuario;
		$arrayOfDataToSend[1] = $dataToInsertPerson;
		$arrayOfDataToSend[2] = $dataToInsertEmail;
		$arrayOfDataToSend[3] = $dataToInsertPhone;
		foreach ($arrayOfDataToSend as $value){
			oci_execute($value);
			if(oci_error($value)){
				oci_rollback();
				return false;
			}
		}
	}		
	
	exit ('1');
	oci_close($db_connection);
	
?>