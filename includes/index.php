<?php
if (!empty($_GET['location'])){
  /**
   * Here we build the url we'll be using to access the google maps api
   */
  $maps_url = 'https://'.
  'maps.googleapis.com/'.
  'maps/api/geocode/json'.
  '?address=' . urlencode($_GET['location']);
  $maps_json = file_get_contents($maps_url);
  $maps_array = json_decode($maps_json, true);
  $lat = $maps_array['results'][0]['geometry']['location']['lat'];
  $lng = $maps_array['results'][0]['geometry']['location']['lng'];
  /**
   * Time to make our Instagram api request. We'll build the url using the
   * coordinate values returned by the google maps api
   */
  $instagram_url = 'https://'.
    'api.instagram.com/v1/media/search' .
    '?lat=' . $lat .
    '&lng=' . $lng .
    '&client_id=aad6c6637c324c5eb1f754436570ad46'; //replace "CLIENT-ID"
  $instagram_json = file_get_contents($instagram_url);
  $instagram_array = json_decode($instagram_json, true);
    /**
   * Time to make our Breezometer api request. We'll build the url using the
   * coordinate values returned by the google maps api
   */

    $breezometer_url = 'http://'.
    'api-beta.breezometer.com/baqi/' .
    '?lat=' . $lat .
    '&lon=' . $lng .
    '&key=4988426417d741498df0c590a1d976c4';
  
  $breezometer_json = file_get_contents($breezometer_url);
  $breezometer_array = json_decode($breezometer_json, true);
}
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>reliefinneed</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Droid+Sans">
        <link href="http://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="../public/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../public/assets/flat-ui/dist/css/flat-ui.min.css">
        <link rel="stylesheet" href="../public/assets/font-awesome-4.4.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../public/assets/css/animate.css">
        <link rel="stylesheet" href="../public/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="../public/assets/flexslider/flexslider.css">
        <link rel="stylesheet" href="../public/assets/css/form-elements.css">
        <link rel="stylesheet" href="../public/assets/css/style.css">
        <link rel="stylesheet" href="../public/assets/css/media-queries.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="#" href="#">
        <link rel="#" sizes="144x144" href="#">
        <link rel="#" sizes="114x114" href="#">
        <link rel="#" sizes="72x72" href="#">
        <link rel="#" href="#">

    </head>

    <body>
    <script>

    // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }


  window.fbAsyncInit = function() {
    FB.init({
      appId      : '945627935508879',
      xfbml      : true,
      version    : 'v2.4'
    });
    // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
    FB.logout(function(response) {
        // Person is now logged out
    });
</script>    
        <!-- Top menu -->
		<nav class="navbar" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">reliefinneed </a>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="top-navbar-1">
					<ul class="nav navbar-nav navbar-right">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="Intro.php">Documentation </a>
						</li>

						<li>
							<form class="navbar-form navbar-right" action="index.php" method="get" role="search">
							  <div class="form-group">
							   <div class="input-group">
							    <input class="form-control" id="navbarInput-01" type="text" name="location" placeholder="Search">
									<span class="input-group-btn">
									<button type="submit" class="btn"><span class="fui-search"></span> Search</button>
									</span>
							   </div>
							 </div>
							</form>
						</li>	
						<li>
							<a href="#">Contact</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>

        <!-- Page Title -->
        <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <!-- <i class="fa fa-user"></i> -->
                        <!-- <h1>About Us </h1> -->
						<?php
						if(!empty($breezometer_array)){
						$country = $breezometer_array['country_name'];
						echo '<h1>'.$country.'</h1><br>';
					    }
						?>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us Text -->
        <div class="about-us-container">
        	<div class="container">
	            <div class="row">
	                <div class="col-sm-12 about-us-text wow fadeInLeft">
	                    <h3>Tested air quality</h3>
	                    <p><i class="fa fa-quote-left "></i>
							<?php 
							if(!empty($breezometer_array)){ 
							$breezo_description = $breezometer_array['breezometer_description'];  
							echo $breezo_description;
							}
							?>
	                    <i class="fa fa-quote-right "></i>
	                    </p>

	                    <h3 class="text-right">Overall Country air quality</h3>
	                    <p class="text-right"><i class="fa fa-quote-left "></i>
							<?php
                             if(!empty($breezometer_array)){
							 $count_description = $breezometer_array['country_description']; 
							 echo $count_description;
                             }
						    ?><i class="fa fa-quote-right  "></i>
	                    </p>
                      <hr class="hrNews">   
                      <h2>Precations </h2>
                      <hr class="hrNews">
                      
                      <h3>For children </h3>
                      <p><i class="fa fa-smile-o"></i>
                <?php
                             if(!empty($breezometer_array)){
                              $data = $breezometer_array['random_recommendations']['children']; 
                              echo " ".$data;
                             }
                ?>
                      </p>
                      <h3>While playing sports </h3>
                      <p><i class="fa fa-futbol-o"></i>
                <?php
                             if(!empty($breezometer_array)){
                              $data = $breezometer_array['random_recommendations']['sport']; 
                              echo " ".$data;
                             }
                ?>
                      </p>
            <div class="container">
              <div class="row">
                  <div class="col-sm-4 about-us-text wow fadeInLeft">

	                    <p>
	                    	<?php
                               function processURL($url)
    {
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => 2
        ));
 
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
 
    $tag = 'airpollution';
    $client_id = "aad6c6637c324c5eb1f754436570ad46";
    $url = 'https://api.instagram.com/v1/tags/'.$tag.'/media/recent?client_id='.$client_id.'&callback=?&count=1';
      
    $all_result  = processURL($url);
    $decoded_results = json_decode($all_result, true);
 
    // echo '<pre>';
    // print_r($decoded_results);
    // exit;
 
    //Now parse through the $results array to display your results... 
    foreach($decoded_results['data'] as $item){
        $image_link = $item['images']['standard_resolution']['url'];
        echo '<img src="'.$image_link.'" height="400px" width="450px" />';
    }
	                    	?>
	                    </p>
                        </div>
                        <div class="col-sm-8 about-us-text wow fadeInLeft">
                                              <h3 class="text-right">For Health </h3>
                                              <p class="text-right"><i class="fa fa-heartbeat"></i>
                <?php
                             if(!empty($breezometer_array)){
                              $data = $breezometer_array['random_recommendations']['health']; 
                              echo " ".$data;
                             }
                ?>
                      </p>
                          <h3 class="text-right">While at home </h3>
                          <p class="text-right"><i class="fa fa-hand-o-right"></i>
                <?php
                             if(!empty($breezometer_array)){
                              $data = $breezometer_array['random_recommendations']['inside']; 
                              echo " ".$data;
                             }
                ?>
                      </p>
                            <h3 class="text-right">While going out </h3>
                          <p class="text-right"><i class="fa fa-hand-o-right"></i>
                <?php
                             if(!empty($breezometer_array)){
                              $data = $breezometer_array['random_recommendations']['outside']; 
                              echo " ".$data;
                             }
                ?>
                      </p>
                        </div>
                      </div>
                    </div>
                      <hr class="hrNews">
                      <h3>Dominant Pollutant and it's effects </h3>
                      <hr class="hrNews">
                      <h3>Pollutant </h3>
                        <p><i class="fa fa-hand-o-right"></i>
                            <?php
                            if(!empty($breezometer_array))
                                 {
                                  $data = $breezometer_array['dominant_pollutant_canonical_name']; 
                                  echo " ".$data;
                                 }
                            ?>
                        </p>                      

                        <h3><?php echo $data.' Description';?></h3>
                        <p><i class="fa fa-hand-o-right"></i>
                            <?php
                               if(!empty($breezometer_array))
                                {
                                 $data = $breezometer_array['dominant_pollutant_description']; 
                                 echo " ".$data;
                                }
                            ?>
                        </p>                      

                        <h3>At moment </h3>
                        <p><i class="fa fa-hand-o-right"></i>
                            <?php
                               if(!empty($breezometer_array))
                                {
                                 $data = $breezometer_array['dominant_pollutant_text']['main']; 
                                  echo " ".$data;
                                 $data = $breezometer_array['dominant_pollutant_canonical_name'];
                                }
                            ?>
                        </p>                      

                        <h3><?php echo $data."'s effects";?> </h3>
                        <p><i class="fa fa-hand-o-right"></i>
                            <?php
                            if(!empty($breezometer_array))
                               {
                                $data = $breezometer_array['dominant_pollutant_text']['effects']; 
                                echo " ".$data;
                               } 
                            ?>
                        </p>                        

                        <h3>Causes </h3>
                        <p><i class="fa fa-hand-o-right"></i>
                            <?php
                            if(!empty($breezometer_array))
                               {
                                $data = $breezometer_array['dominant_pollutant_text']['causes']; 
                                echo " ".$data;
                               }
                            ?>
                        </p>
	                </div>
	            </div>
	        </div>
        </div>
                <div class="page-title-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 wow fadeIn">
                        <i class="fa fa-user"></i>
                        <h1><?php echo "Photos of ".$_GET['location'];?> </h1>
                        
                    </div>
                </div>
            </div>
        </div>

        <!-- Meet Our Team -->
        <div class="team-container">
        	<div class="container">
	            <div class="row">
		            <div class="col-sm-12  wow fadeIn">
		                <!-- <h4>Vigyan Jyoti Private ITI Members</h4> -->
		            </div>
	            </div>
	            <div class="row">	            	
	            	  
	                	                <div class="col-md-12 center">
		                <div class="team-box wow fadeInDown">

							<br/>
							<?php
							if(!empty($instagram_array)){
							foreach($instagram_array['data'] as $key=>$image){
							echo '<img src="'.$image['images']['standard_resolution']['url'].'" alt=""/><br/>';
							}
							}
							?>
		                    <!-- <img src="assets/img/team/4.jpg" alt="" data-at2x="assets/img/team/4.jpg"> -->
		                    <!-- <h3>Er. Shashank Singh Rajput</h3> -->
		                    <!-- <h3>Deputy Director</h3> -->
