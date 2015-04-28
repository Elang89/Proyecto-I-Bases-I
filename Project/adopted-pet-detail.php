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
					<input id="username" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $petName?>">
			</div>
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span class="glyphicon glyphicon-asterisk"></span>More Information</h4> 
					<h5>Pet Name</h5>
					<input id="pet_space" type="text" class="form-control" name="type" maxlength="16" readonly value="<?php echo $petName;?>">				
					<h5>Pet Type</h5>
					<input id="pet_space" type="text" class="form-control" name="type" maxlength="16" readonly value="<?php echo $pet_type;?>">
					<h5>Pet Breed</h5>
					<input id="pet_breed" type="text" class="form-control" name="breed" maxlength="16" readonly value="<?php echo $pet_breed;?>"> 
					<h5>Pet State</h5>
					<input id="pet_cond" type="text" class="form-control" name="cond" maxlength="30" readonly value="<?php echo $pet_cond;?>"> 
					<h5>Pet Energy</h5>
					<input id="pet_energy" type="text" class="form-control" name="energy" maxlength="8" readonly value="<?php echo $pet_energy;?>">  
					<h5>Pet Training Facility</h5>
					<input id="pet_learn" type="text" class="form-control" name="learn" maxlength="30" readonly value="<?php echo $pet_learn;?>"> 
					<h5>Pet Owners Name</h5>
					<input id="person_name" type="text" class="form-control" name="Pname" maxlength="30" readonly value="<?php echo $person_name;?>">
					<h5>More Notes</h5>
					<input id="pet_location" type="text" class="form-control" name="location" maxlength="100" readonly value="<?php echo $notes;?>">
					<form action="returnFormApplication.php" method="POST">
						<input id="pet code" name="code" type="text" style="display: none" value="<?php echo$code  ?>"/>
						<input id="id" name="person_id" type="text" style="display: none" value="<?php echo $_SESSION['id'] ?>"/>
						<input id="return" type="submit" class="btn btn-success"  value = "Return Pet"/>  <!-- If its not owner -->
						<!--  <input id="EDIT" type="button" class="btn btn-success" onClick = "" value = "Edit" /> If its OWNER OF THE PET -->
				   </form>
				</div>
			</div> 
			
			<div class="col-lg-6 col-sm-6">
				<div class="spacer"><h4><span ></span></h4>
					<h5>Pets Color</h5>
					<input id="pet_color" type="text" class="form-control" name="color" maxlength="30" readonly value="<?php echo $color;?>">
					<h5>Pets Space Necessity</h5>					
					<input id="pet_space" type="text" class="form-control" name="space" maxlength="30" readonly value="<?php echo $space;?>">
					<h5>Pets Treatment</h5>	
					<input id="pet_treatment" type="text" class="form-control" name="treatment" maxlength="8" readonly value="<?php echo $treatment;?>">
					<h5>Pet Veterinary</h5>
					<input id="pet_vet" type="text" class="form-control" name="vet" maxlength="8" readonly value="<?php echo $pet_vet;?>">
					<h5>Pets Sickness</h5>
					<input id="pet_sickness" type="text" class="form-control" name="sickness" maxlength="8" readonly value="<?php echo $sickness;?>">
					<h5>Pets Medicine</h5>
					<input id="pet_med" type="text" class="form-control" name="med" maxlength="8" readonly value="<?php echo $med;?>"> 
					<h5>Pets Last Known Location</h5>
					<input id="pet_location" type="text" class="form-control" name="location" maxlength="8" readonly value="<?php echo $location;?>"> 
				</div>
		 </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php include'footer.php';?>