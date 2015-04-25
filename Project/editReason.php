<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}   
		$editOption = intval($_GET['selectedId']);   
		$newName = $_GET['newName'];  
		
		$stid = ociparse($conn, "BEGIN  RETURNREASON_PACKAGE.EDIT_REASON(:p1, :p2); END;");

		oci_bind_by_name($stid, ':p1', $editOption); 
		oci_bind_by_name($stid, ':p2', $newName);
		oci_execute($stid); 
		oci_close($conn);
	
?>    

		<script>
		alert("Congratulation, the selected reason successfully edited  :)");
		</script>
