<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / User Results</span>
    <h2>Blacklist</h2>
  </div>
</div>
<!-- banner -->

<?php 
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');

	$result;
	$resultArray;
	$finalResult = '';
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableBlackListResults = 'BEGIN :user_cursor := person_package.return_blacklisted_users;END;';
	$result = oci_new_cursor($db_connection);
	
	$dataToReceive = oci_parse($db_connection, $sqlVariableBlackListResults);
	
	oci_bind_by_name($dataToReceive, ':user_cursor', $result, -1, OCI_B_CURSOR);
	oci_execute($dataToReceive);
	oci_execute($result, OCI_DEFAULT);
	oci_fetch_all($result, $resultArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	
	oci_close($db_connection);
	
?>
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="hot-properties hidden-xs">
          <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/9.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Golden Retriever</h5>
			</div>
          </div>
		   <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/4.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Siberian Husky</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Weimeraner.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Weimeraner</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Ridgeback.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Ridgeback</h5>
			</div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-sm-8">
        <div class="row">
		<?php 
			if($resultArray == null){
				echo "<h2>No results found<h2>";
			} else {
				foreach($resultArray as $iterator){
					$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6"> 
													<div class="properties">
														<form action="user-detail.php" method="POST">
															<h4>'.$iterator['USERNAME'].' </h4>
															<h5>'.$iterator['PERSON_NAME'].'</h5>
															<h5>'.$iterator['FIRST_LAST_NAME'].'</h5>
															<h5>'.$iterator['SECOND_LAST_NAME'].'</h5>
															<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$iterator['USERNAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$iterator['PERSON_ID'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="name" value="'.$iterator['PERSON_NAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="last_name" value="'.$iterator['FIRST_LAST_NAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="second_last_name" value="'.$iterator['SECOND_LAST_NAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="b_value" value="'.$iterator['BLACKLIST'].'"/>
															<input type="submit" class="btn btn-primary" value="View Details"/>
														</form>
													</div>
												   </div>'; 
				}
				echo $finalResult;
			}
		?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>