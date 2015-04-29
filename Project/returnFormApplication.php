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
				 <?php
				$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
				if (!$conn) {
					$e = oci_error();
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				} 
							$query= 'SELECT * FROM REASONRETURNED';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 

								while($row=oci_fetch_assoc($stmt)) { 				
									 echo '<option>' . $row['REASON'] . '</option>';			 
								} 				 						
				 ?>
			</select>
			<input id="pet code" name="code" type="text" style="display: none" value="<?php echo $petId  ?>"/>
			<button id="Submit_Return" class="btn btn-success" name="Submit">Submit Return Form</button>
		</div>
	  </div>
	</div>
</div>
<?php include'footer.php';?>