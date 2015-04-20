<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Search for a pet</span>
    <h2>Search for a pet</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form"><h4><span class="glyphicon glyphicon-search"></span>Search for a pet</h4>
        <input type="text" class="form-control" placeholder="Search by Name">
        <div class="row">
          <div class="col-lg-5">
            <select class="form-control">
              <optgroup label="Type">
                <option>All types</option>
                <option>Dog</option>
                <option>Cat</option>
                <option>Bird</option>
                <option>Horse</option>
              </optgroup>
            </select>
          </div>
          <div class="col-lg-7">
            <select class="form-control">
              <optgroup label="Color">
                <option>All colors</option>
                <option>Black</option>
                <option>Brown</option>
                <option>White</option>
                <option>Other</option>
              </optgroup>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <select class="form-control">
              <optgroup label="Size">
                <option>All sizes</option>
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
            </select>
          </div>
        </div>
        <button class="btn btn-primary">Find Now</button>
      </div>
      <div class="hot-properties hidden-xs">
        <h4>Waiting for you</h4>
        <!-- Basic container for animals in adoption in the pet search page -->
        <!-- 
        <div class="row">
          <div class="col-lg-4 col-sm-5"><img src="images/pets/<?php echo $picture_id; ?>" class="img-responsive img-circle" alt="properties"></div>
          <div class="col-lg-8 col-sm-7">
            <h5><a href="pet-detail.php?pet=<?php echo $pet_id; ?>"><?php echo $pet_name; ?></a></h5>
            <p class="text"><?php echo $pet_breed; ?></p>
          </div>
        </div> 
        -->
        <div class="row">
          <div class="col-lg-4 col-sm-5"><img src="images/properties/9.jpg" class="img-responsive img-circle" alt="properties"></div>
          <div class="col-lg-8 col-sm-7">
            <h5><a href="pet-detail.php">Ruffo</a></h5>
            <p class="text">Golden Retriever</p>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-9 col-sm-8">
      <div class="sortby clearfix">
        <div class="pull-left result">Showing: </div>
        <div class="pull-right">
          <select class="form-control">
            <optgroup label="Sort by">
              <option>Recency: Old to New</option>
              <option>Recency: New to Old</option>
              <option>Alphabetical order</option>
              <option>Reverse alphabetical order</option>
            </optgroup>
          </select>
        </div>
      </div>
      <div class="row">
       <!-- Basic container for showing animals in the pet search page -->
       <!--  
       <div class="col-lg-4 col-sm-6">
          <div class="properties">
            <div class="image-holder"><img src="images/pets/<?php echo $picture_id; ?>" class="img-responsive" alt="properties">
              <div class="status <?php echo $pet_status; ?>"><?php echo $pet_status; ?></div>
            </div>
            <h4><a href="pet-detail.php?pet=<?php echo $pet_id; ?>">Size: <?php echo $pet_size; ?></a></h4>
            <p class="text">Breed: <?php echo $pet_breed; ?></p>
            <a class="btn btn-primary" href="pet-detail.php?pet=<?php echo $pet_id; ?>">View Details</a>
          </div>
        </div> 
        -->
        <!-- properties -->
        <div class="col-lg-4 col-sm-6">
          <div class="properties">
            <div class="image-holder"><img src="images/properties/POODLE.jpg" class="img-responsive" alt="properties">
              <div class="status found">Adopted</div>
            </div>
            <h4><a href="pet-detail.php">Size: large</a></h4>
            <p class="text">Breed: Poodle</p>
            <a class="btn btn-primary" href="pet-detail.php">View Details</a>
          </div>
        </div>
        <!-- properties -->
        
        <div class="center">
          <ul class="pagination">
            <li><a href="#">«</a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">»</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include'footer.php';?>