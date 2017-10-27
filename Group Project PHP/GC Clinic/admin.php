<?php 
require 'php-modules/db.php';
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  header("location: admin-login.php");    
}
/* Main page with two forms: sign up and log in */


//Share session_start on all pages

?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  
  
      <meta name="viewport" content="initialscale=1.0, width=device-width" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

      <link rel="stylesheet" href="style-admin.css">

  
</head>

<body>
  <div class="overlay"></div>

<div class="header">
  <div class="slider"></div>
  <div class="tab one ripple">Users</div>
  <div class="tab two ripple">Registration</div>
</div>
	<div class="page users">
	

	<div class="logout">
	
	<h1>Admin - GC Clinic</h1>
		<form action="#" method="POST">
			<input type="submit" value="Log Out" name="logout" class="logout-button"/>
		</form>
	</div>

<?php
	if(isset($_POST['logout'])){
		session_start();
session_unset();
session_destroy(); 
header('Location: admin-login.php');

	}
 ?>

	
			<form name="delete_record" id="delete_record" action="#" method="POST">				
			</form>
<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit_login_admin'])) { //user logging in

        require 'php-modules/login_admin.php';
        
    }
    
}
?>
<?php
	require 'php-modules/admin_staff.php';
?>
		

<?php
	require 'php-modules/admin_display.php';
?>
<?php
	require 'php-modules/admin_delete.php';
?>
		
	  </div>
	  
<div class="page reg">
	<div class="logout">
	<h1>Admin - GC Clinic</h1>
		<form action="#" method="POST">
			<input type="submit" value="Log Out" name="logout" class="logout-button"/>
		</form>
	</div>


	<br>
	<br>
  <h1>Staff Registration</h1>
  <br>
	<hr>
	<br>
	<br>


	<br>
								
			<form name="staff_reg" id="staff_reg" action="#" method="POST">		
			
	<li><input type="text" name="name" placeholder="Name" maxlength=100 required/><input type="email" name="email" placeholder="Email Address" required/></li>
	
	<li><input type="text" name="number" placeholder="Contact Number" maxlength=100 required/>
							<select name="designation" required="">
								<option disabled hidden selected>Designation</option>
								<option value="Doctor">Doctor</option>
								<option value="Pharmacist">Pharmacist</option>
							</select>
	</li>
	
	<li>
		<select name="gender" required="">
								<option disabled hidden selected>Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
		<input type="text" name="dob" placeholder="Date Of Birth DD/MM/YYYY" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required/>
	</li>
	<li><input type="password" name="password" placeholder="Password" maxlength=100 required/><input type="text" name="address" placeholder="Address" required/></li>
	<br><br>
	<li><input type="submit" value="Register" name="register" id="form_button"/></li>
	</form>
	

</div>


<iframe class="blank"></iframe>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>

    <script src="js/main-js.js"></script>

</body>
</html>
