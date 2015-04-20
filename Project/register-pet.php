<?php include'header.php';?>
<!-- banner -->
<script src="javascript/findInputs.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register Pet</span>
    <h2>Register Pet</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
	   
	   <!-- Pet type -->
		<select name="pet_type" style="width: 400px"  >
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
        <select name="pet_breed" style="width: 400px" >
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
        <!-- Breed of animal -->

        <!-- Color -->
        <select name="pet_color" style="width: 400px"  >
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
        <select name="pet_size" style="width: 400px"  >
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
        <select name="pet_trainning" style="width: 400px">
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
		<select name="pet_vet" style="width: 400px">
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
         <select multiple name="pet_treatment" style="width: 400px" size = 4>
		<optgroup label="Select Treatments">
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
		<select multiple name="pet_diseases" style="width: 400px" size = 4>
		<optgroup label="Select diseases ">
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
		<select multiple name="pet_medicines" style="width: 400px" size = 4>
		<optgroup label="Select  medicines ">
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
		
      </div>  

      <div class="col-lg-6">   
	  
	  <!-- Energy --> 
		<select  name="pet_medicines" style="width: 400px" >
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
		<select  name="pet_space" style="width: 400px" >
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
		<select  name="pet_condition" style="width: 400px" >
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
		
		<input id="name" type="text" class="form-control" placeholder="Animal's name (or specify unknown)" name="form_name" maxlength="30">
        <input id="address" type="text" class="form-control" placeholder="Animal's Last Known Location" name="form_name" maxlength="100">
        <input id="Abandon" type="text" class="form-control" placeholder="Describe how the animal was abandoned*" name="form_name" maxlength="100">  
		<input id="Notes" type="text" class="form-control" placeholder="More information about the animal" name="form_name" maxlength="100">
		
        <label>Please upload a photo of the pet:</label>
        <input type="file" name="photo" title="Photo"/>

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
        <button id="Submit_User" type="button" class="btn btn-success" name="Submit">Register</button>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>