<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / User Results</span>
    <h2>User Results</h2>
  </div>
</div>
<!-- banner -->

<?php 
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');

    $searchData = $_POST['search_data'];
	$result;
	$resultArray;
	$finalResult = '';
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableFindUsers = 'BEGIN :user_cursor := person_package.find_users(:p_search_data);END;';
	$result = oci_new_cursor($db_connection);
	
	$dataToReceive = oci_parse($db_connection, $sqlVariableFindUsers);
	
	oci_bind_by_name($dataToReceive, ':user_cursor', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceive, ':p_search_data', $searchData);
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
			if($searchData == "" || $resultArray == null){
				echo "<h2>No results found<h2>";
			} else {
				$finalResult = $finalResult.'<div class="col-lg-4 col-sm-6"> 
												<div class="properties">
													<form action="user-detail.php" method="POST">
														<input class="form-control" type="text" readonly name="username" value="'.$resultArray[0]['USERNAME'].'"/>
														<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$resultArray[0]['PERSON_ID'].'"/>
														<input class="form-control" type="text" readonly name="name" value="'.$resultArray[0]['PERSON_NAME'].'"/>
														<input class="form-control" type="text" readonly name="last_name" value="'.$resultArray[0]['FIRST_LAST_NAME'].'"/>
														<input class="form-control" type="text" readonly name="second_last_name" value="'.$resultArray[0]['SECOND_LAST_NAME'].'"/>
														<input type="submit" class="btn btn-primary" value="View Details"
													<form/>
												</div>
											   </div>'; 
			    echo $finalResult;
			}
		?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>