<!-- 		                    <p>About Deputy Director</p>
		                    <p><i class="fa fa-mobile"></i> +91-8871718551</p>
		                    <div class="team-social">		                        
		                        <a href="#"><i class="fa fa-facebook"></i></a>
		                        <a href="#"><i class="fa fa-twitter"></i></a>
		                        <a href="#"><i class="fa fa-linkedin"></i></a>
		                        <a href="#"><i class="fa fa-envelope"></i></a>
		                    </div> -->
		                </div>
	                </div>
	            </div>
	        </div>
        </div>
        <!-- Testimonials -->
        <div class="testimonials-container">
	        <div class="container">
	        	<div class="row">
		            <div class="col-sm-12 testimonials-title wow fadeIn">
		                <!-- <h2>Testimonials</h2> -->
		            </div>
	            </div>
	            <div class="row">
	                <div class="col-sm-10 col-sm-offset-1 testimonial-list">
	                	<div role="tabpanel">
	                		<!-- Tab panes -->
	                		<div class="tab-content">
	                			<div role="tabpanel" class="tab-pane fade in active" id="tab1">
	                				<div class="testimonial-image">
	                					<!-- <img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg"> -->
	                				</div>
	                				<div class="testimonial-text">
		                                <!-- <p>
		                                 some lines about simpleweb
		                                </p> -->
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab2">
	                				<div class="testimonial-image">
	                					<!-- <img src="assets/img/testimonials/2.jpg" alt="" data-at2x="assets/img/testimonials/2.jpg"> -->
	                				</div>
	                				<div class="testimonial-text">
		                                <!-- <p>
		                                some lines about simple web
		                                </p> -->
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab3">
	                				<div class="testimonial-image">
	                					<!-- <img src="assets/img/testimonials/3.jpg" alt="" data-at2x="assets/img/testimonials/3.jpg"> -->
	                				</div>
	                				<div class="testimonial-text">
		                                <!-- <p>some lines about simple web</p> -->
	                                </div>
	                			</div>
	                			<div role="tabpanel" class="tab-pane fade" id="tab4">
	                				<div class="testimonial-image">
	                					<!-- <img src="assets/img/testimonials/1.jpg" alt="" data-at2x="assets/img/testimonials/1.jpg"> -->
	                				</div>
	                				<div class="testimonial-text">
		                                <!-- <p>some lines about simple web</p> -->
	                                </div>
	                			</div>
	                		</div>
	                		<!-- Nav tabs -->
