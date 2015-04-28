<?php include'header.php';?>
<!-- banner -->
<script src="javascript/checkApplication.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Application Form</span>
    <h2>Application Form</h2>
  </div>
</div>
<!-- banner -->
<?php
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');
	$adoptionId = $_POST['adoption_id'];
	$petId = $_POST['pet_id'];
	$id = $_POST['p_id'];
	$question1 = $_POST['question1'];
	$question2 = $_POST['question2'];
	$question3 = $_POST['question3'];
	$question4 = $_POST['question4'];
	$question5 = $_POST['question5'];
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	$answer5 = $_POST['answer5'];
?>
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		<input id="adoptionId" type="text" style="display:none" class="form-control" value="<?php echo $adoptionId?>" name="form_name" readonly >
		<input id="petId" type="text" style="display:none" class="form-control" value="<?php echo $petId?>" name="form_name" readonly >
		<input id="personId" type="text" style="display:none" class="form-control" value="<?php echo $id?>" name="form_name" readonly >
		<label><?php echo $question1 ?></label>
		<input id="question1" type="text" class="form-control" value="<?php echo $answer1?>" name="form_name" readonly>
		<label><?php echo $question2 ?></label>
        <input id="question2" type="text" class="form-control" value="<?php echo $answer2?>" name="form_name" readonly>
		<label><?php echo $question3 ?></label>
        <input id="question3" type="text" class="form-control" value="<?php echo $answer3?>" name="form_name" readonly>
		<label><?php echo $question4 ?></label>
        <input id="question4" type="text" class="form-control" value="<?php echo $answer4?>" name="form_email" readonly>
		<label><?php echo $question5 ?></label>
        <input id="question5" type="text" class="form-control" value="<?php echo $answer5?>" name="form_email" readonly>
		<legend>Accept or Reject Application</legend>
          <input id="accept" type="radio" name="animal" value="1" style="height: 20px" checked>
          <label>Accept</label> <br />
          <input id="deny" type="radio" name="animal" value="0" style="height: 20px">
          <label>Deny</label> <br />
      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input id="send_response" type="button" value="Submit"  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 
<?php include'footer.php';?>  