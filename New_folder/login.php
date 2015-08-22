<?php

/**
 * Log in a user
 */

// Initialisation
require_once('includes/init.php');

// Require the user to NOT be logged in before they can see this page.
Auth::getInstance()->requireGuest();

// Get checked status of the "remember me" checkbox
$remember_me = isset($_POST['remember_me']);

// Process the submitted form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $email = $_POST['email'];

  if (Auth::getInstance()->login($email, $_POST['password'], $remember_me)) {

    // Redirect to home page or intended page, if set
    if (isset($_SESSION['return_to'])) {
      $url = $_SESSION['return_to'];
      unset($_SESSION['return_to']);
    } else {
      $url = '/New_folder/index.php';
    }

    Util::redirect($url);
  }
}


// Set the title, show the page header, then the rest of the HTML
$page_title = 'Login';
include('includes/header.php');

?>


<div class="container">

          <div class="row">
                  <div class="col-md-4">
                    <div class="work wow fadeInDown">
                    <h4 class="form-signin-heading">Login</h4>

                    <?php if (isset($email)): ?>
                      <span class="label label-danger">Invalid login</span>
                    <?php endif; ?>

      <form method="post" class="form-signin">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input id="email" name="email" value="<?php echo isset($email) ? htmlspecialchars($email) : ''; ?>" type="email" autofocus="autofocus" required="required" class="form-control" placeholder="Email address" >
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" required="required" class="form-control" placeholder="Password" >
        <div class="checkbox">
          <label>
            <input id="remember_me" name="remember_me" type="checkbox" value="1"
               <?php if ($remember_me): ?>checked="checked"<?php endif; ?>/> remember me
          </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" >Login</button>
        <a href="/New_folder/forgot_password.php">I forgot my password</a>
      </form>
           </div>
         </div>
      </div>
    </div>     
  
<?php include('includes/footer.php'); ?>
