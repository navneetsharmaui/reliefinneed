<!DOCTYPE html>
<html>
<head>
  <title><?php if (isset($page_title)): ?><?php echo $page_title; ?> | <?php endif; ?>Reliefinneed </title>
  <meta charset="utf-8" /> 
<!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="/bower_components/flat-ui/dist/css/vendor/bootstrap.min.css">
  
    <!-- Loading flat-ui-->
    <link rel="stylesheet" type="text/css" href="/bower_components/flat-ui/dist/css/flat-ui.min.css">

    <link rel="stylesheet" type="text/css" href="/bower_components/flat-ui/font-awesome-4.4.0/css/font-awesome.min.css">


  <link rel="stylesheet" href="/bower_components/css/animate.css">
  <link rel="stylesheet" href="/bower_components/css/magnific-popup.css">
  <link rel="stylesheet" href="/bower_components/flexslider/flexslider.css">
  <link rel="stylesheet" href="/bower_components/css/form-elements.css">
  <link rel="stylesheet" href="public/assets/css/style.css">
  <link rel="stylesheet" href="/bower_components/css/media-queries.css">
    <!-- jQuery (necessary for Flat UI's JavaScript plugins) -->
    <script src="/bower_components/flat-ui/dist/js/vendor/jquery.min.js"></script>
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/bower_components/flat-ui/dist/js/vendor/video.js"></script>
    <script src="/bower_components/flat-ui/dist/js/flat-ui.min.js"></script>
        <script src="/bower_components/js/jquery-1.11.1.min.js"></script> 
        <script src="/bower_components/js/jquery.backstretch.min.js"></script>
        <script src="/bower_components/js/wow.min.js"></script>
        <script src="/bower_components/js/retina-1.1.0.min.js"></script>
        <script src="/bower_components/js/jquery.magnific-popup.min.js"></script>
        <script src="/bower_components/flexslider/jquery.flexslider-min.js"></script>
        <script src="/bower_components/js/jflickrfeed.min.js"></script>
        <script src="/bower_components/js/masonry.pkgd.min.js"></script>
        <script src="/bower_components/js/jquery.ui.map.min.js"></script>
        <script src="/bower_components/js/scripts.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

</head>
<body>
  <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
          <span class="sr-only">Toggle navigation</span>
       </button>
       <a class="navbar-brand" href="/New_folder/index.php"><!--<img src="#" alt="Brand"> -->reliefinneed</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar-collapse-01">
      <ul class="nav navbar-nav navbar-right">
          <?php if (Auth::getInstance()->isLoggedIn()): ?>

          <?php if (Auth::getInstance()->isAdmin()): ?>
           <li class="active"><a href="/New_folder/admin/users">Admin</a></li>
          <?php endif; ?>

            <li><a href="/index.php">Try App!</a></li>
            <li><a href="/New_folder/profile.php">Profile</a></li>
            <li><a href="/New_folder/logout.php">Logout</a></li>
            
          <?php else: ?> 

            <li><a href="/New_folder/login.php">Login</a></li>
          
          <?php endif; ?>        

      </ul>
    
    </div><!-- /.navbar-collapse -->
        </nav><!-- /navbar -->

  <div id="content">
