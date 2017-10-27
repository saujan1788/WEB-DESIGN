<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Light & Sexy Tabs</title>
  
  
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

      <link rel="stylesheet" href="style.css">

  
</head>

<body>

<div class="overlay"></div>

<div class="header">
  <div class="slider"></div>
  <div class="tab one ripple">Users</div>
  <div class="tab two ripple">tags</div>
  <div class="more"></div>
</div>
<div class="page main">
      <?php
          require('database_connect.php'); // open database connection
          $query = "SELECT * FROM Appointment";
          $result = @mysqli_query($db_connection, $query); // run query
        
          if($result) { // if the query ran successfully
            
            if($result) { // if the query ran successfully
              if(mysqli_num_rows($result)>0){
                  echo '<h2>All Scheduled Appointments.</h2>';
                  
                  echo "<table>
                    <tr>
                      <th>app_ID</th>
                      <th>Name</th>
                      <th>Phone</th>                    
                      <th>Email</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>";
                  
                  while($data = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>".$data['appNo'] . "</td>";
                      echo "<td>".$data['name'] . "</td>";
                      echo "<td>".$data['contactNum'] . "</td>"; 
                      echo "<td>".$data['email'] . "</td>";
                      echo "<td>".$data['date'] . "</td>"; 
                      echo "<td>".$data['time'] . "</td>";
                      echo "<td><button type=\"submit\" form=\"delete\" value=\"\" name=\"dr\"><i class=\"fa fa-trash\" aria-hidden=\"true\"></i></button></td>";
                      echo "</tr>";
                  }
                  
                  echo "</table>";
              }
              
              else{
                echo "Error..! <br>No Appointments scheduled yet.";
              }
            }
          }
          
          else {
            echo 'Error!<br>'.mysqli_error($db_connection);
          }
        
        
    
    ?>
  </div>
<div class="page tags">
  <h3>Add saved images to a tag</h3>
  <div class="tag"></div>
  <p>Tags are where you add and organize your saved images</p>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="index.js"></script>

</body>
</html>
