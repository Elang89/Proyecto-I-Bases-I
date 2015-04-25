<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / User Results</span>
    <h2>My Pets</h2> 
  </div>
</div>
<!-- banner -->  

		<?php  
		$db_connection = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$db_connection) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}   
		
		$searchData = $_SESSION['id'];  
		$result;
		$resultArray;
		$finalResult = ' '; 
		
		$sqlVariableFindMyPets = 'BEGIN :pet_variable := pet_search_package.find_myPets(:p_search_data);END;';   
		
		$result = oci_new_cursor($db_connection);	 
		$dataToReceive = oci_parse($db_connection, $sqlVariableFindMyPets);		 
		
		oci_bind_by_name($dataToReceive, ':pet_variable', $result, -1, OCI_B_CURSOR); 
		oci_bind_by_name($dataToReceive, ':p_search_data', $searchData);  
		oci_execute($dataToReceive); 
		oci_execute($result, OCI_DEFAULT); 
		oci_fetch_all($result, $resultArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
		oci_close($db_connection); 
			
		?> 
		


<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="hot-properties hidden-xs">
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/9.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Golden Retriever</h5>
			</div>
          </div>
		   <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Siberian Husky</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Weimeraner.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Weimeraner</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Ridgeback.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Ridgeback</h5>
			</div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-sm-8">
        <div class="row">  
		
				<?php
			if($searchData == "" || $resultArray == null){
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
        </div>
      </div>
    </div>
  </div>
</div> 
<?php include'footer.php';?>