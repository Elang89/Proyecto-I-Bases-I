<?php include'header.php';?>
<!-- banner -->
<script src="javascript/findInputs.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Edit User</span>
    <h2>Edit User</h2>
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

	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableGetUserDetails = 'BEGIN :result := person_package.retrieve_user_details(:p_id);END;';
	$sqlVariableGetEmails = 'BEGIN :email_result := email_package.retrieve_user_emails(:p_id);END;';
	$sqlVariableGetPhones = 'BEGIN :phone_result := phone_package.retrieve_user_phones(:p_id);END;';
	$result = oci_new_cursor($db_connection);
	$emailResult = oci_new_cursor($db_connection);
	$phoneResult = oci_new_cursor($db_connection);
	
	$dataToReceiveUserDetails = oci_parse($db_connection, $sqlVariableGetUserDetails);
	$dataToReceiveUserEmails = oci_parse($db_connection, $sqlVariableGetEmails);
	$dataToReceiveUserPhones = oci_parse($db_connection, $sqlVariableGetPhones);
	
	oci_bind_by_name($dataToReceiveUserDetails, ':result', $result, -1,  OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserDetails, ':p_id', $id);
	oci_bind_by_name($dataToReceiveUserEmails, ':email_result', $emailResult, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveUserEmails, ':p_id', $id);
	oci_bind_by_name($dataToReceiveUserPhones, ':phone_result', $phoneResult, -1, OCI_B_CURSOR);
		oci_bind_by_name($dataToReceiveUserPhones, ':p_id', $id);
	
	oci_execute($dataToReceiveUserDetails);
	oci_execute($result, OCI_DEFAULT);
	oci_execute($dataToReceiveUserEmails);
	oci_execute($emailResult, OCI_DEFAULT);
	oci_execute($dataToReceiveUserPhones);
	oci_execute($phoneResult, OCI_DEFAULT);
	
	oci_fetch_all($result, $dataArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	oci_fetch_all($emailResult, $emailArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	oci_fetch_all($phoneResult, $phoneArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	
	$firstName = $dataArray[0]['PERSON_NAME'];
	$lastName = $dataArray[0]['FIRST_LAST_NAME'];
	$secondLastName = $dataArray[0]['SECOND_LAST_NAME'];
	
	$primaryEmail = $emailArray[0]['EMAIL'];
	$primaryPhone = $phoneArray[0]['PHONE_NUMBER'];
	
	

?>
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6">
        <legend>Photo</legend>
        <img src="images/Users/user_without_photo.png" class="img-responsive img-circle" alt="properties"/>
        <input type="file" name="photo" title="Photo"/>
        <input id="user_username" type="text" class="form-control" placeholder="Username" name="form_name" maxlength="12" value="<?php echo $_SESSION['name']?>" readonly>
        <h4>Change password</h4>
        <div class="row">
          <div class="col-lg-6">
            <input id="user_old_password" type="password" class="form-control" placeholder="Old Password" name="form_phone" maxlength="16" value="">
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6">
            <input id="user_password" type="password" class="form-control" placeholder="New Password" name="form_phone" maxlength="16" value="">
          </div>
          <div class="col-lg-6">
            <input id="user_re_password" type="password" class="form-control" placeholder="Confirm Password" name="form_phone" maxlength="16" value="">
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <input id="user_first_name" type="text" class="form-control" name="form_name" maxlength="20" readonly value="<?php echo $firstName?>">
        <input id="user_first_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $lastName?>">
        <input id="user_second_lastname" type="text" class="form-control" name="form_name" maxlength="16" readonly value="<?php echo $secondLastName?>">
        <input id="user_email" type="text" class="form-control" name="form_email" maxlength="30" readonly value="<?php echo $primaryEmail?>">
        <input id="user_phone" type="text" class="form-control" name="form_email" maxlength="8" readonly value="<?php echo $primaryPhone?>">
        <legend>Which type of user would you want to be?</legend>
        <input type="checkbox" name="animal" value="" style="height: 20px" checked>
        <label>Adopter</label> <br />
        <input type="checkbox" name="animal" value="" style="height: 20px">
        <label>Rescuer</label> <br />
        <div class="row">
          <div class="col-lg-6">
            <button id="user_phones_butt" type="button" class="btn btn-success" data-toggle="modal" data-target="#user_phones">Edit Phones</button>
          </div>
          <div class="col-lg-6">
            <button id="user_email_butt" type="button" class="btn btn-success" data-toggle="modal" data-target="#user_Email">Edit Email</button>
          </div>
        </div>
		<br>
		<div class="row">
          <div class="col-lg-6">
            <input id="insert_email" type="text" class="form-control" name="form_email" placeholder="New Email Address" maxlength="30">
          </div>
          <div class="col-lg-6">
            <input id="insert_phone" type="text" class="form-control" name="form_email" placeholder="New Phone Number" maxlength="8">
          </div>
		  <div class="col-lg-6">
            <button id="insert_email_phone" type="button" class="btn btn-success" >Confirm</button>
          </div>
        </div>
      </div>
    </div>
	<br>
    <div class="row register">
      <div class="pull-right">
        <button id="Submit_User" type="button" class="btn btn-success" name="Submit" >Save Changes</button>
      </div>
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
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 1" name="form_name" maxlength="20" value="">
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 2" name="form_name" maxlength="20" value="">
          <input id="user_phone" type="text" class="form-control" placeholder="Phone 3" name="form_name" maxlength="20" value="">
        </div>
      </div>
      <div class="row">
        <div class="pull-right">
          <div class="col-lg-6">
            <button id="user_phones_cancel" type="button" class="btn btn-success">Cancel</button>
          </div>
          <div class="col-lg-6">
            <button id="user_phones_save" type="button" class="btn btn-success">Save</button>
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
          <input id="user_email" type="text" class="form-control" placeholder="Email 1" name="form_name" maxlength="20" value="">
          <input id="user_email" type="text" class="form-control" placeholder="Email 2" name="form_name" maxlength="20" value="">
          <input id="user_email" type="text" class="form-control" placeholder="Email 3" name="form_name" maxlength="20" value="">
        </div>
      </div>
      <div class="row">
        <div class="pull-right">
          <div class="col-lg-6">
            <button id="user_Email_Cancel" type="button" class="btn btn-success">Cancel</button>
          </div>
          <div class="col-lg-6">
            <button id="user_Email_Save" type="button" class="btn btn-success">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.modal emails -->
<?php include'footer.php';?>