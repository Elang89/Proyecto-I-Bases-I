<?php include'header.php';?>
<!-- banner -->
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
		
      </div>  

      <div class="col-lg-6">   
	  
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
		
		<input id="name" type="text" class="form-control" placeholder="Animal's name (or specify unknown)" name="name" maxlength="30">
        <input id="address" type="text" class="form-control" placeholder="Animal's Last Known Location" name="address" maxlength="100">
        <input id="Abandon" type="text" class="form-control" placeholder="Describe how the animal was abandoned*" name="abandoned" maxlength="100">  
		<input id="Notes" type="text" class="form-control" placeholder="More information about the animal" name="notes" maxlength="100">
		
        <label>Please copy a URL with a photo of the pet:</label>

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input type="submit" value="Register Pet"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 
<?php oci_close($conn); ?>
<?php include'footer.php';?>  
	</form>

<script type="text/javascript"> 

function updateBreed(){
		var xmlhttp;
		var Id = document.getElementById( "pet_type_combo");
        var selectedOption = Id.options[Id.selectedIndex].value;    
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("breeds").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_breed_combo.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
} 

function registerPet(){  
		var xmlhttp;
		var Id = document.getElementById( "pet_type_combo");
        var selectedOption = Id.options[Id.selectedIndex].value;    
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("breeds").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_breed_combo.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
		alert(selectedOption);

}

  </script> 