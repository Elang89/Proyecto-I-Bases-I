<?php include'header.php';?>
<!-- banner -->

<div class="inside-banner">
  <div class="container"> 
    <span class="pull-right"><a href="index.php">Home</a> / User Search Form</span>
    <h2>User Search Form</h2>
</div>
</div>
<!-- banner -->


<div class="container">
	<div class="spacer">
		<div class="row register">
		  <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">
		    <form action="userResult.php" method="POST">
				<input id="register" type="text" class="form-control" placeholder="Username" name="search_data">
				<input id="Submit_User" type="submit" class="btn btn-success" name="Submit" value="Find User">
			</form>
		</div>
	  </div>
	</div>
</div>
<?php include'footer.php';?>