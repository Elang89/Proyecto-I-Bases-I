<!-- This is a php to manage all the administrative categories needed when a user wants to register a pet --> 

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
                  </div>
                </div> 
                <div class="row">
                  <div class="col-lg-12">
                    <select id = "consultFacts"  name = "consultFacts" onchange = "update();"> 
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
              <div class="category-list" id = "categoryList"> 
			  <div class="col-" class="text">Type Options</div>
                <form  id = "Options"> 
				 <?php
				$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
				if (!$conn) {
					$e = oci_error();
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				} 
							$query= 'select * from pettype order by PET_TYPE_CODE';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 
							

								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['PET_TYPE_NAME']}</label><input  type = 'radio'  name = 'radio' id = '{$row['PET_TYPE_CODE']}'  value = '{$row['PET_TYPE_NAME']}'/><br /> "  ; 		 
								} 				 
							
				 ?>  
				</form> 
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-sm-12"> 
			<div class="col-lg-3"><a class="btn btn-primary" data-toggle="modal" data-target="#editCategory">EDIT</a></div>
              <div class="deleteButton"> 
                <ul class="pull-right">  
				<button class="btn btn-primary" type= "button" data-toggle="modal"  data-target="#create_button">NEW!</button>
                  <li><button id="delete" class="btn btn-info" data-toggle="modal" data-target="#deleteButton">Delete</button></li> <!-- Actual login is in footer.php -->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> 
  
    <!--Function to update info--> 
   <script type="text/javascript"> 
	/*function update(){  
			var Id = document.getElementById("consultFacts");
            var selectedOption = Id.options[Id.selectedIndex].value; 
		    alert(selectedOption);   											
	} */
	
	function update()
	{ 
		var xmlhttp;
		var Id = document.getElementById("consultFacts");
        var selectedOption = Id.options[Id.selectedIndex].value;  
		
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("categoryList").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","updateOptions.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();
	}

	function checked(){ 
			var length = document.getElementById("consultFacts").length; 
			for(var i = 0;  i < length - 1; i++){
				if(document.getElementById(i).checked){
					var selectedId = i; 
					var slecetedValue = document.getElementById(i).value; 
				}
			} 
			alert(selectedId); 
			alert(slecetedValue)
	}
  </script>   
  <!--Function to update info--> 
  
  <!-- Modal  To Delete--> 
   <form enctype="multipart/form-data" action="Delete.php" method="POST" class="settings-form" id="settings-form">
  <div id="deleteButton" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Are you sure you want to delete ?</h4>
            <form class="" role="form">
              <div class="form-group">
              </div>
			  <input type="submit" value="Sure" class="boton">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </form>
  <!-- /.modal To Delete -->  
    

  <!-- Modal --> 
   <form enctype="multipart/form-data" action="Edit.php" method="POST" class="settings-form" id="settings-form">
  <div id="editCategory" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Edit</h4>
            <form class="" role="form">
              <div class="form-group">
                <label class="sr-only" for="inputUsername">Category</label>
                <input type="text" class="form-control" id="inputNewName" placeholder="Enter new name">
              </div>
			  <input type="submit" value="Edit Name" class="boton">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </form>
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