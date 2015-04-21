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

	$searchParameter = $_POST['search_parameter_type'];
    $searchData = $_POST['search_data'];
	$result;
	$resultArray;
	
	$sqlVariableFindUsers = 'BEGIN :user_cursor := person_package.find_users(:p_search_parameter, :p_search_data);END;';
	$result = oci_new_cursor($db_connection);
	
	$dataToReceive = oci_parse($db_connection, $sqlVariableFindUsers);
	
	oci_bind_by_name($dataToReceive, ':user_cursor', $result, -1, OCI_B_CURSOR);
	oci_bind_by_name($dataToReceive, ':p_search_parameter', $searchParameter);
	oci_bind_by_name($dataToReceive, ':p_search_data', $searchData);
	oci_execute($dataToReceive);
	oci_execute($result, OCI_DEFAULT);
	oci_fetch_all($result, $resultArray, null, null, OCI_FETCHSTATEMENT_BY_ROW);
	
	var_dump ($searchParameter);
	var_dump ($searchData);
	var_dump($resultArray);
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
			if($searchData == ""){
				echo "<h2>No results found<h2>";
			}
		?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>