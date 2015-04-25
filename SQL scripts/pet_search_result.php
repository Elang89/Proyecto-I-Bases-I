		<?php  
		$db_connection = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$db_connection) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}   
		
		$type =  $_GET['type']; 
		$breed =  $_GET['breed'];  
		$color =  $_GET['color'];  
		$size = $_GET['size'];    
		$trainning = $_GET['trainning'];    
		$energy = $_GET['energy'];  
		$space = $_GET['space']; 
		
		$result;
		$resultArray;
		$finalResult = ' ';  
		
		$sqlVariableFindMyPets = 'BEGIN :pet_variable := pet_search_package.pet_search(:p_type_data, :p_breed_data, :p_color_data, :p_size_data, :p_trainning_data, :p_energy_data, :p_space_data);END;';   
		$result = oci_new_cursor($db_connection);	  
		
		$dataToReceive = oci_parse($db_connection, $sqlVariableFindMyPets);		 
		
		oci_bind_by_name($dataToReceive, ':pet_variable', $result, -1, OCI_B_CURSOR);  
		oci_bind_by_name($dataToReceive, ':p_type_data', $type); 
		oci_bind_by_name($dataToReceive, ':p_breed_data', $breed); 
		oci_bind_by_name($dataToReceive, ':p_color_data', $color); 
		oci_bind_by_name($dataToReceive, ':p_size_data', $size); 
		oci_bind_by_name($dataToReceive, ':p_trainning_data', $trainning); 
		oci_bind_by_name($dataToReceive, ':p_energy_data', $energy); 
		oci_bind_by_name($dataToReceive, ':p_space_data', $space);
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
															<h4>'.$iterator['PET_TYPE_NAME'].' </h4>
															<div class="image-holder"><img src="images/logo2.png" class="img-responsive" alt="properties"/></div>
															<h5>'.$iterator['PET_RACE_NAME'].' </h5>
															<h5>'.$iterator['PET_COND_NAME'].'</h5>
															<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$iterator['PET_TYPE_NAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$iterator['PET_RACE_NAME'].'"/> 
															<input class="form-control" type="text" style="display: none" readonly name="second_last_name" value="'.$iterator['PET_COLOR'].'"/>  
															<input class="form-control" type="text" style="display: none" readonly name="name" value="'.$iterator['PET_COND_NAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="second_last_name" value="'.$iterator['PETLOCATION'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="last_name" value="'.$iterator['PET_ENERGY_LEVEL'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="second_last_name" value="'.$iterator['PET_SPACE'].'"/> 
															<input type="submit" class="btn btn-primary" value="View Details" />
														<form/>
													</div>
												   </div>'; 
				}
			    echo $finalResult;
			}

		?>  
