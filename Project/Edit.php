<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}  
		$deleteOption = $_GET['selectedId'];     
		$CategorySelected = $_GET['selectedOption']; 
		$newName = $_GET['newName']; 
		echo $deleteOption; 
		echo $CategorySelected; 
		echo $newName;   
		/*
			    if($CategorySelected == "Pet Type"){  
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_Type(:p2, :p1); END;");
        } 
		
		else if ($CategorySelected == "Pet breed"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.EDIT_BREED(:p2, :p1); END;");
		}  
		
		else if ($CategorySelected == "Size"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.EDIT_SIZE(:p2, :p1); END;");
		}  
		
		else if ($CategorySelected == "Training level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_LEARNING_SKILL(:p2, :p1); END;");
		} 
		
		else if ($CategorySelected == "Energy level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_ENERGY(:p2, :p1); END;");
		} 
		
		else if ($CategorySelected == "Health Condition"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_CONDITION(:p2, :p1); END;");
		} 
		
		else if ($CategorySelected == "Medication"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_MEDICINE(:p2, :p1); END;");
		} 
		
		else if ($CategorySelected == "Disease"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_Sickness(:p2, :p1); END;"); 
		} 
		
		else if ($CategorySelected == "Color"){  
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_COLOR(:p2, :p1); END;");
		}  
		
		else if ($CategorySelected == "Veterinary"){  
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_VET(:p2, :p1); END;");
		}  
		
		else if ($CategorySelected == "Treatment"){  
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_Treatment(:p2, :p1); END;");
		}  
		
		else if ($CategorySelected == "Space"){  
			$stid = ociparse($conn, "BEGIN  setting_package.EDIT_Space(:p2, :p1); END;");
		} 
		
		
		oci_bind_by_name($stid, ':p1', $deleteOption); 
		oci_bind_by_name($stid, 'p2', $newname)
		oci_execute($stid); 
		oci_close($conn);*/
		
?>
  
 		<script>
		alert("Congratulation, the edit was successful !  :)");
		</script>