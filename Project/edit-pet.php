<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="userIndex.php">Home</a> / Pet Profile</span>
    <h2>Pet Profile</h2>
  </div>
</div>

		<?php  		
		$code = $_POST['pet_code'];  
		$petName = $_POST['pet_name']; 
		$pet_type = $_POST['pet_type']; 
		$pet_breed = $_POST['pet_race']; 
		$pet_cond = $_POST['pet_cond']; 
		$pet_energy = $_POST['pet_energy']; 
		$pet_learn = $_POST['pet_learn']; 
		$pet_vet = $_POST['pet_vet']; 
		$person_name = $_POST['pet_p_name']; 
		$location = $_POST['pet_location'];  
		$notes = $_POST['pet_notes']; 
		$space = $_POST['pet_space']; 
		$treatment = $_POST['pet_treatment']; 
		$color = $_POST['pet_color']; 
		$sickness = $_POST['pet_sickness']; 
		$med = $_POST['pet_med']; 
		$image = $_POST['image']; 
		$abandon = $_POST['pet_abandon'];
		
		if($image != null){
			$path = $image;
		} else {
			$path = "images/logo2.png"; 
		}
		?> 
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 hidden-xs">
        <div class="hot-properties hidden-xs">
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Siberian Husky</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/1.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>White German Shepherd</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>Golden Retriever</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/2.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>German Shepherd</h5>
              <p class="text"></p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-sm-8 ">
        <h2>Pet Details</h2>
        <div class="row">
          <div class="col-lg-8">
            <div class="property-images">
              <!-- Slider Starts -->
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators hidden-xs">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="2" class=""></li>
                  <li data-target="#myCarousel" data-slide-to="3" class=""></li>
                </ol>
                <div class="carousel-inner">
                  <!-- Item 1 -->
                  <div class="item active">
                    <img src="images/properties/4.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 1 -->
                  <!-- Item 2 -->
                  <div class="item">
                    <img src="images/properties/2.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- #Item 2 -->
                  <!-- Item 3 -->
                  <div class="item">
                    <img src="images/properties/1.jpg" class="properties" alt="properties" />
                  </div>
                  <!-- #Item 3 -->
                  <!-- Item 4 -->
                  <div class="item ">
                    <img src="images/properties/3.jpg" class="properties" alt="properties" />
                    
                  </div>
                  <!-- # Item 4 -->
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
              </div>
              <!-- #Slider Ends -->
            </div>
			<div class="spacer"><h4><span class="glyphicon glyphicon-star"></span><?php echo $petName?></h4>
				<div class="col-lg-6 col-sm-6">
					<legend>Profile Picture</legend>
					<img src="<?php echo $path ?>" class="img-responsive img-circle" alt="properties"/>
				</div>
					<input id="username" type="text" class="form-control" name="form_name" maxlength="20" value="<?php echo $petName?>">
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span class="glyphicon glyphicon-asterisk"></span>More Information</h4> 

				</div>
					  <form enctype="multipart/form-data" action="REGISTER_PET.php" method="POST" class="register-pet-form" id="register-pet-form">
	   <!-- Pet type --> 
		<select name="pet_type_combo" style="width: 400px"  onchange = "updateBreed();" id = "pet_type_combo" class="form-control">
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
        <select name="pet_breed_combo" style="width: 400px"  id = "pet_breed_combo" class="form-control">
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
        <select name="pet_color" style="width: 400px"  id = "pet_color" class="form-control">
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
        <select name="pet_size" style="width: 400px" class="form-control" >
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
        <select name="pet_trainning" style="width: 400px" class="form-control">
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
       
	   <!-- Veterinary -->
		<select name="pet_vet" style="width: 400px" class="form-control">
		<option value = "-1">Select Veterinary:</option> 
		<?php  
		
			$query= 'select VET_NAME from veterinary';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['VET_NAME'] . '</option>';
				}
		?>   
		</select> 
		<!-- Veterinary -->     
		
	   <!-- Treatments -->
         <select name="pet_treatment" style="width: 400px" class="form-control" > 
		 <option value = "-1">Select Treatments:</option> 
		<?php  
		
			$query= 'select PET_TREATMENT from pettreatments';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_TREATMENT'] . '</option>';
				}
		?>   
		</select>  
		<!-- Treatments --> 
		
		<!-- Disease -->
		<select  name="pet_diseases" style="width: 400px" class="form-control"> 
		<option value = "-1">Select disease:</option> 
		<?php  
		
			$query= 'select PET_SICKNESS_NAME from petsickness';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_SICKNESS_NAME'] . '</option>';
				}
		?>   
		</select>   
		<!-- Disease --> 
		
		<!-- Medicine -->
		<select name="pet_medicines" style="width: 400px" class="form-control"> 
		<option value = "-1">Select medicine:</option> 
		<?php  
		
			$query= 'select PET_MED_NAME from petmedicine';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_MED_NAME'] . '</option>';
				}
		?>   
		</select>  
		<!-- Medicine -->  

	  
	  <!-- Energy --> 
		<select  name="pet_energy" style="width: 400px" class="form-control">
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
		<select  name="pet_space" style="width: 400px" class="form-control">
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
		
		<!-- Condition-->
		<select  name="pet_condition" style="width: 400px" class="form-control">
		<option value = "-1">Select Condition:</option>
		<?php  
		
			$query= 'select PET_COND_NAME from petcondition';
			$stmt = oci_parse($conn, $query);
			oci_execute($stmt);
				while($row=oci_fetch_assoc($stmt)) {
					 echo '<option>' . $row['PET_COND_NAME'] . '</option>';
				}
		?>   
		</select>
		<!-- Condition -->  
		
		<input id="name" type="text" class="form-control" value="<?php echo $petName?>" name="name" maxlength="30" required>
        <input id="address" type="text" class="form-control" value="<?php echo $location?>" name="address" maxlength="100" required>
        <input id="Abandon" type="text" class="form-control" value="<?php echo $abandon?>" name="abandoned" maxlength="100" required>  
		<input id="Notes" type="text" class="form-control" value="<?php echo $notes?>" name="notes" maxlength="100" required>
		
        <label>Please enter a URL with a photo of your pet:</label>
        <input type="URL" class="form-control" name="photo" title="Photo" required/>
		<input type="submit" value="Edit"  class="btn btn-success">

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">

	</form>
      </div>
    </div>
  </div>
</div> 
<?php oci_close($conn); ?>
			</div>

    </div>
  </div>
</div>
</div>
</div>
</div>
<?php include'footer.php';?>