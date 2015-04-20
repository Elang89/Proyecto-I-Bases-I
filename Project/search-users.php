<?php include'header.php';?>
<!-- banner -->
<div class="inside-banner">
  <div class="container">
    <span class="pull-right"><a href="index.php">Home</a> / Search for an user</span>
    <h2>Search for an user</h2>
  </div>
</div>
<!-- banner -->
<div class="container">
  <div class="properties-listing spacer">
    <div class="row">
      <div class="col-lg-3 col-sm-4 ">
        <div class="search-form">
          <h4><span class="glyphicon glyphicon-search"></span>Search for an user</h4>
          <div class="row">
            <div class="col-lg-5">
              <h4>Search by</h4>
            </div>
            <div class="col-lg-7">
              <select class="form-control">
                <option>All</option>
                <option>Username</option>
                <option>First name</option>
                <option>First lastname</option>
                <option>Second lastname</option>
              </select>
            </div>
          </div>
          <div class="row">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button class="btn btn-primary">Find Now</button>
        </div>
        <div class="hot-properties hidden-xs">
          <h4>Waiting for you</h4>
          <!-- Basic container for animals in adoption in the user search page -->
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
              <h5><a href="user-detail.php">Ruffo</a></h5>
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
              <option>Sort by</option>
              <option>Alphabetical order</option>
              <option>Reverse alphabetical order</option>
              <option>Rating: Highest to lowest</option>
              <option>Rating: Lowest to highest</option>
            </select>
          </div>
        </div>
        <div class="row">
          <!-- Basic container for showing users in the user search page -->
          <!--
          <div class="col-lg-4 col-sm-6">
            <div class="properties">
              <div class="image-holder"><img src="images/users/<?php echo $picture_id; ?>" class="img-responsive" alt="properties"></div>
              <h4><a href="user-detail.php?user=<?php echo $user_id; ?>"><?php echo $user_username; ?></a></h4>
              <p class="text"><?php echo $user_full_name; ?></p>
              <a class="btn btn-primary" href="user-detail.php?user=<?php echo $user_id; ?>">View Details</a>
            </div>
          </div>
          -->
          <!-- properties -->
          <div class="col-lg-4 col-sm-6">
            <div class="properties">
              <div class="image-holder"><img src="images/properties/POODLE.jpg" class="img-responsive" alt="properties">
              </div>
              <h4><a href="user-detail.php">Size: large</a></h4>
              <p class="text">Breed: Poodle</p>
              <a class="btn btn-primary" href="user-detail.php">View Details</a>
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