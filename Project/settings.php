  <?php 
 // This php connects to the dadabatse and inserts new options on the tables that only an admin can modify  
 // These are options are used when a user wants to register a pet. These options are shown in the comboboxes or register-pet.php
 
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}   
		// Takes the values selected value in the combobox (a select named 'category' in manage-categories.php) 
		// Also takes in the new name written by the user that wants to be inserted (from an input named 'new name'.php)
		$var1 =  $_POST['category'];  
		$var2 = $_POST['new_name'];   
		
		if($var1 == "Pet Type"){  
			$stid = ociparse($conn, "BEGIN  setting_package.SET_Type(:p1); END;");
        } 
		
		else if ($var1 == "Pet breed"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.SET_BREED(:p1); END;");
		}  
		
		else if ($var1 == "Size"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.SET_SIZE(:p1); END;");
		}  
		
		else if ($var1 == "Training level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.SET_LEARNING_SKILL(:p1); END;");
		} 
		
		else if ($var1 == "Energy level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.SET_ENERGY(:p1); END;");
		} 
		
		else if ($var1 == "Health Condition"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.SET_CONDITION(:p1); END;");
		} 
		
		else if ($var1 == "Medication"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.SET_MEDICINE(:p1); END;");
		} 
		
		else if ($var1 == "Disease"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.SET_Sickness(:p1); END;"); 
		} 
		
		else if ($var1 == "Color"){  
			$stid = ociparse($conn, "BEGIN  setting_package.SET_COLOR(:p1); END;");
		}  
		
		else if ($var1 == "Veterinary"){  
			$stid = ociparse($conn, "BEGIN  setting_package.SET_VET(:p1); END;");
		}  
		
		else if ($var1 == "Treatment"){  
			$stid = ociparse($conn, "BEGIN  setting_package.SET_Treatment(:p1); END;");
		}  
		
		else if ($var1 == "Space"){  
			$stid = ociparse($conn, "BEGIN  setting_package.SET_Space(:p1); END;");
		} 
		
		
		oci_bind_by_name($stid, ':p1', $var2);
		oci_execute($stid); 
		oci_close($conn);
        ?>		
		
		<script>
		alert("Congratulation, the insertion was successful !  :)");
		</script>
	
