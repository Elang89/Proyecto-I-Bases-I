
<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}    
			$CategorySelected = $_GET['selectedOption']; 
			
		        if ($CategorySelected == "Pet breed"){  
					echo '<select name="pet_type" id = "pet_breed_type">';
					echo '<option value = "-1">Select Type:</option>';
					$query= 'select PET_TYPE_NAME from pettype';
					$stmt = oci_parse($conn, $query);
					oci_execute($stmt);
					while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_TYPE_NAME'] . '</option>';
				}
			}   
			echo '</select>'; 

?>  

