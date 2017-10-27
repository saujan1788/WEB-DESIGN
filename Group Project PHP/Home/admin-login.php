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
<body>
<div class="admin-container">

<div id="container-contact">
		<h1 class="contact-h1">Admin Login</h1>
		<div class="underline">
		</div>

		<form action="#" method="post" id="contact_form">
			<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['submit_login_admin'])) { //user logging in

        require 'php-modules/login_admin.php';
        
    }
    
}
?>
			<div class="telephone">

				<input type="email" placeholder="Username" name="email" id="telephone_input" required>

			</div>
			<div class="telephone">

				<input type="password" placeholder="Password" name="password" id="telephone_input" required>

			</div>

			<div class="submit">
				<input type="submit" value="Login" id="form_button" name="submit_login_admin"/>

			</div>

		</form>

	</div>
</div>
</body>

</html>
