<!DOCTYPE html>
<?php session_start();
//Checking if user is an admin to access this page
if(curPageURL() == 'http://localhost/PetLovers/Project/manage-categories.php'){
  if(!isset($_SESSION['name']) || $_SESSION['usertype'] != 1){
    header('location: index.php');
  }
} else if(curPageURL() == 'http://localhost/PetLovers/Project/edit-user.php'){
  if(!isset($_SESSION['name'])){
    header('location: index.php');
  }
}
?>
<html lang="en">
  <head>
    <title>PetLovers</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/style.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.js"></script>
    <script src="assets/script.js"></script>
    <script src="javascript/loginDetails.js"></script>

    <!-- Owl stylesheet -->
    <link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
    <script src="assets/owl-carousel/owl.carousel.js"></script>
    <!-- Owl stylesheet -->
    <!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
    <!-- slitslider -->
  </head>
  <body>
    <!-- Header Starts -->
    <div class="navbar-wrapper">
      <div class="navbar-inverse" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          </div>
          <!-- Nav Starts -->
          <div class="navbar-collapse  collapse">
            <ul class="nav navbar-nav navbar-right">
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/index.php') { ?> class="active" <?php }; ?>><a href="index.php">Home</a></li>
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/search-pets.php') { ?> class="active" <?php }; ?>><a href="search-pets.php">Find a pet</a></li>
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/search-users.php') { ?> class="active" <?php }; ?>><a href="search-users.php">Find a user</a></li>
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/search-users.php') { ?> class="active" <?php }; ?>><a href="#">Top 10</a></li>
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/contact.php') { ?> class="active" <?php }; ?>><a href="contact.php">Contact an admin</a></li>
              <li <?php if(curPageURL() == 'http://localhost/PetLovers/Project/about.php') { ?> class="active" <?php }; ?>><a href="about.php">About</a></li>
            </ul>
          </div>
          <!-- #Nav Ends -->
        </div>
      </div>
    </div>
    <?php
    function curPageURL() {
      $pageURL = "http://";
      if ($_SERVER["SERVER_PORT"] != "80") {
       $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
      } else {
       $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
      }
      return $pageURL;
    }
    ?>
    <!-- #Header Starts -->
    <div class="container">
      <!-- Header Starts -->
      <div class="header">
        <ul class="pull-right">
          <!-- Public buttons -->
          <?php if(isset($_SESSION['name'])): ?>
            <?php if(isset($_SESSION['name']) && $_SESSION['usertype'] == 1): ?>
              <!-- Admin user buttons -->
              <li><button type="submit" class="btn btn-info" onclick="window.location.href='edit-user.php'">My account</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='search-pets.php'">Pets</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='search-users.php'">Users</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='manage-categories.php'">Categories</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">Forms</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">Blacklist</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">Mails</button></li>
            <?php else: ?>
              <!-- Normal user buttons -->
              <li><button type="submit" class="btn btn-info" onclick="window.location.href='edit-user.php'">My account</button></li>
              <li><button type="submit" class="btn btn-info" onclick="window.location.href='#'">My pets</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='register-pet.php'">Add a pet</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">Adopt a pet</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">My requests</button></li>
              <li><button type="button" class="btn btn-info" onclick="window.location.href='#'">My records</button></li>
            <?php endif ?>
            <!-- Logout button -->
            <li><button id="logout" type="button" class="btn btn-info" onclick="window.location.href='php/logout.php'">Logout</button></li>
          <?php else: ?>
            <!-- Public Buttons -->
            <li><button id="login" class="btn btn-info" data-toggle="modal" data-target="#loginpop">Login</button></li> <!-- Actual login is in footer.php -->
            <li><button id="join" type="button" class="btn btn-info" onclick="window.location.href='register.php'">Join Now</button></li>
          <?php endif ?>
        </ul>
        <!-- #Header Starts -->
      </div>
    </div>