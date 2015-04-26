<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}    
		$deleteOption = intval($_GET['selectedId']);     
		$CategorySelected = $_GET['selectedOption'];
		
	    if($CategorySelected == "Pet Type"){  
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_Type(:p1); END;");
        } 
		
		else if ($CategorySelected == "Pet breed"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.DELETE_BREED(:p1); END;");
		}  
		
		else if ($CategorySelected == "Size"){ 
			 $stid = ociparse($conn, "BEGIN  setting_package.DELETE_SIZE(:p1); END;");
		}  
		
		else if ($CategorySelected == "Training level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_LEARNING_SKILL(:p1); END;");
		} 
		
		else if ($CategorySelected == "Energy level"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_ENERGY(:p1); END;");
		} 
		
		else if ($CategorySelected == "Health Condition"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_CONDITION(:p1); END;");
		} 
		
		else if ($CategorySelected == "Medication"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_MEDICINE(:p1); END;");
		} 
		
		else if ($CategorySelected == "Disease"){ 
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_Sickness(:p1); END;"); 
		} 
		
		else if ($CategorySelected == "Color"){  
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_COLOR(:p1); END;");
		}  
		
		else if ($CategorySelected == "Veterinary"){  
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_VET(:p1); END;");
		}  
		
		else if ($CategorySelected == "Treatment"){  
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_Treatment(:p1); END;");
		}  
		
		else if ($CategorySelected == "Space"){  
			$stid = ociparse($conn, "BEGIN  setting_package.DELETE_Space(:p1); END;");
		} 
		
		
		oci_bind_by_name($stid, ':p1', $deleteOption);
		oci_execute($stid); 
		oci_close($conn);
	
?>  

		<script type="text/javascript">  
		alert("Congratulation, the selected option successfully deleted  :)"); 
		window.location = "manage-categories.php";
		</script>