<?php
// Show the page header, then the rest of the HTML
include('includes/header.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>reliefinnedd</title>
	<link rel="stylesheet" type="text/css" href="">
  
    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="public/assets/flat-ui/dist/css/vendor/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/zigtimeline.css">

	<link rel="stylesheet" type="text/css" href="public/assets/font-awesome-4.4.0/css/font-awesome.min.css">
    	
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="public/assets/flat-ui/dist/js/vendor/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="public/assets/flat-ui/dist/js/vendor/video.js"></script>
    <script src="public/assets/flat-ui/dist/js/flat-ui.min.js"></script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <h2 class="text-center">reliefinneed</h2>
      <h3 class="text-center">Documentation</h3>
      <p class="text-center">
        This is reliefinneed  web application. It gives you information about the various environmental factors of any city.Please read the below steps on how to use this app.
      </p>
      <ul class="timeline">
        <li class="holder">
          <div class="timeline-image avatar">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/1" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step One</h4>
              <h4 class="subheading">Login</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                User just login with on the following social networking sites instagram/facebook.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li class="timeline-inverted">
          <div class="timeline-image shadow">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/2" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Two</h4>
              <h4 class="subheading">Provide your city name</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                Enter your city name in the navbar to get the various environmental informations such as the air quality details, electric vehicle charging locations and carbon foot print of your city.
              </p>
            </div>
          </div>
          <div class="line"></div>
        </li>
        <li>
          <div class="timeline-image shadow">
            <img class="img-circle img-responsive" src="http://lorempixel.com/250/250/cats/3" alt="">
          </div>
          <div class="timeline-panel">
            <div class="timeline-heading">
              <h4>Step Three</h4>
              <h4 class="subheading">Contact Us</h4>
            </div>
            <div class="timeline-body">
              <p class="text-muted">
                Contact us and tell us if you want to contribute for this web app.
              </p>
            </div>
          </div>
        </li>
        
        
      </ul>
    </div>
  </div>
</div>

</body>
</html>