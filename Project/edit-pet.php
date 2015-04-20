<?php include'header.php';?>
<!-- banner -->
<script src="javascript/findInputs.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register Pet</span>
    <h2>Register Pet</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6">

        <!-- Tipo de Animal -->
        <select class="form-control">
          <optgroup label="Type">
            <option>All types</option>
            <option>Dog</option>
            <option>Cat</option>
            <option>Bird</option>
            <option>Horse</option>
          </optgroup>
        </select>
        <!-- Tipo de Animal -->
        
        <!-- Raza del animal -->
        <select class="form-control">
          <optgroup label="Raza">
            <option>Raza</option>
          </optgroup>
        </select>
        <!-- Raza del animal -->

        <!-- Color -->
        <select class="form-control">
          <optgroup label="Color">
            <option>All colors</option>
            <option>Black</option>
            <option>Brown</option>
            <option>White</option>
            <option>Other</option>
          </optgroup>
        </select>
        <!-- Color -->

        <!-- Tamaño -->
        <select class="form-control">
          <optgroup label="Size">
            <option>All sizes</option>
            <option>Small</option>
            <option>Medium</option>
            <option>Large</option>
        </select>
        <!-- Tamaño -->

        <!-- Training -->
        <select class="form-control">
          <optgroup label="Training">
            <option>Training</option>
        </select>
        <!-- Training -->
       
        <select class="form-control">
          <option>Animal Condition</option>
        </select>
        <input id="register" type="text" class="form-control" placeholder="Describe the animal's treatments" name="form_name" maxlength="20">
      </div>

      <div class="col-lg-6">
        <input id="register" type="text" class="form-control" placeholder="Animal's Last Known Address" name="form_name" maxlength="30">
        <input id="register" type="text" class="form-control" placeholder="Describe the animal's activity level*" name="form_name" maxlength="8"> 
        <label>Please upload a photo of the pet:</label>
        <input type="file" name="photo" title="Photo"/>

      </div>
    </div>
    <div class="row register">
      <div class="pull-right">
        <button id="Submit_User" type="button" class="btn btn-success" name="Submit">Register</button>
      </div>
    </div>
  </div>
</div>
<?php include'footer.php';?>