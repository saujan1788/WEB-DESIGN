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

}
?>