<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Material Tabs</title>
  
  
  
      <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

  
</head>

<body>
  <div class="overlay"></div>

<div class="header">
  <div class="slider"></div>
  <div class="tab one ripple">Users</div>
  <div class="tab two ripple">Registration</div>
</div>
	<div class="page users">
	
	
			<form name="delete_record" id="delete_record" action="#" method="GET">				
			</form>
	
		<?php
			
		require('database_connect.php'); // open database connection
	
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
				$password = ($_POST['password']);
				$hash = 0000;
			}
						
			
			// insert data
					
			if(empty($errors)) {
				// Check if user with that email already exists
				$check_mail_query = "SELECT * FROM staff_signup WHERE email = '$email'";
				$email_exist = @mysqli_query($db_connection, $check_mail_query);

				// We know user email exists if the rows returned are more than 0
				if ($email_exist){
					if(mysqli_num_rows($email_exist) > 0 )
						echo "</br></br><h3 style=\"text-align: center; color:red;\">$email is already registered.</h3>";				
				
					else{
						$query = "INSERT INTO staff_signup(Staffname, contactNum, email, gender, position, dob, address, password, hash, active) VALUES('$name', '$number', '$email', '$gender', '$position', '$dob', '$address', '$password', '$hash', '1')";
						
						$result2 = @mysqli_query($db_connection, $query); // run query
						
						if($result2) { // if the query ran successfully
							echo "</br></br><h3 style=\"text-align: center; color:green;\">$name is registered successfully.</h3>";
							}
						else {
							echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">*".mysqli_error($db_connection)."</p>";
							}		
					}
				}	

					else{
						echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">*".mysqli_error($db_connection)."</p>";
					}
			}
			
			else {
				echo "<p style=\"text-align: center; color:red;\">The following error(s) occurred:<p>";

				foreach ($errors as $value) {
				  echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* $value <p>";
				}
			}

}


					//display client info.
										
					echo '<h2></br></br>Client Information.</h2></br>';
					$query = "SELECT * FROM users";
					
					$result = @mysqli_query($db_connection, $query); // run query
				
					
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
										  
										  $user_id = $data['user_id'];
										  echo "<td><button type=\"submit\" form=\"delete_record\" value=\"$user_id\" name=\"delete_user\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></td>";
										  echo "</tr>";
									}
									
									echo "</table>";
							}
							
							else{
								echo "</br></br>Error..! <br>No user registered yet.";
							}
						}
					
					else {
						echo 'Error!<br>'.mysqli_error($db_connection);
					}
					
				/* Staff display */
				
				echo '<h2></br></br></br>Staff Information.</h2></br>';
				$query1 = "SELECT * FROM staff_signup";
					$result1 = @mysqli_query($db_connection, $query1); // run query
				
					
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
										  
										  $staffID = $data1['staffID'];
										  echo "<td><button type=\"submit\" form=\"delete_record\" value=\"$staffID\" name=\"delete_staff\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></td>";
										  echo "</tr>";
									}
									
									echo "</table>";
							}
							
							else{
								echo "</br></br>Error..! <br>No Staff registered yet.";
							}
						}
					
					else {
						echo 'Error!<br>'.mysqli_error($db_connection);
					}
				
				

		
		if(isset($_GET['delete_user']))
			{	
				$delete_user = trim($_GET['delete_user']);
						
						$delete_query = "DELETE FROM users WHERE user_id = $delete_user";
						$result3 = @mysqli_query($db_connection, $delete_query); // run query
													
							if($result3)
							{
								$num = mysqli_affected_rows($db_connection);
							
								if($num > 0)
									header('location: index.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($db_connection);
							}
			}
			
			

			if(isset($_GET['delete_staff']))
			{	
				$delete_staff = trim($_GET['delete_staff']);
						
						$delete_query = "DELETE FROM staff_signup WHERE staffID = $delete_staff";
						$result3 = @mysqli_query($db_connection, $delete_query); // run query
													
							if($result3)
							{
								$num = mysqli_affected_rows($db_connection);
							
								if($num > 0)
									header('location: index.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($db_connection);
							}
			}
			
			mysqli_close($db_connection); // close the database connection
?>
		
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

    <script src="js/index.js"></script>

</body>
</html>
