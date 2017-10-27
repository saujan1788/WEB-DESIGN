<?php 
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();

//Share session_start on all pages
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style_form.css">
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
    <section class="panel section-1">
        <div id="main-nav">
            <nav id="menu" role="navigation">
                <div class="brand">GC Clinic</div>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="fee.php">Consultation Fees</a></li>
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
                <span class="main-logo"></span>
                <div class="nav-button">
                <?php require 'php-modules/buttons.php'; ?>
                </div>
            </div>
        </div>


    <div class="heading">
        <h1>SCHEDULE APPOINTMENT</h1>
        <hr>
    </div>



	<div id="container-contact">
		<h1 class="contact-h1">Enter Details </h1>
		<div class="underline">
		</div>
		
<?php

if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && @$_SESSION['active'] == 1)  )
{			
	if(isset($_POST['SUBMIT']))
	{
		$errors = array(); // for recording the errors

		/*if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && $_SESSION['active'] == 1){
			$errors[] = 'Please Register, or if you are already a member. Please Login';
		} */
			
			if(empty($_POST['name'])) {
				$errors[] = 'You forgot to enter Name.';
			}

			else {
				$name = strip_tags($_POST['name']);
			}
			
			if(empty($_POST['number'])) {
				$errors[] = 'You forgot to enter Number.';
			}

			else {
				$number = strip_tags($_POST['number']);
			}
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$email = strip_tags($_POST['email']);
			}

			else {
				$errors = 'You Entered Invalid email.';
			}
			
						
			if(empty($_POST['date'])) {
				$errors[] = 'You forgot to enter Appointment Date.';
			}

			else {
				$date = strip_tags($_POST['date']);
			}
			
			if(empty($_POST['time'])) {
				$errors[] = 'You forgot to select Appointment time.';
			}

			else {
				$time = strip_tags($_POST['time']);
			}
						
			
			// insert data
					
			if(empty($errors)) {
				$query = "INSERT INTO appointments(name, contactNum, email, date, time) VALUES('$name', '$number', '$email', '$date', '$time')";
				$result = @mysqli_query($mysqli, $query); // run query
				
				if($result) { // if the query ran successfully
					echo "<h3 style=\"text-align: center; color:green;\">Appointment is Scheduled.</h3>";
					}
				else {
					echo 'Error!<br>'.mysqli_error($mysqli);
					}				
			}
			
			else {
				echo "<p style=\"text-align: center; color:red;\">The following error(s) occurred:<p>";

				foreach ($errors as $value) {
				  echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* $value <p>";
				}
			}

			mysqli_close($mysqli); // close the database connection

}
}

else{	
		echo "<P style=\"text-align: center; color: red;\">* Please Login/ Sign-up first to book an appointment !</p>";
}

?>

		<div id="app_form">


			<form name="form" id="form" action="#" method="POST">

				<div id="form1">



					<p>Information About Patient:</p>

					<div>
						<li>
							<input type="text" name="name" placeholder="Full Name" required/>
						</li>
					</div>

					<div>
						<li>
							<input type="text" name="number" placeholder="Contact number" required/>
						</li>
					</div>

					<div>
						<li>
							<input type="email" name="email" placeholder="Email Address" required/>
						</li>
					</div>





				</div>

				<div id="form2">


					<p>Date and Time:</p>

					<div>
						<li>
							<input type="text" name="date" placeholder="Date (DD/MM/YYYY)" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required/> 
						</li>
					</div>

					<div>
						<li>
						
							<select name="time" required>
								<option disabled hidden selected>Time</option>
								<option value="09:00 - 13:00">09:00 - 13:00</option>
								<option value="14:00 - 17:00">14:00 - 17:00</option>
							</select>
						</li>
					</div>

					<div class="submit">
						<input type="submit" name="SUBMIT" value="SUBMIT" id="app_button" />
					</div>


				</div>

			</form>





		</div>
	</div>

    <?php require 'php-modules/modal.php' ?>

    

    <?php require 'php-modules/footer.php' ?>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/main-js.js"></script>

</body>


</html>
