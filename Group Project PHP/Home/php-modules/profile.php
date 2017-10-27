<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in first";
  header("location: error.php");    
}
else {
    $name = $_SESSION['name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Welcome <?= $name ?></title>
  <?php include './css/css.html'; ?>
</head>

<body>
  <div class="form">

    <h1>Welcome</h1>
          
          <p>
          <?php 
     
          // Display message about account verification link only once
          if( isset($_SESSION['message']) ){
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
              unset($_SESSION);
          }
          
          ?>
          </p>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
          if (!$active ){
              echo
              '<div class="info">
              Your Account has been created. Please activate your account to login<br>
              This page will redirect in 5s.
              </div>';
          }
          
          ?>
          
          <h2><?php echo $name; ?></h2>
          <p><?= $email ?></p>
          
<?php header( "refresh:5;url= ../home.php" );?>
    </div>
    
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

</body>
</html>
