<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Search for a pet</span>
    <h2>Search for a pet</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form"><h4><span class=glyphicon glyphicon-search"></span>Search for a pet</h4>
		
	   <!-- Pet type --> 
		<select name="pet_type_combo" onchange = "updateBreed();" id = "pet_type_combo" class="form-control">
		<option value = "-1">Select Type:</option> 
		<?php  
		$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$conn) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		} 
			$query= 'select PET_TYPE_NAME from pettype';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_TYPE_NAME'] . '</option>';
				}
		?>  
		</select>  
		 <!-- Pet type -->
			
		 <!-- Breed of animal --> 
		<div class="breed" id = "breeds">
        <select name="pet_breed_combo" id = "pet_breed_combo" class="form-control">
		<option value = "-1">Select Breed:</option> 
		<?php  
		
			$query= 'select PET_RACE_NAME from petrace';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_RACE_NAME'] . '</option>';
				}
		?>  
		</select>   
		</div>
        <!-- Breed of animal -->
			
       <!-- Color -->
        <select name="pet_color" id = "pet_color" class="form-control">
		<option value = "-1">Select Color:</option> 
		<?php  
		
			$query= 'select PET_Color from petcolor';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_COLOR'] . '</option>';
				}
		?>   
		</select> 
        <!-- Color -->
       
        <!-- Size -->
        <select name="pet_size" class="form-control" >
		<option value = "-1">Select Size:</option> 
		<?php  
		
			$query= 'select PET_SIZE from petsize';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_SIZE'] . '</option>';
				}
		?>   
		</select>		
        <!-- Size -->
	
        <!-- Training -->
        <select name="pet_trainning" class="form-control">
		<option value = "-1">Select Training Level:</option> 
		<?php  
		
			$query= 'select PET_LEARN_SKILL from petlearningskill';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_LEARN_SKILL'] . '</option>';
				}
		?>   
		</select>
        <!-- Training -->

 	  <!-- Energy --> 
		<select  name="pet_energy" class="form-control">
		<option value = "-1">Select Energy Level:</option>
		<?php  
		
			$query= 'select PET_ENERGY_LEVEL from petenergy';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_ENERGY_LEVEL'] . '</option>';
				}
		?>   
		</select>  
		<!-- Energy -->   

		<!-- Space -->
		<select  name="pet_space" class="form-control">
		<option value = "-1">Select Space Necessity:</option>
		<?php  
		
			$query= 'select PET_SPACE from petspace';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_SPACE'] . '</option>';
				} 
			oci_close($conn);  
		?>   
		</select>
		<!-- Space --> 		
        <button class="btn btn-primary">Find Now</button>
      </div>
      <div class="hot-properties hidden-xs">
        <h4>Waiting for you</h4>

        <div class="row">
          <div class="col-lg-4 col-sm-5"><img src="images/properties/9.jpg" class="img-responsive img-circle" alt="properties"></div>
          <div class="col-lg-8 col-sm-7">
            <h5><a href="pet-detail.php">Ruffo</a></h5>
            <p class="text">Golden Retriever</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-sm-8">
      <div class="sortby clearfix">
        <div class="pull-left result">Showing: </div>
        <div class="pull-right">
          <select class="form-control">
            <optgroup label="Sort by">
              <option>Recency: Old to New</option>
              <option>Recency: New to Old</option>
              <option>Alphabetical order</option>
              <option>Reverse alphabetical order</option>
            </optgroup>
          </select>
        </div>
      </div>
      <div class="row">
       <!-- Basic container for showing animals in the pet search page -->
       <!--  
       <div class="col-lg-4 col-sm-6">
          <div class="properties">
            <div class="image-holder"><img src="images/pets/<?php echo $picture_id; ?>" class="img-responsive" alt="properties">
              <div class="status <?php echo $pet_status; ?>"><?php echo $pet_status; ?></div>
            </div>
            <h4><a href="pet-detail.php?pet=<?php echo $pet_id; ?>">Size: <?php echo $pet_size; ?></a></h4>
            <p class="text">Breed: <?php echo $pet_breed; ?></p>
            <a class="btn btn-primary" href="pet-detail.php?pet=<?php echo $pet_id; ?>">View Details</a>
          </div>
        </div> 
        -->
        <!-- properties --> 
		
		<?php  
		$db_connection = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$db_connection) {
			$e = oci_error();
			trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		}   
		
		$result;
		$resultArray;
		$finalResult = ' '; 
		
		$sqlVariableFindMyPets = 'BEGIN :pet_variable := pet_search_package.all_pets;END;';   
		
		$result = oci_new_cursor($db_connection);	 
		$dataToReceive = oci_parse($db_connection, $sqlVariableFindMyPets);		 
		
		oci_bind_by_name($dataToReceive, ':pet_variable', $result, -1, OCI_B_CURSOR); 
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
        <!-- properties -->
        
 
      </div>
    </div>
  </div>
</div>
</div>
<?php include'footer.php';?>