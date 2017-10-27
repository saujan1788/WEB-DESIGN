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
			
			mysqli_close($mysqli); // close the database connection
?>