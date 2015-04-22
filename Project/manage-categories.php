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
              <div class="category-list" id = "categoryList"> 
                <form  id = "Options">  
				 <div class="col-" class="text">Type Options</div>
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
  
   <script type="text/javascript">  
    /*Function to update the options to selected according to the option selected 
	  AJAX function that calls settings.php and sends the text of the selected option as text as selectedOption*/
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
			document.getElementById("Options").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","updateOptions.php?selectedOption=" + selectedOption ,true);
		xmlhttp.send();
	}

	
	function checked(){  
			var Id = document.getElementById("consultFacts");
			var selectedOption = Id.options[Id.selectedIndex].value;
			var length = document.getElementById("Options").length; 
			for(var i = 0;  i < length - 1; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			} 
		window.location.href = "http://localhost/project/delete.php?selectedId=" + selectedId + "&selectedOption=" + selectedOption;
	} 
	
		function edit(){  
			var Id = document.getElementById("consultFacts");
			var selectedOption = Id.options[Id.selectedIndex].value;
			var length = document.getElementById("Options").length; 
			var newName = document.getElementById("inputNewName").value; 
			alert(newName); 
			alert(selectedOption);
			for(var i = 0;  i < length - 1; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			}  
			alert(selectedId);
		window.location.href = "http://localhost/project/Edit.php?selectedId=" + selectedId + "&selectedOption=" + selectedOption +  "&newName" + newName;
	}
  </script>   

  
  <!-- Modal  To Delete--> 
   <form enctype="multipart/form-data" action="javascript:checked();" method="POST" class="delete-form" id="delete-form">
  <div id="deleteButton" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content" id = "deleteResult">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Are you sure you want to delete ?</h4>
            <form class="" role="form">
              <div class="form-group">
              </div>
			  <input type="submit" value="Yes, I do !" class="boton">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </form>
  <!-- /.modal To Delete -->  
    
  <!-- Modal  To Edit--> 
   <form enctype="multipart/form-data" action="javascript:edit();" method="POST" class="edit-form" id="edit-form">
  <div id="editCategory" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content" id = "editResult">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Edit</h4>
            <form class="" role="form">
              <div class="form-group">
                <label class="sr-only" for="inputUsername">Category</label>
                <input id="inputNewName" type="text" class="form-control"  name = "inputNewName" placeholder= "Enter new name" required> 
              </div>
			  <input type="submit" value="Edit Name" class="boton">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>  
  </form>
  <!-- /.modal To Edit -->  
  
  
   <!-- Modal to create new options to register --> 
  <form enctype="multipart/form-data" action="settings.php" method="POST" class="settings-form" id="settings-form">
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
 <!-- Modal to create new options to register --> 
  <?php include'footer.php';?>