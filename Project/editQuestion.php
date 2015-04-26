<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}   
		$editOption = intval($_GET['selectedId']);   
		$newName = $_GET['newName'];  
		
		$stid = ociparse($conn, "BEGIN  application_package.EDIT_QUESTION(:p1, :p2); END;");

		oci_bind_by_name($stid, ':p1', $editOption); 
		oci_bind_by_name($stid, ':p2', $newName);
		oci_execute($stid); 
		oci_close($conn);
	
?>    

		<script type="text/javascript">  
		alert("Congratulation, the selected question successfully edited  :)"); 
		window.location = "manage-applicationForm.php";
		</script>

