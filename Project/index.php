<?php include'header.php';?>

<div class="">
  
  <div id="slider" class="sl-slider-wrapper">
    
    <!-- Slider commented by the momment, looking for a clear use -->
    <div class="sl-slider">
      <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
        <div class="sl-slide-inner">
          <div class="bg-img bg-img-1"></div>
          <h2><a href="#">2 Bed Rooms and 1 Dinning Room Aparment on Sale</a></h2>
          <blockquote>
            <p class="location"><span class="glyphicon glyphicon-map-marker"></span> 1890 Syndey, Australia</p>
            <p>Until he extends the circle of his compassion to all living things, man will not himself find peace.</p>
            <cite>1</cite>
          </blockquote>
        </div>
      </div>
      </div><!-- /sl-slider -->
      </div><!-- /slider-wrapper -->
    </div>
    <div class="container">
      <div class="properties-listing spacer"> <a href="viewPets.php" class="pull-right viewall">View All pets</a>
      <h2>In adoption</h2>
      <div id="owl-example" class="owl-carousel">
        <!-- Basic container for animals in adoption in the index page -->
        <!--
        <div class="properties">
          <div class="image-holder"><img src="images/pets/<?php echo $picture_id; ?>" class="img-responsive" alt="properties"/></div>
          <h4><a href="pet-detail.php"><?php echo $pet_name; ?></a></h4>
          <p class="text">Breed: <?php echo $picture_id; ?></p>
          <a class="btn btn-primary" href="pet-detail.php">View Details</a>
        </div>
        -->
        <div class="properties">
          <div class="image-holder"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
          <h4><a href="pet-detail.php">Royal Inn</a></h4>
          <p class="text">Breed: Chiwawa</p>
          <a class="btn btn-primary" href="pet-detail.php">View Details</a>
        </div>
        
      </div>
    </div>
    <div class="spacer">
      <div class="row">
        <div class="col-lg-6 col-sm-9 recent-view">
          <h3>About Us</h3>
          <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.<br><a href="about.php">Learn More</a></p>
          
        </div>
        <!-- Carousel can be used in my pets view -->
        <!-- <div class="col-lg-5 col-lg-offset-1 col-sm-3 recommended">
          <h3>Recommended Properties</h3>
          <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1" class=""></li>
              <li data-target="#myCarousel" data-slide-to="2" class=""></li>
              <li data-target="#myCarousel" data-slide-to="3" class=""></li>
            </ol>
            Carousel items
            <div class="carousel-inner">
              <div class="item active">
                <div class="row">
                  <div class="col-lg-4"><img src="images/properties/1.jpg" class="img-responsive" alt="properties"/></div>
                  <div class="col-lg-8">
                    <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                    <p class="text">$300,000</p>
                    <a href="property-detail.php" class="more">More Detail</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4"><img src="images/properties/2.jpg" class="img-responsive" alt="properties"/></div>
                  <div class="col-lg-8">
                    <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                    <p class="text">$300,000</p>
                    <a href="property-detail.php" class="more">More Detail</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4"><img src="images/properties/3.jpg" class="img-responsive" alt="properties"/></div>
                  <div class="col-lg-8">
                    <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                    <p class="text">$300,000</p>
                    <a href="property-detail.php" class="more">More Detail</a>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="row">
                  <div class="col-lg-4"><img src="images/properties/4.jpg" class="img-responsive" alt="properties"/></div>
                  <div class="col-lg-8">
                    <h5><a href="property-detail.php">Integer sed porta quam</a></h5>
                    <p class="text">$300,000</p>
                    <a href="property-detail.php" class="more">More Detail</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <?php include'footer.php';?>