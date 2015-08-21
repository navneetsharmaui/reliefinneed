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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>reliefinneed</title>
    
    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/dist/css/vendor/bootstrap.min.css">
  
    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/dist/css/flat-ui.min.css">
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/dist/css/timeline.css">
    <link rel="stylesheet" type="text/css" href="bower_components/flat-ui/font-awesome-4.4.0/css/font-awesome.min.css">

    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="bower_components/flat-ui/dist/js/vendor/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bower_components/flat-ui/dist/js/vendor/video.js"></script>
    <script src="bower_components/flat-ui/dist/js/flat-ui.min.js"></script>


  </head>
  <body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
          <span class="sr-only">Toggle navigation</span>
       </button>
       <a class="navbar-brand" href="#"><img src="#" alt="Brand"> Mess Menu</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav navbar-right">
        <li class="#"><a href="#fakelink">Profile</a></li>
        <li><a href="#fakelink">Features</a></li>
        <li><fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button></li>
      </ul>
    <form class="navbar-form navbar-right" action="index.php" method="get" role="search">
      <div class="form-group">
        <div class="input-group">
          <input class="form-control" id="navbarInput-01" type="text" name="location" placeholder="Search">
            <span class="input-group-btn">
              <button type="submit" class="btn"><span class="fui-search"></span></button>
            </span>
         </div>
        </div>
      </form>

    </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->
  <script>

    
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
        if (response.status === 'connected') {
    
      testAPI();
    } else if (response.status === 'not_authorized') {
    
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
    
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }, { scope: 'email,user_birthday,user_location,user_hometown' };


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


  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });

    FB.logout(function(response) {
        // Person is now logged out
    });
</script>






    <br/>
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
  </body>
</html>