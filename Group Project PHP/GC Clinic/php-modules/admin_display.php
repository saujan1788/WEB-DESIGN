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
				
				echo '<h2></br></br>Staff Information.</h2></br>';
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
									
									echo "</table><br><br>";
							}
							
							else{
								echo "</br></br>Error..! <br>No Staff registered yet.";
							}
						}
					
					else {
						echo 'Error!<br>'.mysqli_error($mysqli);
					}

?>					