<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Application Form</span>
    <h2>Application Form</h2>
  </div>
</div>
<script src="javascript/getAnswers.js"></script>
<!-- banner -->
<?php
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	$petCode = $_POST['code'];
	$id = $_SESSION['id'];
	$cursor;
	$resultArray;
	
	$sqlVariableGetQuestions = 'BEGIN :result := applications_package.retrieve_question_group(:p_pet_code);END;';
	$cursor = oci_new_cursor($db_connection);
	
	$dataToReceiveQuestionGroup = oci_parse($db_connection,$sqlVariableGetQuestions);
	
	oci_bind_by_name($dataToReceiveQuestionGroup,':result', $cursor, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceiveQuestionGroup,':p_pet_code',$petCode);
	
	oci_execute($dataToReceiveQuestionGroup);
	oci_execute($cursor, OCI_DEFAULT);
	oci_fetch_all($cursor, $resultArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	?>
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		<input id="question_group_id" type="text" class="form-control" style="display:none" value="<?php echo $resultArray[0]['QUESTION_GROUP_ID']?> readonly">
		<label><?php echo $resultArray[0]['QUESTION_1']?></label>
		<input id="question1" type="text" class="form-control" placeholder="Answer" name="form_name" required>
		<label><?php echo $resultArray[0]['QUESTION_2']?></label>
        <input id="question2" type="text" class="form-control" placeholder="Answer" name="form_name" required>
		<label><?php echo $resultArray[0]['QUESTION_3']?></label>
        <input id="question3" type="text" class="form-control" placeholder="Answer" name="form_name" required>
		<label><?php echo $resultArray[0]['QUESTION_4']?></label>
        <input id="question4" type="text" class="form-control" placeholder="Answer" name="form_email" required>
		<label><?php echo $resultArray[0]['QUESTION_5']?></label>
        <input id="question5" type="text" class="form-control" placeholder="Answer" name="form_email" required>
      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input id="send_answers" type="button" value="Send Application"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 
<?php include'footer.php';?>  