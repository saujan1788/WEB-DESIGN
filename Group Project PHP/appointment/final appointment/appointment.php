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

        require 'login.php';
        
    }
    
    elseif (isset($_POST['register'])) { //user registering
        
        require 'register.php';
        
    }
}
?>
<body>
    <section class="panel section-1">
        <div id="main-nav">
            <nav id="menu" role="navigation">
                <div class="brand">&Aopf;</div>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Consultation Fees</a></li>
                    <li><a href="#">Resources</a></li>
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


	<div class="contact">
		<h1> Schedule Appointment</h1>
		<hr>


	</div>


	<div id="container-contact">
		<h1 class="contact-h1">Enter Details </h1>
		<div class="underline">
		</div>
		
<?php

	if(isset($_POST['SUBMIT']))
	{
		$errors = array(); // for recording the errors
			
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
				require('database_connect.php'); // open database connection
				$query = "INSERT INTO appointments(name, contactNum, email, date, time) VALUES('$name', '$number', '$email', '$date', '$time')";
				$result = @mysqli_query($db_connection, $query); // run query
				
				if($result) { // if the query ran successfully
					echo "<h3 style=\"text-align: center; color:green;\">Appointment is Scheduled.</h3>";
					}
				else {
					echo 'Error!<br>'.mysqli_error($db_connection);
					}				
			}
			
			else {
				echo "<p style=\"text-align: center; color:red;\">The following error(s) occurred:<p>";

				foreach ($errors as $value) {
				  echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* $value <p>";
				}
			}

			mysqli_close($db_connection); // close the database connection
			
}

?>

		<div id="app_form">


			<form name="form" id="form" action="http://localhost/appointment.php" method="POST">

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
							<input type="text" name="email" placeholder="Email Address" required/>
						</li>
					</div>





				</div>

				<div id="form2">


					<p>Date and Time:</p>

					<div>
						<li>
							<input type="text" name="date" placeholder="Date (DD/MM/YYYY)" required/> 
						</li>
					</div>

					<div>
						<li>
						
							<select name="time" required="">
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

    <div class="modal-overlay">
        <div class="modal">
            <a class="close-modal">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="modal-content">
                <h3>Sign Up</h3>
                <form action="#" method="post" id="contact_form">
                    <div class="telephone">
                        <input type="text" placeholder="Name" name="name" id="name_input" required>
                    </div>
                    <div class="telephone">
                        <input type="email" placeholder="Email" name="email" id="email_input" required>
                    </div>
                    <div class="name">
                        <input type="password" placeholder="password" name="password" id="name_input" required>
                    </div>
                    <div class="email">
                        <input type="text" placeholder="Contact number" name="contact" id="name_input" required>
                    </div>

                    <div class="submit">
                        <input type="submit" value="Register" name="register" id="form_button" />
                    </div>
                </form>
            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>
    <!-- overlay -->






    <div class="login-overlay">
        <div class="modal-login">
            <a class="close-modal">
                <svg viewBox="0 0 20 20">
                    <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
                </svg>
            </a>
            <!-- close modal -->
            <div class="login-modal-content">
                <h3>Login</h3>
                <form action="#" method="post" id="contact_form">
                    <div class="telephone">
                        <input type="text" placeholder="Enter your email" name="email" id="telephone_input" required>
                    </div>
                    <div class="telephone">
                        <input type="password" placeholder="Enter your password" name="password" id="telephone_input" required>
                    </div>

                    <div class="submit">
                        <input type="submit" name="login" value="Login" id="form_button" />
                    </div>
                </form>

            </div>
            <!-- content -->
        </div>
        <!-- modal -->
    </div>
    

	<footer class="footer">



		<div class="main-flex">
			<div class="sub-flex1">
				<ul>
					<li><a href="#" class=""> Shop and Learn<span class="flex-symbol"> |</span></a></li>
					<li><a href="#" class=""> Privacy Policy<span class="flex-symbol"> |</span></a></li>
					<li><a href="#" class="last"> iPhone Care</a></li>
				</ul>
			</div>



			<div class="logmaker">

				<a class="facebookBtn smGlobalBtn" href="#"></a>
				<a class="twitterBtn smGlobalBtn" href="#"></a>
				<a class="googleplusBtn smGlobalBtn" href="#"></a>

			</div>
			<div class="sub-flex2">
				<ul>
					<li><a href="#" class="">Terms of Use<span class="flex-symbol"> |</span></a></li>
					<li><a href="#" class="">Sales and Refunds<span class="flex-symbol"> |</span></a></li>
					<li><a href="#" class="">Site Map</a></li>

				</ul>
			</div>

		</div>



		<div class="footer-bottom">
			<p class="copyright">&copy 2017 SWD-GROUP-PROJECT, DUB-IE. All Rights Reserved.</p>

		</div>

	</footer>



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="main-js.js"></script>

</body>


</html>
