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
        <input type="text" class="form-control" placeholder="Search by Name">
		
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
        <div class="col-lg-4 col-sm-6">
          <div class="properties">
            <div class="image-holder"><img src="images/properties/POODLE.jpg" class="img-responsive" alt="properties">
              <div class="status found">Adopted</div>
            </div>
            <h4><a href="pet-detail.php">Size: large</a></h4>
            <p class="text">Breed: Poodle</p>
            <a class="btn btn-primary" href="pet-detail.php">View Details</a>
          </div>
        </div>
        <!-- properties -->
        
 
      </div>
    </div>
  </div>
</div>
</div>
<?php include'footer.php';?>