<!-- 	                		<ul class="nav nav-tabs" role="tablist">
	                			<li role="presentation" class="active">
	                				<a href="#tab1" aria-controls="tab1" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab"></a>
	                			</li>
	                			<li role="presentation">
	                				<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab"></a>
	                			</li>
	                		</ul> -->
	                	</div>
	                </div>
	            </div>
	        </div>
        </div>

       

    <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 footer-box wow fadeInUp">
                        <h4>About Us</h4>
                        <div class="footer-box-text">
	                        <p><i class="fa fa-quote-left  fa-pull-left"></i>
	                        	To rise exponentially from a local body to a worldwide education.
	                           <i class="fa fa-quote-right  fa-pull-right"></i>
	                        </p>
	                        <p><a href="about.html">Read more...</a></p>
                        </div>
                    </div>
                    <div class="col-sm-4 footer-box wow fadeInDown">
                        <h4>Email Updates</h4>
                        <div class="footer-box-text footer-box-text-subscribe">
                        	<p>Enter your email and you'll be one of the first to get new updates:</p>
                        	<form role="form" action="assets/subscribe.php" method="post">
		                    	<div class="form-group">
		                    		<label class="sr-only" for="subscribe-email">Email address</label>
		                        	<input type="text" name="email" placeholder="Email..." class="subscribe-email" id="subscribe-email">
		                        </div>
		                        <button type="submit" class="btn">Subscribe</button>
		                    </form>
		                    <p class="success-message"></p>
		                    <p class="error-message"></p>
                        </div>
                    </div>

                    <div class="col-sm-4 footer-box wow fadeInDown">
                        <h4>Contact Us</h4>
                        <div class="footer-box-text footer-box-text-contact">
	                        <p><i class="fa fa-map-marker"></i> Address:</p>
	                        <p><i class="fa fa-phone"></i> Phone: +91-8871718551</p>
	                        <p><i class="fa fa-envelope"></i> Email: shashankrjpt@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                	<div class="col-sm-12 wow fadeIn">
                		<div class="footer-border"></div>
                	</div>
                </div>
                <div class="row">
                    <div class="col-sm-7 footer-copyright wow fadeIn">
                        <p>Copyright 2015 Vigyan Jyoti Private ITI - All rights reserved. Website by <a href="http://www.navneetsharma.in" target="_blank">Navneet Sharama</a>.</p>
                    </div>
                    <div class="col-sm-5 footer-social wow fadeIn">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-google-plus"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
        </footer>

        <!-- Javascript -->
        <script src="../public/assets/js/jquery-1.11.1.min.js"></script>
        <script src="../public/assets/bootstrap/js/bootstrap.min.js"></script>

        <script src="../public/assets/js/bootstrap-hover-dropdown.min.js"></script>
        <script src="../public/assets/js/jquery.backstretch.min.js"></script>
        <script src="../public/assets/js/wow.min.js"></script>
        <script src="../public/assets/js/retina-1.1.0.min.js"></script>
        <script src="../public/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="../public/assets/flexslider/jquery.flexslider-min.js"></script>
        <script src="../public/assets/js/jflickrfeed.min.js"></script>
        <script src="../public/assets/js/masonry.pkgd.min.js"></script>
        <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        <script src="../public/assets/js/jquery.ui.map.min.js"></script>
        <script src="../public/assets/js/scripts.js"></script>

    </body>

</html>        