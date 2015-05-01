<?php include'header.php';?>
<!-- banner -->
<script src="javascript/getImages.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / User Profile</span>
    <h2>User Profile</h2>
  </div>
</div>
<!-- banner -->
<?php
/* This file makes calls the appropriate queries in the database to validate if the user exists or not,
*based on those results it will return a 0 for false or a 1 for true, which is then handled by javascript*/
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	
	$username = $_SESSION['name'];
	$id = $_SESSION['id'];
	$firstName;
	$lastName;
	$secondLastName;
	$primaryEmail;
	$primaryPhone;
	$result;
	$emailResult;
	$phoneResult;
	$dataArray;
	$emailArray;
	$phoneArray;
	$path;
	$image; 

	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableGetUserDetails = 'BEGIN :result := person_package.retrieve_user_details(:p_id);END;';
	$sqlVariableGetEmails = 'BEGIN :email_result := email_package.retrieve_user_emails(:p_id);END;';
	$sqlVariableGetPhones = 'BEGIN :phone_result := phone_package.retrieve_user_phones(:p_id);END;';
	$sqlVariableGetImage = 'BEGIN :image_result := image_package.return_image(:p_id);END;';
	$result = oci_new_cursor($db_connection);
	$emailResult = oci_new_cursor($db_connection);
	$phoneResult = oci_new_cursor($db_connection);
	
	$dataToReceiveUserDetails = oci_parse($db_connection, $sqlVariableGetUserDetails);
	$dataToReceiveUserEmails = oci_parse($db_connection, $sqlVariableGetEmails);
	$dataToReceiveUserPhones = oci_parse($db_connection, $sqlVariableGetPhones);
	$dataToReceiveImage = oci_parse($db_connection, $sqlVariableGetImage);
	
	oci_bind_by_name($dataToReceiveUserDetails, ':result', $result, -1,  OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserDetails, ':p_id', $id);
	oci_bind_by_name($dataToReceiveUserEmails, ':email_result', $emailResult, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserEmails, ':p_id', $id);
	oci_bind_by_name($dataToReceiveUserPhones, ':phone_result', $phoneResult, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserPhones, ':p_id', $id);
	oci_bind_by_name($dataToReceiveImage,':p_id', $id);
	oci_bind_by_name($dataToReceiveImage,':image_result', $image,2000);
	
	oci_execute($dataToReceiveUserDetails);
	oci_execute($result, OCI_DEFAULT);
	oci_execute($dataToReceiveUserEmails);
	oci_execute($emailResult, OCI_DEFAULT);
	oci_execute($dataToReceiveUserPhones);
	oci_execute($phoneResult, OCI_DEFAULT);
	oci_execute($dataToReceiveImage);
	
	oci_fetch_all($result, $dataArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	oci_fetch_all($emailResult, $emailArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	oci_fetch_all($phoneResult, $phoneArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	
	$firstName = $dataArray[0]['PERSON_NAME'];
	$lastName = $dataArray[0]['FIRST_LAST_NAME'];
	$secondLastName = $dataArray[0]['SECOND_LAST_NAME'];
	
	$primaryEmail = $emailArray[0]['EMAIL'];
	$primaryPhone = $phoneArray[0]['PHONE_NUMBER'];
	
	if($image == null){
		$path = "images/Users/user_without_photo.png";
	} else {
		$path = $image;
	}

	oci_close($db_connection);

?>
<div class="container">
  <div class="spacer">
    <div class="row contact">
      <div class="col-lg-6 col-sm-6">
        <legend>Profile Picture</legend>
        <img id="image" src="<?php echo $path?>" class="img-responsive img-circle" alt="properties"/>

        </div>
      <div class="col-lg-6 col-sm-6"> 
		<h5>First name</h5>
        <input id="user_first_name" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $firstName?>"> 
		<h5>First Last name</h5>
        <input id="user_first_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $lastName?>"> 
		<h5>Second Last name</h5>
        <input id="user_second_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $secondLastName?>">
		<h5>E-mail</h5>
        <input id="user_email" type="text" class="form-control" name="form_email" maxlength="30" readonly value="<?php echo $primaryEmail?>"> 
		<h5>Phone number</h5>
        <input id="user_phone" type="text" class="form-control" name="form_email" maxlength="8" readonly value="<?php echo $primaryPhone?>">  
		<h5>Username</h5>
        <input id="user_username" type="text" class="form-control" placeholder="Username" name="form_name" maxlength="12" value="<?php echo $_SESSION['name']?>" readonly>
		<h5>Change profile picture here:</h5>
		<input id="image_name" type="text" class="form-control name="photo" title="Photo"  placeholder="Image URL goes here">
		<div class="col-lg-6">
			<button id="upload_image" type="button" class="btn btn-success">Upload</button>
	    </div>
 
        </div>
		<br>

      </div>
    </div>
  </div>
<!-- Modal numbers-->
<div id="user_phones" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6">
          <h4>Phone numbers of <?php echo $_SESSION['name']?></h4>
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 1" name="form_name" maxlength="20" value="<?php echo $primaryPhone?>" readonly>
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 2" name="form_name" maxlength="20" value="<?php if(array_key_exists(1, $phoneArray)){
			  echo $phoneArray[1]['PHONE_NUMBER'];
		  } else {
			  echo "Phone 2";
		  }?>" readonly>
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 3" name="form_name" maxlength="20" value="<?php if(array_key_exists(2, $phoneArray)){
			  echo $phoneArray[2]['PHONE_NUMBER'];
		  } else {
			  echo "Phone 3";
		  } ?>" readonly>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
            <button id="user_phones_close" type="button" class="btn btn-success">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.modal numbers -->

<!-- Modal emails -->
<div id="user_Email" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="row">
        <div class="col-sm-6">
          <h4>Emails of <?php echo $_SESSION['name']?></h4>
          <input id="user_email" type="text" class="form-control" placeholder="Email 1" name="form_name" maxlength="20" value="<?php echo $primaryEmail ?>" readonly>
          <input id="user_email" type="text" class="form-control" placeholder="Email 2" name="form_name" maxlength="20" value="<?php if(array_key_exists(1,$emailArray)){
			  echo $emailArray[1]['EMAIL'];
		  } else {
			  echo "Email 1";
		  }?>" readonly>
          <input id="user_email" type="text" class="form-control" placeholder="Email 3" name="form_name" maxlength="20" value="<?php if(array_key_exists(2,$emailArray)){
			  echo emailArray[2]['EMAIL'];  
		  } else {
			  echo "Email 2";
		  }?>" readonly>
        </div>
      </div>
      <div class="row">
          <div class="col-lg-6">
            <button id="user_email_close" type="button" class="btn btn-success">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.modal emails -->
<?php include'footer.php';?>