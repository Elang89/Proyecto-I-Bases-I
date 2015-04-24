<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}     
			$selectedType = $_GET['selectedOption'];   
			
			echo '<select name="pet_breed_combo" style="width: 400px" id = "pet_breed_combo">';
			echo '<option value = "-1">Select Breed:</option>';
			$query= 'SELECT PET_RACE_NAME FROM PETRACE WHERE PET_TYPE = (SELECT PET_TYPE_CODE from pettype WHERE pet_type_name = :p1)';
			$stmt = oci_parse($conn, $query); 
			
		    oci_bind_by_name($stmt, ':p1', $selectedType);  
			
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_RACE_NAME'] . '</option>';
				} 
			 echo '</select>';   
			 

			
?> 

