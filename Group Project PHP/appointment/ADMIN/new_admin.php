<?php 

if(!isset($_SERVER['HTTP_REFERER'])){
    // redirect them to your desired location
    header('location: admin-login.php');
    exit;
}
/* Main page with two forms: sign up and log in */
require 'php-modules/db.php';
session_start();

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
if(isset($_POST['register']))
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
			
						
			if(empty($_POST['designation'])) {
				$errors[] = 'You forgot to select designation.';
			}

			else {
				$position = strip_tags($_POST['designation']);
			}
			
			if(empty($_POST['gender'])) {
				$errors[] = 'You forgot to select Gender';
			}

			else {
				$gender = strip_tags($_POST['gender']);
			}
			
			if(empty($_POST['dob'])) {
				$errors[] = 'You forgot to Enter Date of Birth.';
			}

			else {
				$dob = strip_tags($_POST['dob']);
			}
			
			if(empty($_POST['address'])) {
				$errors[] = 'You forgot to Enter Address.';
			}

			else {
				$address = strip_tags($_POST['address']);
			}
			
			if(empty($_POST['password'])) {
				$errors[] = 'You forgot to Enter your password.';
			}

			else {
				$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));

				$hash = 0000;
			}
						
			
			// insert data
					
			if(empty($errors)) {
				// Check if user with that email already exists
				$check_mail_query = "SELECT * FROM staff_signup WHERE email = '$email'";
				$email_exist = mysqli_query($mysqli, $check_mail_query);

				// We know user email exists if the rows returned are more than 0
				if ($email_exist){
					if(mysqli_num_rows($email_exist) > 0 )
						echo "</br></br><h3 style=\"text-align: center; color:red;\">$email is already registered.</h3>";				
				
					else{
						$query = "INSERT INTO staff_signup(Staffname, contactNum, email, gender, position, dob, address, password, hash, active) VALUES('$name', '$number', '$email', '$gender', '$position', '$dob', '$address', '$password', '$hash', '1')";
						$query2 = "INSERT INTO login(name, email, password, hash, user_type, active) VALUES ('$name','$email', '$password', '$hash', 'staff', '1')";
						
						$result2 = mysqli_query($mysqli, $query); // run query
						$result21 = mysqli_query($mysqli, $query2); // run query
						
						if($result2 && $result21) { // if the query ran successfully
							echo "</br></br><h3 style=\"text-align: center; color:green;\">$name is registered successfully.</h3>";
							}
						else {
							echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">*".mysqli_error($mysqli)."</p>";
							}		
					}
				}	

					else{
						echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">*".mysqli_error($mysqli)."</p>";
					}
			}
			
			else {
				echo "<p style=\"text-align: center; color:red;\">The following error(s) occurred:<p>";

				foreach ($errors as $value) {
				  echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* $value <p>";
				}
			}

}?>
		




