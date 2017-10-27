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
  
</div>
	<div class="page users">
	
	
			<form name="delete_record" id="delete_record" action="#" method="GET">				
			</form>
	
		<?php
			
		require('database_connect.php'); // open database connection
	
		


					//display client info.
										
					echo '<h2></br></br>Appointmnet Information</h2></br>';

					$query = "SELECT * FROM appointments";
					
					$result = @mysqli_query($db_connection, $query); // run query
				
					
						if($result) { // if the query ran successfully
							if(mysqli_num_rows($result)>0){
									
									echo "<table>
										<tr>
											<th>app_ID</th>
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
										  
										  $user_id = $data['appNo'];
										  $user_confirm = $data['confirm'];
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
				
		
				
				

		
		if(isset($_GET['delete_user']))
			{	
				$delete_user = trim($_GET['delete_user']);

				if($user_confirm == "Not Confirmed"){
						
						$delete_query = "UPDATE appointments set confirm='Confirmed' WHERE appNo = $delete_user";
						$result3 = @mysqli_query($db_connection, $delete_query); // run query
													
							if($result3)
							{
								$num = mysqli_affected_rows($db_connection);
							
								if($num > 0)
									header('location: admin.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($db_connection);
							}
			}

			if($user_confirm == "Confirmed" || $user_confirm == "CONFIRMED"){
						
						$delete_query = "UPDATE appointments set confirm='Not Confirmed' WHERE appNo = $delete_user";
						$result3 = @mysqli_query($db_connection, $delete_query); // run query
													
							if($result3)
							{
								$num = mysqli_affected_rows($db_connection);
							
								if($num > 0)
									header('location: admin.php');		

							}
							
							else {
							echo 'Error!<br>'.mysqli_error($db_connection);
							}
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
		
	
</body>
</html>
