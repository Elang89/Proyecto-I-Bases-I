<!-- This is a php to manage all the return reasons a user can choose from --> 

<?php include'header.php';?> 

<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Manage Return Reasons</span>
    <h2>Manage Return Reasons</h2>
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
                  </div>
                  <div class="col-lg-4"> 
                  </div>
                </div> 
                <div class="row">
                  <div class="col-lg-12">
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
				 <div class="col-" class="text"> Reason Options </div>
				 <?php
				$conn = oci_connect('DBadmin', 'dbadmin', 'PETLOVERSDB');
				if (!$conn) {
					$e = oci_error();
					trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
				} 
							$query= 'SELECT * FROM REASONRETURNED';
							$stmt = oci_parse($conn, $query);
							oci_execute($stmt); 

								while($row=oci_fetch_assoc($stmt)) { 				
									 echo "<label>{$row['REASON']}</label><input  type = 'radio'  name = 'radio' id = '{$row['REASON_CODE']}'  value = '{$row['REASON']}'/><br /> "  ; 		 
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
	function delete_Question(){   
	    /*Function to delete  to the option selected 
          calls delete.php and sends the id of the selectedID*/
			for(var i = 0;  i < 1000 ; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			}  
		window.location.href = "http://localhost/Proyecto-I-Bases-I/Project/deleteReason.php?selectedId=" + selectedId ;
	} 
	
		function edit(){   
			var newName = document.getElementById("inputNewName").value; 
			for(var i = 0;  i < 1000; i++){ 
				if(document.getElementById(i) != null){
					if(document.getElementById(i).checked){           
						var selectedId = i; 
						var selectedValue = document.getElementById(i).value; 
					} 
				}
			}  
		window.location.href = "http://localhost/Proyecto-I-Bases-I/Project/editReason.php?selectedId=" + selectedId +  "&newName=" + newName;
	}  
		
  </script>   

  
  <!-- Modal  To Delete--> 
   <form enctype="multipart/form-data" action="javascript:delete_Question();" method="POST" class="delete-form" id="delete-form">
  <div id="deleteButton" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content" id = "deleteResult">
        <div class="row">
          <div class="col-sm-6 login">
            <h4>Are you sure you want to delete this return reason?</h4>
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
                <input id="inputNewName" type="text" class="form-control"  name = "inputNewName" placeholder= "Enter the reason" required> 
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
  <form enctype="multipart/form-data" action="newReason.php" method="POST" class="settings-form" id="settings-form">
  <div id="create_button" class="modal fade">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="row">
          <div class="col-sm-8 login" id = "AllNew">
            <h4>Create</h4>
            <form class="" role="form">
              <div class="row">
                </div>
              <div class="form-group">  
                <label class="sr-only" for="inputPassword">Name</label>
                <input id="new_question" type="text" class="form-control" name = "new_question" placeholder="Enter new reason" required >
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