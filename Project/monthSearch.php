		<?php  
		$db_connection = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$db_connection) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}   
		
		$month =  (int)$_GET['month']; 

		
		$result;
		$resultArray;
		$finalResult = ' ';  
		
		$sqlVariableFindMyPets = 'BEGIN :pet_variable := pet_search_package.month_search(:p_month_data);END;';   
		$result = oci_new_cursor($db_connection);	  
		
		$dataToReceive = oci_parse($db_connection, $sqlVariableFindMyPets);		 
		
		oci_bind_by_name($dataToReceive, ':pet_variable', $result, -1, OCI_B_CURSOR);  
		oci_bind_by_name($dataToReceive, ':p_month_data', $month); 

		oci_execute($dataToReceive); 
		oci_execute($result, OCI_DEFAULT); 
		oci_fetch_all($result, $resultArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		

		oci_close($db_connection);  
		
		if($resultArray == null){
				echo "<h2>No results found<h2>";
			} else { 
				foreach($resultArray as $iterator){
					$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6"> 
													<div class="properties">
														<form action="pet-detail.php" method="POST">
															<h4>'.$iterator['PET_NAME'].' </h4>
															<div class="image-holder"><img src="'.$iterator['IMAGE'].'"class="img-responsive" alt="properties"/></div>
															<h5>'.$iterator['PET_TYPE_NAME'].' </h5>
															<h5>'.$iterator['PET_RACE_NAME'].' </h5> 
															<h5>'.$iterator['PET_COLOR'].' </h5>  
															<h5>'.$iterator['PET_ENERGY_LEVEL'].'</h5>
															<input class="form-control" type="text" style="display: none" readonly name="pet_code" value="'.$iterator['PET_CODE'].'"/>  
															<input class="form-control" type="text" style="display: none" readonly name="pet_name" value="'.$iterator['PET_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_type" value="'.$iterator['PET_TYPE_NAME'].'"/>  
															<input class="form-control" type="text" style="display: none" readonly name="image" value="'.$iterator['IMAGE'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="pet_race" value="'.$iterator['PET_RACE_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_cond" value="'.$iterator['PET_COND_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_energy" value="'.$iterator['PET_ENERGY_LEVEL'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_learn" value="'.$iterator['PET_LEARN_SKILL'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_vet" value="'.$iterator['VET_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_p_name" value="'.$iterator['PERSON_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_location" value="'.$iterator['PETLOCATION'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_notes" value="'.$iterator['PETNOTES'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_space" value="'.$iterator['PET_SPACE'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_treatment" value="'.$iterator['PET_TREATMENT'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_color" value="'.$iterator['PET_COLOR'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_sickness" value="'.$iterator['PET_SICKNESS_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="pet_med" value="'.$iterator['PET_MED_NAME'].'"/>  
															<input class="form-control" type="text" style="display: none" readonly name="pet_abandon" value="'.$iterator['PETABANDONDESCRIPTION'].'"/> 
															<input type="submit" class="btn btn-primary" value="View Details" />
														</form>
													</div>
												   </div>'; 
				}
			    echo $finalResult;
			}

		?>  

