<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Statistics</span>
    <h2>Statistics</h2>
  </div>
</div>
<!-- banner -->



  <?php 
 // This php connects to the dadabatse and inserts new questions on the tables that only an admin can modify  
 // This php is called from manage-applicationForm.pho
 
$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}     
		  
		
		$stid = ociparse($conn, "select count(*) from pet"); 
		oci_execute($stid); 
		$registered = oci_fetch_array($stid);  
		
	    $stid1 = ociparse($conn, "select count(*) from pet where adoptant_id IS NULL"); 
		oci_execute($stid1); 
		$waiting = oci_fetch_array($stid1);  
		
		$stid2 = ociparse($conn, "SELECT COUNT(*) FROM PET WHERE ADOPTANT_ID IS NOT NULL"); 
		oci_execute($stid2); 
		$adopted = oci_fetch_array($stid2);  
		
		$stid3 = ociparse($conn, "select count(*) from person where BLACKLIST  < 0"); 
		oci_execute($stid3); 
		$blacklist = oci_fetch_array($stid3); 
		
		$stid4 = ociparse($conn,  "select count(*) 
       FROM 
       (select PET_ID, count(PET_ID)
       from PETRETURN
       group by PET_ID
       having count (pet_id) >= 1)"); 
		oci_execute($stid4); 
		$returned = oci_fetch_array($stid4); 
		

?> 

    <div class="container">
      <div class="properties-listing spacer">

      <div id="owl-example" class="owl-carousel">
        <div class="properties">
          <div class="image-holder"><img src="images/properties/Siberian Husky.jpg" class="img-responsive" alt="properties"/></div>

        </div>
        <div class="properties">
          <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images/properties/German Shepherd.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images/properties/Rottweiler.jpg" class="img-responsive" alt="properties"/></div>

        </div>
		<div class="properties">
          <div class="image-holder"><img src="images/properties/Doberman.jpg" class="img-responsive" alt="properties"/></div>

        </div> 
      </div>
    </div> 

    <div class="spacer">
      <div class="row">
        <div class="col-lg-6 col-sm-9 recent-view"> 
			<h2>Registered pets: <?php echo $registered[0] ?></h2>  
			<h2>Adopted Pets: <?php echo $adopted[0] ?></h2>
			<h2>Pets in adoption: <?php echo $waiting[0] ?></h2>
			<h2>Returned Pets: <?php echo $returned[0] ?></h2>
			<h2>Users in blacklist: <?php echo $blacklist[0] ?> </h2>
 
          
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>