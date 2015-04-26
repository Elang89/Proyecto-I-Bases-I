<?php include'header.php';?>
<!-- banner -->
<script src="javascript/findInputs.js"></script>
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="#">Home</a> / Register</span>
    <h2>Register</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="spacer">
    <div class="row register">
      <div class="col-lg-6">
        <input id="register" type="text" class="form-control" placeholder="Username" name="form_name" maxlength="12">
        <input id="register" type="password" class="form-control" placeholder="Password" name="form_phone" maxlength="16">
        <input id="register" type="password" class="form-control" placeholder="Confirm Password" name="form_phone" maxlength="16">
        <legend>Which type of user would you want to be?</legend>
          <input type="checkbox" name="animal" value="Adopter" style="height: 20px">
          <label>Adopter</label> <br />
          <input type="checkbox" name="animal" value="Rescuer" style="height: 20px">
          <label>Rescuer</label> <br />
      </div>

      <div class="col-lg-6">
        <input id="register" type="text" class="form-control" placeholder="First Name" name="form_name" maxlength="20">
        <input id="register" type="text" class="form-control" placeholder="First Last Name" name="form_name" maxlength="16">
        <input id="register" type="text" class="form-control" placeholder="Second Last Name" name="form_name" maxlength="16">
        <input id="register" type="text" class="form-control" placeholder="Enter Email" name="form_email" maxlength="30">
        <input id="register" type="text" class="form-control" placeholder="Enter Phone Number" name="form_email" maxlength="8">
        
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