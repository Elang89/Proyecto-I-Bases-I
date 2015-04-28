<?php
	
	require "phpmailer/PHPMailerAutoload.php";
	$mail = new PHPMailer;	
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB'); 
	$dataToReceive = file_get_contents('php://input');
	$dataToReceive = json_decode($dataToReceive,true);
	$email = 'elang8899@gmail.com';
	$emailGetter;
	$personId = $dataToReceive['dataToSend'][0];
	$petId = $dataToReceive['dataToSend'][1];
	$value = $dataToReceive['dataToSend'][2];
	$adoptionId = $dataToReceive['dataToSend'][3];
	
	$personId = (int)$personId;
	$petId = (int)$petId;
	$value = (int)$value;
	$adoptionId = (int)$adoptionId;
	
	$sqlGetEmail = 'BEGIN :result_email := email_package.return_email(:p_id);END;';
	$sqlVariableUpdateRecords = 'BEGIN applications_package.evaluate_application(:adoption_id, :p_id, :p_pet_id, :p_aproval_state);END;';
	$dataToInsert = oci_parse($db_connection, $sqlVariableUpdateRecords);
	$emailResult = oci_parse($db_connection, $sqlGetEmail);
	
	
	oci_bind_by_name($dataToInsert, ':adoption_id', $adoptionId);
	oci_bind_by_name($dataToInsert,':p_id',$personId);
	oci_bind_by_name($dataToInsert,':p_pet_id', $petId);
	oci_bind_by_name($dataToInsert,':p_aproval_state', $value);
	oci_bind_by_name($emailResult, ':p_id', $personId);
	oci_bind_by_name($emailResult,':result_email', $emailGetter,200);
	
	oci_execute($dataToInsert);
	oci_execute($emailResult);
	
	var_dump($emailGetter);
	oci_close($db_connection);
	
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
    $mail->SMTPSecure = "ssl";
	$mail->SMTPDebug = 1;
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->Username = "PetLoversInternational@gmail.com";
	$mail->Password = "51tsxQdk34h5VB0BNwtf";
    $mail->FromName = "Admin";
	$mail->From = "PetLoversInternational@gmail.com";
    $mail->Subject = "Adoption Form";
    $mail->addAddress($email,"PetLovers");
    
	if($value == 1){
		$mail->MsgHTML("Your adoption request has been approved, please go to the current owner's location to get your pet. In order to verify, please login at the site and check your pets.");
	} else {
		$mail->MsgHTML("We are sorry to inform you that your adoption request has been denied.");
	}
	
	if($mail->Send()){
        exit('1');
    } else {
		echo $mail->ErrorInfo;
	}
?>