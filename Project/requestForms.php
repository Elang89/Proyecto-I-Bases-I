<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Requests</span>
    <h2>Requests</h2>
  </div>
</div>
<!-- banner -->

<?php 
	$db_connection = oci_connect('DBadmin', 'dbadmin', 'localhost/petloversdbXDB');

	$id = $_SESSION['id'];
	$result;
	$resultArray;
	$finalResult = '';
	
	if(!$db_connection){                                    /* checks if connection with the database works */
		exit ("Server could not connect to database");
	}
	
	$sqlVariableFindUsers = 'BEGIN :user_cursor := applications_package.retrieve_application(:p_id);END;';
	$result = oci_new_cursor($db_connection);
	
	$dataToReceive = oci_parse($db_connection, $sqlVariableFindUsers);
	
	oci_bind_by_name($dataToReceive, ':user_cursor', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceive, ':p_id', $id);
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
            <div class="col-lg-4 col-sm-5"><img src="images/properties/pug.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Pug</h5>
			</div>
          </div>
		   <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Bull.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Bull Terrior</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Collie.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Collie</h5>
			</div>
          </div>
		  <div class="row">
            <div class="col-lg-4 col-sm-5"><img src="images/properties/Bulldog.jpg" class="img-responsive img-circle" alt="properties"></div>
			<div class="col-lg-8 col-sm-7">
				<h5>Bulldog</h5>
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
														<form action="formResults.php"method="POST">
															<h4>'.$iterator['USERNAME'].' </h4>
															<h5>Pet Id:'.$iterator['PET_ID'].'</h5>
															<input class="form-control" type="text" style="display: none" readonly name="adoption_id" value="'.$iterator['ADOPTION_CODE'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="username" value="'.$iterator['USERNAME'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="p_id" value="'.$iterator['PERSON_ID'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="pet_id" value="'.$iterator['PET_ID'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="question1" value="'.$iterator['QUESTION_1'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="question2" value="'.$iterator['QUESTION_2'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="question3" value="'.$iterator['QUESTION_3'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="question4" value="'.$iterator['QUESTION_4'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="question5" value="'.$iterator['QUESTION_5'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="answer1" value="'.$iterator['ANSWER_1'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="answer2" value="'.$iterator['ANSWER_2'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="answer3" value="'.$iterator['ANSWER_3'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="answer4" value="'.$iterator['ANSWER_4'].'"/>
															<input class="form-control" type="text" style="display: none" readonly name="answer5" value="'.$iterator['ANSWER_5'].'"/>
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