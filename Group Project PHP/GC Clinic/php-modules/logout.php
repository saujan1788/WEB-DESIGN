<?php
/* Log out process, unsets and destroys session variables */

session_start();
	@$user_type = $_SESSION['user_type'];
session_unset();
session_destroy(); 
unset($_SESSION);
header('Location: logout_success.php');
?>