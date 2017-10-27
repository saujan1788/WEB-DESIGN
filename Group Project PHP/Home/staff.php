<?php 
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();
if(!$_SESSION['logged_in']){
	  $_SESSION['message'] = "You must log in first";

   header("location: php-modules/error.php");
   die;
}
//Share session_start on all pages
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="style-admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">


    <title>Clinic</title>
</head>
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









			<form name="update_record" id="update_record" action="#" method="POST">				
			</form>

<?php
		
		
		echo '</br><h2 style="text-align: center;">All Scheduled Appointments.</h2><hr></br>';
		echo "<p style=\"text-align: center; color: red;\">* Click on <i class=\"fa fa-check\" aria-hidden=\"true\"></i> to confirm Appointment.</p>";
					$query = "SELECT * FROM appointments";
					
					$result = @mysqli_query($mysqli, $query); // run query
				
					
						if($result) { // if the query ran successfully
							if(mysqli_num_rows($result)>0){
									
									echo "<table>
										<tr>
											<th>App_ID</th>
											<th>Name</th>
											<th>Phone</th>										
											<th>Email</th>
											<th>Date</th>
											<th>Time</th>
											<th>Confirmation</th>
										</tr>";
									
									while($data = mysqli_fetch_array($result)){
										
											  echo "<tr>";
											  echo "<td>".$data['appNo'] . "</td>";
											  echo "<td>".$data['name'] . "</td>";
											  echo "<td>".$data['contactNum'] . "</td>"; 
											  echo "<td>".$data['email'] . "</td>";
											  echo "<td>".$data['date'] . "</td>"; 
											  echo "<td>".$data['time'] . "</td>";
											  echo "<td>".$data['confirm'] . "</td>";
											  
											  $appNo = $data['appNo'];
																					  
												if($data['confirm'] == "Not Confirmed")
												  {											  
													echo "<td class=\"no_border\"><button id=\"update_app\" type=\"submit\" form=\"update_record\" value=\"$appNo\" name=\"update_app\"><i class=\"fa fa-check\" aria-hidden=\"true\"></i></button></td>";
												  }
											  echo "</tr>";
										}
									
									echo "</table>";
							}
							
							else{
								echo "</br></br>Error..! <br>No appointment scheduled yet.";
							}
						}
					
					else {
							echo 'Error!<br>'.mysqli_error($mysqli);
						}

						
						if(isset($_POST['update_app']))
						{
							$update_app = trim($_POST['update_app']);
									$app_query = "UPDATE appointments set confirm='CONFIRMED' WHERE appNo = $update_app";
									$result = @mysqli_query($mysqli, $app_query); // run query
																
										if($result)
										{
											$num = mysqli_affected_rows($mysqli);
										
											if($num > 0)
												header('location: staff.php');		

										}
										
										else {
										echo 'Error!<br>'.mysqli_error($mysqli);
										}
						}						
?>


    <?php require 'php-modules/modal.php' ?>
    

    <?php require 'php-modules/footer.php' ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="js/main-js.js"></script>
</body>

</html>			
