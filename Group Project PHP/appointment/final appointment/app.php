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
			
			if(empty($_POST['number'])) {
				$errors[] = 'You forgot to enter Number.';
			}

			else {
				$number = strip_tags($_POST['number']);
			}
			
			if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) {
				$email[] = strip_tags($_POST['email']);
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
				$result = mysqli_query($db_connection, $query); // run query
				
				if($result) { // if the query ran successfully
					echo "<p>Appointment is Scheduled.</p>";
					}
				else {
					echo 'Error!<br>'.mysqli_error($db_connection);
					}				
			}
			
			else {
				echo "<p>The following error(s) occurred:<p><br/>";
				foreach ($errors as $msg) { // print each error..
				echo "$msg<br/>";
				}
			}

			mysqli_close($db_connection); // close the database connection
			
}

?>