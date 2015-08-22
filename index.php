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
  $breezometer_url = 'http://'.
    'api-beta.breezometer.com/baqi/' .
    '?lat=' . $lat .
    '&lon=' . $lng .
    '&key=4988426417d741498df0c590a1d976c4';
  
  $breezometer_json = file_get_contents($breezometer_url);
  $breezometer_array = json_decode($breezometer_json, true);
}
?>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title> reliefinneed </title>

    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/dist/css/vendor/bootstrap.min.css">
  
    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/dist/css/flat-ui.min.css">

    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/font-awesome-4.4.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="bower_components/css/animate.css">
  <link rel="stylesheet" href="bower_components/css/magnific-popup.css">
  <link rel="stylesheet" href="bower_components/flexslider/flexslider.css">
  <link rel="stylesheet" href="bower_components/css/form-elements.css">
  <link rel="stylesheet" href="public/assets/css/style.css">
  <link rel="stylesheet" href="bower_components/css/media-queries.css">
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="bower_components/flat-ui/dist/js/vendor/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/flat-ui/dist/js/vendor/video.js"></script>
    <script src="bower_components/flat-ui/dist/js/flat-ui.min.js"></script>
        <script src="bower_components/js/jquery-1.11.1.min.js"></script> 
        <script src="bower_components/js/jquery.backstretch.min.js"></script>
        <script src="bower_components/js/wow.min.js"></script>
        <script src="bower_components/js/retina-1.1.0.min.js"></script>
        <script src="bower_components/js/jquery.magnific-popup.min.js"></script>
        <script src="bower_components/flexslider/jquery.flexslider-min.js"></script>
        <script src="bower_components/js/jflickrfeed.min.js"></script>
        <script src="bower_components/js/masonry.pkgd.min.js"></script>
        <script src="bower_components/js/jquery.ui.map.min.js"></script>
        <script src="bower_components/js/scripts.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

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
<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
          <span class="sr-only">Toggle navigation</span>
       </button>
       <a class="navbar-brand" href="/New_folder/index.php"><!--<img src="#" alt="Brand"> -->reliefineed</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav navbar-right">
       <?php if (Auth::getInstance()->isLoggedIn()): ?>

          <?php if (Auth::getInstance()->isAdmin()): ?>
           <li class="#"><a href="/New_folder/admin/users">Admin</a></li>
          <?php endif; ?>

            <li><a href="/New_folder/profile.php">Profile</a></li>
            <li><a href="/New_folder/logout.php">Logout</a></li>
            
          <?php else: ?> 

            <li><a href="/New_folder/login.php">Login</a></li>
          
          <?php endif; ?>        
      </ul>
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
    
    </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->


      <div class="slider-2-container">
            <div class="container">
                <div class="row">
                                      <div class="col-sm-8 col-sm-offset-2 slider-2-text wow fadeInUp">
                        <h1><br></h1>
                        <h1><br></h1>
                        <h1><br></h1>
                        <h1><br></h1>
                        <h1><br></h1>
                  <!-- <p>load more lines here.</p> -->
                    </div>
                </div>
            </div>
        </div>


<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>

<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>

    <br/>
    <link rel="stylesheet" href="bower_components/css/style.css">
    <div class="work-container">
        <div class="container">

          <div class="row">
                              <div class="col-sm-4">
                    <div class="work wow fadeInDown">

                        <h4>How to use this app ?</h4>
                         <ul>
                          <li>Just login</li>
                          <li>verify your facebook account</li>
                          <li>Type any foriegn city name in navbar search box.</li>
                          <li>It's simple as that!</li>
                         </ul>

                    </div>
                </div>
           <div class="col-sm-8">
             <div class="work wow fadeInUp">
    <?php
    if(!empty($breezometer_array)){
       $country = $breezometer_array['country_name'];
        echo '<p> Country name = "'.$country.'"</p><br>';
      

      $breezo_description = $breezometer_array['breezometer_description'];  
        echo '<p>Tested air quality = "'.$breezo_description.'"</p><br>';
      

      $count_description = $breezometer_array['country_description']; 
        echo '<p> Overall Country air quality = "'.$count_description.'"</p><br>';
      


      foreach($breezometer_array['random_recommendations'] as $data){
        if ($breezometer_array['random_recommendations']['children'] == $data) {
         echo '<p> children: "'.$data.'"</p>';  
        }
        
        elseif ($breezometer_array['random_recommendations']['sport'] == $data) {
         echo '<p> sport: "'.$data.'"</p>';
        }
        
        elseif ($breezometer_array['random_recommendations']['health'] == $data) {
         echo '<p> health = "'.$data.'"</p>';
        }
        elseif ($breezometer_array['random_recommendations']['inside'] == $data) {
         echo '<p> inside = "'.$data.'"</p>';
        }       
        elseif ($breezometer_array['random_recommendations']['outside'] == $data) {
         echo '<p> outside = "'.$data.'"</p>';
        }
        
      }  
      
      $pollutant_name = $breezometer_array['dominant_pollutant_canonical_name']; 
        echo '<br><p> Dominant pollutant canonical name = "'.$pollutant_name.'"</p><br>';
      
      $pollutant_description = $breezometer_array['dominant_pollutant_description'];
        echo '<p> Dominant pollutant description  = "'.$pollutant_description.'"</p><br>';
      
      foreach($breezometer_array['dominant_pollutant_text'] as $pollutant_text){
        if ($breezometer_array['dominant_pollutant_text']['main'] == $pollutant_text) {
         echo '<p> main = "'.$pollutant_text.'"</p>'; 
        }
        
        elseif ($breezometer_array['dominant_pollutant_text']['effects'] == $pollutant_text) {
         echo '<p> effects = "'.$pollutant_text.'"</p>';
        }
        
        elseif ($breezometer_array['dominant_pollutant_text']['causes'] == $pollutant_text) {
         echo '<p> causes = "'.$pollutant_text.'"</p>';
        }
        
      }
    }
    ?>
                        </div>
                  </div>
              </div>
    

              </div>
             </div>
          </div>

  </body>
</html>