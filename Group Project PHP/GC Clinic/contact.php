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
				<li><a href="fee.php">Consultation Fees</a></li>
				<li><a href="resource.php">Resources</a></li>
				<li><a href="appointment.php">Appointments</a></li>
				<li><a href="#">Contact Us</a></li>
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
        <h1>CONTACT US</h1>
        <hr>
    </div>

	<div class="contact">
		<div class="main-store">

			<div class="contact-info">

				<p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;GCD, Dublin 8</p>
				<p><span><i class="fa fa-phone" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;01-1234567</p>


			</div>


			<div class="contact-info">



				<p><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;info@example.com</p>
				<p><span><i class="fa fa-clock-o" aria-hidden="true"></i></span>&nbsp;&nbsp;&nbsp;Mon - Fri | 9:00 - 18:00</p>


			</div>


		</div>

	</div>


	<div id="container-contact">
		<h1 class="contact-h1">Send Us a Message </h1>
		<div class="underline">
		</div>
		<?php

	if(isset($_POST['submit']))
	{
		$errors = array(); // for recording the errors
			
			if(empty($_POST['name'])) {
				$errors[] = 'You forgot to enter Name.';
			}

			else {
				$name = strip_tags($_POST['name']);
			}
			
			if(empty($_POST['subject'])) {
				$errors[] = 'You forgot to enter Subject.';
			}

			else {
				$subject = strip_tags($_POST['subject']);
			}
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
				$email = strip_tags($_POST['email']);
			}

			else {
				$errors = 'You Entered Invalid email.';
			}
			
						
			if(empty($_POST['message'])) {
				$errors[] = 'You forgot to enter a Message.';
			}

			else {
				$message = strip_tags($_POST['message']);
			}
						
			
			// insert data
					
			if(empty($errors)) {

				require_once 'php-modules/PHPMailer/PHPMailerAutoload.php';
				//require 'contact_form.php';
				$mail = new PHPMailer;

				//$mail->SMTPDebug = 3;                               // Enable verbose debug output

				$mail->isSMTP();                                      // Set mailer to use SMTP
				$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
				$mail->SMTPAuth = true;                               // Enable SMTP authentication
				$mail->Username = 'dummyphp1@gmail.com';                 // SMTP username
				$mail->Password = 'php123456789';                           // SMTP password
				$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
				$mail->Port = 587;                                    // TCP port to connect to //587

				$mail->setFrom('from@example.com', $name);
				$mail->addAddress('contact@gcclinic.com', 'Admin');     // Add a recipient
				//$mail->addAddress('ellen@example.com');               // Name is optional
				$mail->addReplyTo('info@example.com', 'Information');
				$mail->addCC('nomansanaullah1@gmail.com');
				//$mail->addBCC('bcc@example.com');

				//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
				//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
				$mail->isHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Contact Us - GC Clinic, Dublin';
				$mail->Body    = $message;
				$mail->AltBody = $message;

				if(!$mail->send()) {
				    echo 'Message could not be sent.';
				    echo 'Mailer Error: ' . $mail->ErrorInfo;
				} else {
				    echo "<p style=\"text-align: center; color:green;\">Your Query has been sent<p>";
				}							
			}
			
			else {
				echo "<p style=\"text-align: center; color:red;\">The following error(s) occurred:<p>";

				foreach ($errors as $value) {
				  echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* $value <p>";
				}
			}


}

?>

		<form action="#" method="post" id="contact_form">

			<div class="name">

				<input type="text" placeholder="My name is" name="name" id="name_input" required>
			</div>
			<div class="email">

				<input type="email" placeholder="My e-mail is" name="email" id="email_input" required>
			</div>
			<div class="telephone">

				<input type="text" placeholder="My subject is" name="subject" id="telephone_input" required>

			</div>

			<div class="message">

				<textarea name="message" placeholder="I'd like to talk about" id="message_input" cols="30" rows="5" required></textarea>
			</div>





			<div class="submit">
				<input type="submit" value="Send" id="form_button" name="submit"/>

			</div>



			<div class="rating">

				<span>☆</span>
				<span>☆</span>
				<span>☆</span>
				<span>☆</span>
				<span>☆</span>
			</div>

		</form>

	</div>


    <?php require 'php-modules/modal.php' ?>
    

    <?php require 'php-modules/footer.php' ?>




	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/main-js.js"></script>

</body>

</html>
