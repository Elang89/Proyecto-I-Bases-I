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
	
	<form enctype="multipart/form-data" action="javascript:searchPet();" method="POST" class="pet-search-form" id="pet-search-form">
	   <!-- Pet type --> 
		<select name="pet_type_combo" id = "pet_type_combo" class="form-control" onChange = "updateBreed();"updateBreed()">
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
        <select name="pet_size" id ="pet_size" class="form-control" >
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
        <select name="pet_trainning"   id="pet_trainning" class="form-control">
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
		<select  name="pet_energy"  id="pet_energy" class="form-control">
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
		<select  name="pet_space" id="pet_space" class="form-control">
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
	  </form> 
    <h5>Search by Months</h5> 
	<select id = "consultMonths"  name = "consultMonths" class="form-control" >  
	<option value = "-1">Select Months Since announcement:</option>
						  <option>0</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option> 
						  <option>7</option> 
						  <option>8</option> 
						  <option>9</option> 
						  <option>10</option>
						  <option>11</option> 
						  <option>12</option> 
                    </select>
	<button class="btn btn-primary" onClick = "javascript:month();">Find by Months</button>
    </div> 

    <div class="col-lg-9 col-sm-8" id = "petSearch">

<!-- pets --> 
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
															<h4>'.$iterator['PET_NAME'].' </h4>
															<div class="image-holder"><img src="'.$iterator['IMAGE'].'"class="img-responsive" alt="properties"/></div>
															<h5>'.$iterator['PET_TYPE_NAME'].'</h5>
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
															<input type="submit" class="btn btn-primary" value="View Details"/>
														</form>
													</div>
												   </div>'; 
				}
			    echo $finalResult;
			}

		?>   

<!-- pets -->      
    </div>
  </div>
</div>
</div>

<script type="text/javascript">  
    /*Function to update the  pets  according to the options chosen 
	  AJAX function that calls pet_search_result.php */
	function searchPet()
	{     
		var Id1 = document.getElementById("pet_type_combo");  
		var type = Id1.options[Id1.selectedIndex].value; 

		var Id2 = document.getElementById('pet_breed_combo'); 
		var breed = Id2.options[Id2.selectedIndex].value; 
		
		var Id3= document.getElementById('pet_color'); 
		var color = Id3.options[Id3.selectedIndex].value;   
		
		var Id4 = document.getElementById('pet_size'); 
		var size = Id4.options[Id4.selectedIndex].value;  
		
		var Id5 = document.getElementById('pet_trainning');
		var trainning = Id5.options[Id5.selectedIndex].value;   
		
		var Id6 = document.getElementById('pet_energy');
		var energy = Id6.options[Id6.selectedIndex].value;   
		
		var Id7 = document.getElementById('pet_space'); 
		var space = Id7.options[Id7.selectedIndex].value;  
		
		var xmlhttp;
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
			document.getElementById("petSearch").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","pet_search_result.php?type=" + type + "&breed=" + breed + "&color=" + color + "&size=" + size + "&trainning=" + trainning + "&energy=" + energy + "&space=" + space, true);
		xmlhttp.send();
	} 
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
		xmlhttp.open("GET","pet_breed_combo_search.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();  
} 

function month(){
	
		var Id1 = document.getElementById("consultMonths");  
		var month = Id1.options[Id1.selectedIndex].value;  		
	var xmlhttp;
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
			document.getElementById("petSearch").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","monthSearch.php?month=" + month, true);
		xmlhttp.send();
} 	
</script>
<?php include'footer.php';?>