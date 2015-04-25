<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}  
		$editOption = $_GET['selectedId'];     
		$CategorySelected = $_GET['selectedOption']; 
		$newName = $_GET['newName']; 
		
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
		
		
		oci_bind_by_name($stid, ':p1', $editOption); 
		oci_bind_by_name($stid, ':p2', $newName);
		oci_execute($stid);   
							
							?><div class="col-" class="text">Type Options</div><?php
							$query= 'select * from pettype order by PET_TYPE_CODE';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 

								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_TYPE_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_TYPE_CODE']}'  value = '{$row['PET_TYPE_NAME']}'/><br /> "  ; 		 
								} 	 
								
		oci_close($conn); 
		
?>
  
 		<script>
		alert("Congratulation, the edit was successful !  :)");
		</script>