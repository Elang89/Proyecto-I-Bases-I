 <?php 
 //  PHP that inserts a new pet to the database  
 
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR); 
}      
		session_start(); 
		$type =  $_POST['pet_type_combo']; 
		$breed =  $_POST['pet_breed_combo'];  
		$color =  $_POST['pet_color'];  
		$size = $_POST['pet_size'];   
		$trainning = $_POST['pet_trainning'];   
		$vet = $_POST['pet_vet']; 
		$treatment = $_POST['pet_treatment']; 
		$disease = $_POST['pet_diseases'];  
		$medicine = $_POST['pet_medicines'];  
		$energy = $_POST['pet_energy'];  
		$space = $_POST['pet_space'];
		$condition = $_POST['pet_condition']; 
		$name = $_POST['name']; 
		$address = $_POST['address']; 
		$reasonAbandon = $_POST['abandoned']; 
		$notes = $_POST['notes'];  
		$usuario = $_SESSION['id']; 
		$image = $_POST['photo'];
		
		$question1 = $_POST['question_1'];
		$question2 = $_POST['question_2'];
		$question3 = $_POST['question_3'];
		$question4 = $_POST['question_4'];
		$question5 = $_POST['question_5'];
		
		$stid = ociparse($conn, "BEGIN  pet_package.CREATE_NEW_PET(:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8, :p9, :p10, :p11, :p12, :p13, :p14, :p15, :p16, :p17); END;");
		$getImage = oci_parse($conn, 'BEGIN pet_image_package.add_pet_image(:p_image);END;'); 
		$sqlVariableCreateNewApplication = 'BEGIN applications_package.create_application(:p_owner_id);END;';
		$sqlVariableCreateNewQuestionGroup = 'BEGIN applications_package.create_question_group(:p_question1,:p_question2,:p_question3,:p_question4,:p_question5);END;';
		$dataToInsertApplication = oci_parse($conn, $sqlVariableCreateNewApplication);
		$dataToInsertQuestionGroup = oci_parse($conn, $sqlVariableCreateNewQuestionGroup);
		
		oci_bind_by_name($stid, ':p1', $type); 
		oci_bind_by_name($stid, ':p2', $breed); 
		oci_bind_by_name($stid, ':p3', $color);   
		oci_bind_by_name($stid, ':p4', $size);    
		oci_bind_by_name($stid, ':p5', $trainning);   
		oci_bind_by_name($stid, ':p6', $vet);    
		oci_bind_by_name($stid, ':p7', $treatment); 	 
        oci_bind_by_name($stid, ':p8', $disease);	
		oci_bind_by_name($stid, ':p9', $medicine); 
		oci_bind_by_name($stid, ':p10', $energy); 
		oci_bind_by_name($stid, ':p11', $space);
		oci_bind_by_name($stid, ':p12', $condition); 
		oci_bind_by_name($stid, ':p13', $name); 
		oci_bind_by_name($stid, ':p14', $address);
		oci_bind_by_name($stid, ':p15', $reasonAbandon); 
		oci_bind_by_name($stid, ':p16', $notes); 
		oci_bind_by_name($stid, ':p17', $usuario); 
		oci_bind_by_name($getImage, ':p_image', $image);
		oci_bind_by_name($dataToInsertApplication, ':p_owner_id', $usuario);
		oci_bind_by_name($dataToInsertQuestionGroup,':p_question1', $question1);
		oci_bind_by_name($dataToInsertQuestionGroup,':p_question2', $question2);
		oci_bind_by_name($dataToInsertQuestionGroup,':p_question3', $question3);
		oci_bind_by_name($dataToInsertQuestionGroup,':p_question4', $question4);
		oci_bind_by_name($dataToInsertQuestionGroup,':p_question5', $question5);
		
		oci_execute($stid); 
		oci_execute($getImage);
		oci_execute ($dataToInsertApplication);
		oci_execute($dataToInsertQuestionGroup);
		
		if(oci_error()){
			echo "Failed to register pet.";
			oci_close($conn);
		} else {
			oci_close($conn);
			
		}
?> 		


		<script type="text/javascript">  
		alert("Congratulation, your pet has been registered and put for adoption  :)"); 
		window.location = "register-pet.php";
		</script>