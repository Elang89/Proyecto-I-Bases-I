<?php include'header.php';?>
<!-- banner -->

<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / Pet Return Form</span>
    <h2>Pet Return Form</h2>
</div>
</div>
 <script src="javascript/sendReturnData.js"></script>
<!-- banner -->
<?php 
	$petId = $_POST['code'];
?>

<div class="container">
	<div class="spacer">
		<div class="row register">
		  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
			<select id="options" class="form-control" name="application options">
				<option>Pet is too difficult or too expensive to maintain</option>
				<option>Pet does not behave, does not fit with environment</option>
				<option>Owner dissatisfied with chosen pet, not what was expected</option>
				<option>Owner does not have time to take care of pet</option>
				<option>Other</option>
			</select>
			<input id="pet code" name="code" type="text" style="display: none" value="<?php echo $petId  ?>"/>
			<button id="Submit_Return" class="btn btn-success" name="Submit">Submit Return Form</button>
		</div>
	  </div>
	</div>
</div>
<?php include'footer.php';?>