<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="userIndex.php">Home</a> / User Profile</span>
    <h2>User Profile</h2>
  </div>
</div>

<?php 
	$db_connection = $db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	
	$username = $_POST['username'];
	$id = $_POST['p_id'];
	$firstName = $_POST['name'];
	$lastName = $_POST['last_name'];
	$secondLastName = $_POST['second_last_name'];
	$primaryEmail;
	$primaryPhone;
	$emailResult;
	$phoneResult;
	$emailArray;
	$phoneArray;
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	

	
	$sqlVariableGetEmails = 'BEGIN :email_result := email_package.retrieve_user_emails(:p_id);END;';
	$sqlVariableGetPhones = 'BEGIN :phone_result := phone_package.retrieve_user_phones(:p_id);END;';
	$emailResult = oci_new_cursor($db_connection);
	$phoneResult = oci_new_cursor($db_connection);
	
	$dataToReceiveUserEmails = oci_parse($db_connection, $sqlVariableGetEmails);
	$dataToReceiveUserPhones = oci_parse($db_connection, $sqlVariableGetPhones);
	oci_bind_by_name($dataToReceiveUserEmails, ':email_result', $emailResult, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserEmails, ':p_id', $id);
	oci_bind_by_name($dataToReceiveUserPhones, ':phone_result', $phoneResult, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserPhones, ':p_id', $id);
	
	oci_execute($dataToReceiveUserEmails);
	oci_execute($emailResult, OCI_DEFAULT);
	oci_execute($dataToReceiveUserPhones);
	oci_execute($phoneResult, OCI_DEFAULT);
	
	oci_fetch_all($emailResult, $emailArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	oci_fetch_all($phoneResult, $phoneArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	
	$primaryEmail = $emailArray[0]['EMAIL'];
	$primaryPhone = $phoneArray[0]['PHONE_NUMBER'];
	
	oci_close($db_connection);

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
              <h5>Golden Retriever</h5>
              <p class="text"></p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/3.jpg" class="img-responsive img-circle" alt="properties"/></div>
            <div class="col-lg-8 col-sm-7">
              <h5>White German Shepherd</h5>
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
        <h2>User Details</h2>
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
			<div class="spacer"><h4><span class="glyphicon glyphicon-star"></span>Username</h4>
				<div class="col-lg-6 col-sm-6">
					<legend>Profile Picture</legend>
					<img src="images/Users/user_without_photo.png" class="img-responsive img-circle" alt="properties"/>
				</div>
				<input id="username" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $username?>">
			</div>
			<div class="spacer"><h4><span class="glyphicon glyphicon-asterisk"></span>Contact Details</h4>
				<input id="user_first_name" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $firstName;?>">
				<input id="user_first_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $lastName;?>">
				<input id="user_second_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $secondLastName;?>">
				<input id="user_email" type="text" class="form-control" name="form_email" maxlength="30" readonly value="<?php echo $primaryEmail;?>">
				<input id="user_phone" type="text" class="form-control" name="form_email" maxlength="8" readonly value="<?php echo $primaryPhone;?>">
			</div>
			<div class="spacer"><h4><span class="glyphicon glyphicon-th"></span>Rate User</h4>
			</div>
    </div>
  </div>
</div>
</div>
</div>
</div>
<?php include'footer.php';?>