<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Application Form</span>
    <h2>Application Form</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6"> 
		
	  <form enctype="multipart/form-data" action="APPLY_FOR_ADOPTION.php" method="POST" class="application-form" id="application-form"> 
	    <?php
		$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
		if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
		} 

         $sql =  'select * from APPLICATIONFORM';
        $stid = oci_parse($conn, $sql); 
		$r = oci_execute($stid);
		while ($row = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC))
        {
            echo "<option value=\"unit1\">" . $row['QUESTION'] . "</option>";  
		    echo '<input required  type = "text" name = "subject1" maxlength="100" id="' . $row['QUESTIONID']  . '" />'	;	} 
	?>

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
		<input type="submit" value="   Apply  "  class="btn btn-success">
      </div>
    </div>
  </div>
</div> 
<?php oci_close($conn); ?>
<?php include'footer.php';?>  
	</form>

<script type="text/javascript"> 


  </script> 