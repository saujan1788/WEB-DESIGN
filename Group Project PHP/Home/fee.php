<?php 
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();

//Share session_start on all pages
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Consultation Fees</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <title>Clinic</title>

  
</head>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { //user logging in

        require 'php-modules/login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'php-modules/register.php';
        
    }
}
?>

<body>
        <div id="main-nav">
            <nav id="menu" role="navigation">
                <div class="brand">GC Clinic</div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="#">Consultation Fees</a></li>
                    <li><a href="resource.php">Resources</a></li>
                    <li><a href="appointment.php">Appointments</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>
            </nav>
            <div class="page-wrap">
                <div id="menu-toggle">
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="nav-button button-toggle button-toggle2">
                <?php require 'php-modules/buttons.php'; ?>
                </div>
            </div>
        </div>
            <div class="heading">
        <h1>CONSULTATION FEES</h1>
        <hr>
    </div>
  <div class="demo">
<div class="mainCard">
  <div class="mainCardHeader"></div>
  <div class="mainCardContent">
    <div class="miniCard">
      <h2>Cardiac Care</h2>
      <p class="pricing-p">Services start from price below. But we do provide financing and additional discounts. Please contact us to learn more</p>
      <p class="pricing">€ 350.99</p>
  <a href="appointment.php" class="book">Book Now</a>

    </div>
    <div class="miniCard">
      <h2>Eye Care</h2>
      <p class="pricing-p">Services start from price below. But we do provide financing and additional discounts. Please contact us to learn more</p>
      <p class="pricing">€ 250.99</p>
        <a href="appointment.php" class="book">Book Now</a>

    </div>
    
    <div class="miniCard">
            <h2>Bone Care</h2>
      <p class="pricing-p">Services start from price below. But we do provide financing and additional discounts. Please contact us to learn more</p>
      <p class="pricing">€ 750.99</p>
        <a href="appointment.php" class="book">Book Now</a>
    </div>
    <div class="miniCard">
            <h2>Regular Checkups</h2>
      <p class="pricing-p">Services start from price below. But we do provide financing and additional discounts. Please contact us to learn more</p>
      <p class="pricing">€ 99.99</p>
        <a href="appointment.php" class="book">Book Now</a>
    </div>
</div>
  </div>
</div>
  
</div>
  
    <?php require 'php-modules/modal.php' ?>
    

    <?php require 'php-modules/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/main-js.js"></script>  
</body>
</html>