<?php
//display client info.
										
					echo '<h2></br></br>Client Information.</h2></br>';
					$query = "SELECT * FROM users";
					
					$result = @mysqli_query($mysqli, $query); // run query
				
					
						if($result) { // if the query ran successfully
							if(mysqli_num_rows($result)>0){
									
									echo "<table>
										<tr>
											<th>User ID</th>
											<th>Name</th>
											<th>Phone</th>										
											<th>Email</th>
											<th>Active</th>
										</tr>";
									
									while($data = mysqli_fetch_array($result)){
										  echo "<tr>";
										  echo "<td>".$data['user_id'] . "</td>";
										  echo "<td>".$data['name'] . "</td>";
										  echo "<td>".$data['contact'] . "</td>"; 
										  echo "<td>".$data['email'] . "</td>";
										  if($data['active']==0)
										  {echo "<td> No </td>";}
										  elseif($data['active']==1)
										  {echo "<td> Yes </td>";}	
										  
										  $email = $data['email'];
										  echo "<td class=\"no_border\"><button type=\"submit\" form=\"delete_record\" value=\"$email\" name=\"delete_user\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></td>";
										  echo "</tr>";
									}
									
									echo "</table>";
							}
							
							else{
								echo "</br></br>Error..! <br>No user registered yet.";
							}
						}
					
					else {
						echo 'Error!<br>'.mysqli_error($mysqli);
					}
					
				/* Staff display */
				
				echo '<h2></br></br></br>Staff Information.</h2></br>';
				$query1 = "SELECT * FROM staff_signup";
					$result1 = @mysqli_query($mysqli, $query1); // run query
				
					
						if($result1) { // if the query ran successfully
							if(mysqli_num_rows($result1)>0){
									
									echo "<table>
										<tr>
											<th>Staff ID</th>
											<th>Name</th>
											<th>Phone</th>										
											<th>Email</th>
											<th>Gender</th>
											<th>Position</th>
											<th>Date of Birth</th>										
											<th>Address</th>
											<th>Active</th>
										</tr>";
									
									while($data1 = mysqli_fetch_array($result1)){
										  echo "<tr>";
										  echo "<td>".$data1['staffID'] . "</td>";
										  echo "<td>".$data1['Staffname'] . "</td>";
										  echo "<td>".$data1['contactNum'] . "</td>"; 
										  echo "<td>".$data1['email'] . "</td>";
										  echo "<td>".$data1['gender'] . "</td>";
										  echo "<td>".$data1['position'] . "</td>";
										  echo "<td>".$data1['dob'] . "</td>"; 
										  echo "<td>".$data1['address'] . "</td>"; 
										  if($data1['active']==0)
										  {echo "<td> No </td>";}
										  elseif($data1['active']==1)
										  {echo "<td> Yes </td>";}	
										  
										  $email = $data1['email'];
										  echo "<td class=\"no_border\"><button type=\"submit\" form=\"delete_record\" value=\"'$email'\" name=\"delete_staff\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></td>";
										  echo "</tr>";
									}
									
									echo "</table>";
							}
							
							else{
								echo "</br></br>Error..! <br>No Staff registered yet.";
							}
						}
					
					else {
						echo 'Error!<br>'.mysqli_error($mysqli);
					}
?>






<?php
if(isset($_POST['delete_user']))
			{	
				$delete_user = trim($_POST['delete_user']);
						
						$delete_query = "DELETE FROM users WHERE email = '$delete_user'";
						$delete_query2 = "DELETE FROM login WHERE email = '$delete_user'";
						$result3 = mysqli_query($mysqli, $delete_query); // run query
						$result32 = mysqli_query($mysqli, $delete_query2); // run query
													
							if($result3 && $result32)
							{
								$num = mysqli_affected_rows($mysqli);
							
								if($num > 0)
									header('location: admin.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($mysqli);
							}
			}
			




			

			if(isset($_POST['delete_staff']))
			{	
				$delete_staff = trim($_POST['delete_staff']);
						
						$delete_query = "DELETE FROM staff_signup WHERE email = $delete_staff"; //email was staffID
						$delete_query2 = "DELETE FROM login WHERE email = $delete_staff";
						$result30 = mysqli_query($mysqli, $delete_query); // run query
						$result31 = mysqli_query($mysqli, $delete_query2); // run query
													
							if($result30 && $result31)
							{
								$num = mysqli_affected_rows($mysqli);
							
								if($num > 0)
									header('location: admin.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($mysqli);
							}
			}
			
			mysqli_close($mysqli); // close the database connection?>
		
	  </div>
	  
<div class="page reg">
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
								<option value="Cleaning & Maintainance">Cleaning & Maintainance</option>
								<option value="Others">Others</option>
							</select>
	</li>
	
	<li>
		<select name="gender" required="">
								<option disabled hidden selected>Gender</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
							</select>
		<input type="text" name="dob" placeholder="Date Of Birth DD/MM/YYYY" required/>
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
