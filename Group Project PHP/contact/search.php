
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="initialscale=1.0, width=device-width" />
  <link rel="stylesheet" href="style.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

  <title>Practical 2</title>
</head>
<body>
  <div id="container">
<td class="contact-delete">
      <form action='' method="post" name="delete" onsubmit="return mode();">
     <input type="text" placeholder="Enter Student Number" name="s_number" id="telephone_input" maxlength="20" required>
      <input type="submit" value="Search" id="form_button" name="submit_s" />

      </form>

</td>

<a href="home.php">Go to Home Page</a>

<div class="modal-overlay">
  <div class="modal">
    
    <a class="close-modal">
      <svg viewBox="0 0 20 20">
        <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
      </svg>
    </a><!-- close modal -->

    <div class="modal-content">
      <h3>Student not found or You forgot to enter</h3>
      <h2>Click <a href="home.php">here</a> to go back to the homepage.</h2>
    </div><!-- content -->
    
  </div><!-- modal -->
</div><!-- overlay -->








</div><!-- // End #container -->
<script type='text/javascript'>

window.onload = mode();

function mode(){

if(document.getElementById('telephone_input').value == ""){
  var elements = $('.modal-overlay, .modal');

$('#form_button').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});
  return false;
}
else{}

}
</script>

</body>

</html>


<?php




$link = mysqli_connect('127.0.0.1:3306', 'root', 'Augmented123?');
if(!$link){
  die("Connection failed: " .mysqli_connect_error());
}  
mysqli_select_db($link, 'Students');
mysqli_set_charset($link, 'utf8');


if(isset($_POST['submit_s'])){
   $selection = trim($_POST['s_number']);
 $sql = "SELECT * FROM Students WHERE Student_number =$selection ";



$result = mysqli_query($link, $sql);
$num = mysqli_num_rows($result);

  if(empty($_POST['s_number']) || $num == 0){
    echo "<script>mode();</script>";

  }
  else{


echo "<table border=1>
<tr>
<th>Student Number</th>
<th>First Name</th>
<th>Last Name</th>
<th>Address</th>
<th>Mobile Number</th>
<th>Home Number</th>
<th>Date of Birth</th>
<th>Gender</th>
<th>Major</th>
<th>Course</th>
<th>Study Mode</th>
<th>Start Date</th>
<th>End Date</th>
</tr>";
while($record = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  echo "<tr>";
  echo "<td>".$record['Student_number'] . "</td>";
   echo "<td>".$record['First_Name'] . "</td>";
   echo "<td>".$record['Last_Name'] . "</td>"; 
    echo "<td>".$record['Mobile_number'] . "</td>";
     echo "<td>".$record['Home_number'] . "</td>"; 
      echo "<td>".$record['Gender'] . "</td>";
      echo  "<td>".$record['Date_of_Birth'] . "</td>";
       echo "<td>".$record['Address'] . "</td>";
        echo "<td>".$record['Course'] . "</td>";
        echo "<td>".$record['Major'] . "</td>";
         echo "<td>".$record['Study_mode'] . "</td>";
         echo "<td>".$record['Start_date'] . "</td>";
         echo  "<td>".$record['End_date'] . "</td>";
         echo "</tr>";
}
echo "</table>";


}

}

mysqli_close($link);
      



?>