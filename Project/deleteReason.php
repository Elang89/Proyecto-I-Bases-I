<?php   
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}  
		$deleteOption = intval($_GET['selectedId']);  
		
		$stid = ociparse($conn, "BEGIN  RETURNREASON_PACKAGE.DELETE_REASON(:p1); END;");

		oci_bind_by_name($stid, ':p1', $deleteOption);
		oci_execute($stid); 
		oci_close($conn);
	
?>   

		<script>
		alert("Congratulation, the selected reason successfully deleted  :)");
		</script>