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
			
		
		$stid = ociparse($conn, "BEGIN  pet_package.CREATE_NEW_PET(:p1, :p2, :p3, :p4, :p5, :p6, :p7, :p8, :p9, :p10, :p11, :p12, :p13, :p14, :p15, :p16, :p17); END;");
		$getImage = oci_parse($conn, 'BEGIN pet_image_package.add_pet_image(:p_image);END;'); 
		
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

		oci_execute($stid); 
		oci_execute($getImage);
		
		if(oci_error()){
			echo "Failed to register pet.";
			oci_close($conn);
		} else {
			oci_close($conn);
			header('Location: index.php');
		}
?> 		


		<script type="text/javascript">  
		alert("Congratulation, your pet has been registered and put for adoption  :)"); 
		window.location = "register-pet.php";
		</script>