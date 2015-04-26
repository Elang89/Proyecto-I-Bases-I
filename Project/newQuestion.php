  <?php 
 // This php connects to the dadabatse and inserts new questions on the tables that only an admin can modify  
 // This php is called from manage-applicationForm.pho
 
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}     
		$var1 = $_POST['new_question'];  
		//echo $var1; 
		
		$stid = ociparse($conn, "BEGIN  application_package.CREATE_NEW_QUESTION(:p1); END;"); 
		
		oci_bind_by_name($stid, ':p1', $var1);  
		oci_execute($stid); 

?> 

		<script type="text/javascript">  
		alert("Congratulation, the question was successfully created :)"); 
		window.location = "manage-applicationForm.php";
		</script>