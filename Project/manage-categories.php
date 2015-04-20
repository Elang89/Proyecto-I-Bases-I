<?php include'header.php';?> 

<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Manage categories</span>
    <h2>Manage categories</h2>
  </div>
</div>
<!-- banner -->
<div class="">
  <div class="container">
    <div class="properties-listing spacer">
      <div class="row">
        <div class="col-lg-3 col-sm-4">
          <div class="search-form">
            <div class="row">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-lg-8">
                    <h4><span class="glyphicon glyphicon-th"></span>Select a category</h4>
                  </div>
                  <div class="col-lg-4">
                    <button class="btn btn-primary" type= "button" data-toggle="modal"  data-target="#create_button">NEW!</button>
                  </div>
                </div> 
				<form enctype="multipart/form-data"  method="POST" class="displayInfo" id="displayInfo">
                <div class="row">
                  <div class="col-lg-12">
                    <select class="consultFacts" onchange = "changeFuncion()">
                      <optgroup label="Categories">
                        <optgroup label="Pet">
                          <option>Pet Type</option>
                          <option>Pet breed</option>
                          <option>Color</option>
                          <option>Size</option>
                          <option>Training level</option>
                          <option>Energy level</option>
                        </optgroup>
                        <optgroup label="Health">
                          <option>Health Condition</option>
                          <option>Medication</option>
                          <option>Disease</option>
						   <option>Veterinary</option>
						  <option>Treatment</option> 						  
                        </optgroup> 
						<optgroup label="Other"> 
						<option>Space</option>
                        </optgroup>
                      </optgroup>
                    </select>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-sm-8">
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <div class="col-lg-8"><h4>Option</h4></div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12">
              <!-- Base structure for listing the categories -->
              <!--
              <div class="category-list">
                <div class="col-lg-8"><p class="text"><?php echo $category_name; ?></p></div>
                <div class="col-lg-3"><a class="btn btn-primary" href="pet-detail.php">Edit</a></div>
                <div class="col-lg-1"><div class="checkbox"><label><input type="checkbox"></label></div></div>
              </div>
              -->
              <div class="category-list">
                <div class="col-lg-12"><p class="text">Red</p></div>
                <form action="demo_form.asp">
				<input  type="checkbox" name="vehicle" value="Bike" > I have a bike<br>
				<input type="checkbox" name="vehicle" value="Car" > I have a car<br>
				<input type="submit" value="Submit">
				</form> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12"> 
			<div class="col-lg-3"><a class="btn btn-primary" data-toggle="modal" data-target="#editCategory">Edit</a></div>
              <div class="deleteButton"> 
                <ul class="pull-right">
                  <li><button id="delete" class="btn btn-info" data-toggle="modal" onclick="confirmDelete()">Delete</button></li> <!-- Actual login is in footer.php -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Script to confirm the delete button -->
  <script>
  function confirmDelete() {
  if (confirm("Are you sure you want to delete the selected options?")) {
  // Do the deletion with php
  $("input:checkbox[name=type]:checked").each(function()
  {
  // add $(this).val() to your array
  });
  } else {
  // Do nothing
  }
  }
  </script>
  <!-- Modal -->
  <div id="editCategory" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Login</h4>
            <form class="" role="form">
              <div class="form-group">
                <label class="sr-only" for="inputUsername">Category</label>
                <input id="login_username" type="text" class="form-control" id="inputUsername" placeholder="Enter username">
              </div>
              <button id="start_session" type="button" class="btn btn-success">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
  <!-- /.modal -->  
  
  <form enctype="multipart/form-data" action="settings.php" method="POST" class="settings-form" id="settings-form">
    <!-- Modal -->
  <div id="create_button" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-8 login">
            <h4>Create</h4>
            <form class="" role="form">
              <div class="row">
                  <div class="col-lg-12">
                    <select name="category">
                      <optgroup label="Categories">
                        <optgroup label="Pet">
                          <option>Pet Type</option>
                          <option>Pet breed</option>
                          <option>Color</option>
                          <option>Size</option>
                          <option>Training level</option>
                          <option>Energy level</option>
                        </optgroup>
                        <optgroup label="Health">
                          <option>Health Condition</option>
                          <option>Medication</option>
                          <option>Disease</option> 
						  <option>Veterinary</option>
						  <option>Treatment</option> 						  
                        </optgroup> 
						<optgroup label="Other"> 
						<option>Space</option> 
						</optgroup> 
                      </optgroup>
                    </select>
                  </div>
                </div>
			  
              <div class="form-group">
                <label class="sr-only" for="inputPassword">Name</label>
                <input id="new_name" type="text" class="form-control" name = "new_name" placeholder="Enter new name" required >
              </div>
              <input type="submit" value="Create New" class="boton"> 
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> 
  </form>
  <!-- /.modal -->
  <?php include'footer.php';?>