<?php
require 'db.php';

//echo name from database onto dropdown button

?>



<?php 

if ((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1 && @$_SESSION['active'] == 1)  ) {
	@$name = $_SESSION['name'];
	@$user_type = $_SESSION['user_type'];

?>

<div class="dropdown">
 	<a class="dropbtn" href="#"><?=$name?><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
	<div class="dropdown-content">
	    <a class="btn-logout" href="php-modules/logout.php"><span class="span-btn-logout">Log Out</span></a>    
		<?php if($user_type == 'staff') {?>
		<a href="staff.php">View All Appointments</a>
		<?php } else { ?>
		<a href="client.php">Your Appointments</a>
		<?php } ?>
  	</div>
</div>


<?php } else{ ?>

<a class="btn-sign" href="#"><span class="span-btn">sign up</span></a>
<a class="btn-login" href="#"><span class="span-btn-login">login</span></a>

<?php } ?>



