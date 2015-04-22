

 <?php 
 //  PHP that changes the radio button options in the manage categories.php according to what the users select in the combobox  
 // This PHP is called by manage-categories on the javascript ajax function update();  
 
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}     
		//parameter received by ajax in the function update in manage-categories.php 
		
		$Selected = $_GET['selectedOption'];    
		
		if($Selected == "Pet Type"){  
			$query= 'select * from pettype order by PET_TYPE_CODE';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 
							
								echo $Selected ." Options  <br />";
								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_TYPE_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_TYPE_CODE']}'  value = '{$row['PET_TYPE_NAME']}'/><br /> "  ; 		 
								} 	
        } 
		
		else if ($Selected == "Pet breed"){ 
			 $query= 'select * from petrace order by PET_RACE_CODE';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 
							
								echo $Selected ." Options  <br />";
								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_RACE_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_RACE_CODE']}'  value = '{$row['PET_RACE_NAME']}'/><br /> "  ; 		 
								} 	
		}  
		
		else if ($Selected == "Size"){ 
			 $query= 'select * from petsize order by PET_SIZE_CODE';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 
								
								echo $Selected ." Options  <br />";
								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_SIZE']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_SIZE_CODE']}'  value = '{$row['PET_SIZE']}'/><br /> "  ; 		 
								} 	
		}  
		
		else if ($Selected == "Training level"){ 
				$query= 'select * from PETLEARNINGSKILL order by PET_LEARN_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_LEARN_SKILL']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_LEARN_CODE']}'  value = '{$row['PET_LEARN_SKILL']}'/><br /> "  ; 		 
								} 	
		} 
		
		else if ($Selected == "Energy level"){ 
				$query= 'select * from PETENERGY order by PET_ENERGY_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_ENERGY_LEVEL']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_ENERGY_CODE']}'  value = '{$row['PET_ENERGY_LEVEL']}'/><br /> "  ; 		 
								} 	
		} 
		
		else if ($Selected == "Health Condition"){ 
				$query= 'select * from PETCONDITION order by PET_COND_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_COND_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_COND_CODE']}'  value = '{$row['PET_COND_NAME']}'/><br /> "  ; 		 
								} 	
		} 
		
		else if ($Selected == "Medication"){ 
				$query= 'select * from PETMEDICINE order by PET_MED_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_MED_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_MED_CODE']}'  value = '{$row['PET_MED_NAME']}'/><br /> "  ; 		 
								} 	
		} 
		
		else if ($Selected == "Disease"){  
				$query= 'select * from PETSICKNESS order by PET_SICKNESS_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_SICKNESS_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_SICKNESS_CODE']}'  value = '{$row['PET_SICKNESS_NAME']}'/><br /> "  ; 		 
								} 	
		} 
		
		else if ($Selected == "Color"){  
				$query= 'select * from PETCOLOR order by PET_COLOR_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_COLOR']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_COLOR_CODE']}'  value = '{$row['PET_COLOR']}'/><br /> "  ; 		 
								} 
		}  
		
		else if ($Selected == "Veterinary"){  
				$query= 'select * from VETERINARY order by VET_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['VET_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['VET_CODE']}'  value = '{$row['VET_NAME']}'/><br /> "  ; 	 
								} 
		}  
		
		else if ($Selected == "Treatment"){  
				$query= 'select * from PETTREATMENTS order by PET_TREATMENT_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_TREATMENT']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_TREATMENT_CODE']}'  value = '{$row['PET_TREATMENT']}'/><br /> "  ; 	 
								} 
		}  
		
		else if ($Selected == "Space"){  
				$query= 'select * from PETSPACE order by PET_SPACE_CODE';
				$stmt = oci_parse($conn, $query);			
				oci_execute($stmt);  
							
							echo $Selected ." Options  <br />";
							while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_SPACE']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_SPACE_CODE']}'  value = '{$row['PET_SPACE']}'/><br /> "  ; 	 
								} 
		} 
		
		

        ?>		
		

	
