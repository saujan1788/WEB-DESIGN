
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
  <h1>&bull; Student Registration Form &bull;</h1>
  <div class="underline">
  </div>

  <form action="" method="POST" id="contact_form" target="frame">
        <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="My First Name is" name="first_name" id="telephone_input" maxlength="20" required>
    </div>
        <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="My Last Name is" name="last_name" id="telephone_input" maxlength="20" required>
    </div>

    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Enter your Student number" maxlength="8" name="s_number" id="name_input" required>
    </div>
    <div class="f_name">
      <label for="f_name"></label>
      <input type="text" placeholder="My mobile number is" name="m_number" id="fn_input" required>
    </div>


   <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Enter your home number" maxlength="8" name="h_number" id="name_input" required>
    </div>



    <div class="gender">
      <label for="gender"></label>
      <select placeholder="Gender" name="gender" id="gender_input" required>
        <option disabled hidden selected>Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>

   <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="Date of Birth (DD/MM/YYYY)" name="dob" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
    </div>






    <div class="message">
      <label for="message"></label>
      <textarea name="address" placeholder="My Address is" id="message_input" cols="30" rows="5" required></textarea>
    </div>



       <div class="gender">
      <label for="gender"></label>
      <select placeholder="Course" name="course" id="gender_input" required>
        <option disabled hidden selected>Select Course</option>
        <option value="Bachelors in Computing Science (Hons)">Bachelors in Computing Science (Hons)</option>
        <option value="Bachelors in Computing Science">Bachelors in Computing Science</option>
        <option value="Higher Certificate in Computing">Higher Certificate in Computing</option>

      </select>
    </div>

     <div class="name">
      <label for="name"></label>
      <select placeholder="Course" name="major" id="gender_input" required>
        <option disabled hidden selected>Select Major</option>
        <option value="Cyber Security">Cyber Security</option>
        <option value="Cloud Computing">Cloud Computing</option>
        <option value="Game Design & Logic">Game Design & Logic</option>

      </select>
    </div>

    <div class="subject">
      <label for="subject"></label>
      <select placeholder="Subject line" name="study_mode" id="subject_input" required>
        <option disabled hidden selected>Study Mode</option>
        <option value="Full-Time">Full-Time</option>
        <option value="Part-Time">Part-Time</option>
      </select>
    </div>
    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Course Start Date (DD/MM/YYYY)" name="s_date" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
    </div>
    <div class="f_name">
      <label for="f_name"></label>
      <input type="text" placeholder="Course End Date (DD/MM/YYYY)" name="e_date" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" required>
    </div>

    <div class="submit">
      <input type="submit" value="Add" id="form_button" name="submit"/>
    </div>
          <input type="hidden" name="check" value ="true" />

  </form><!-- // End form -->

<div class="modal-overlay">
  <div class="modal">
    
    <a class="close-modal">
      <svg viewBox="0 0 20 20">
        <path fill="#000000" d="M15.898,4.045c-0.271-0.272-0.713-0.272-0.986,0l-4.71,4.711L5.493,4.045c-0.272-0.272-0.714-0.272-0.986,0s-0.272,0.714,0,0.986l4.709,4.711l-4.71,4.711c-0.272,0.271-0.272,0.713,0,0.986c0.136,0.136,0.314,0.203,0.492,0.203c0.179,0,0.357-0.067,0.493-0.203l4.711-4.711l4.71,4.711c0.137,0.136,0.314,0.203,0.494,0.203c0.178,0,0.355-0.067,0.492-0.203c0.273-0.273,0.273-0.715,0-0.986l-4.711-4.711l4.711-4.711C16.172,4.759,16.172,4.317,15.898,4.045z"></path>
      </svg>
    </a><!-- close modal -->

    <div class="modal-content">
      <h3>New student added successfully!</h3>
      <h2>Click <a href="home.php">here</a> to go back to the homepage.</h2>
    </div><!-- content -->
    
  </div><!-- modal -->
</div><!-- overlay -->








</div><!-- // End #container -->
<iframe name="frame"></iframe>
<script type='text/javascript'>
//window.onload = mode();
function mode(){
var elements = $('.modal-overlay, .modal');

$('#form_button').click(function(){
    elements.addClass('active');
});

$('.close-modal').click(function(){
    elements.removeClass('active');
});


}
mode();


</script>

</body>

</html>


<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
  $errors = array(); // for recording the errors
      if(empty($_POST['s_number'])) {
        $errors[] = 'You forgot to enter Student No.';
      }

      else {
        $Student_number = trim($_POST['s_number']);
      }
    
      if(empty($_POST['first_name'])) {
        $errors[] = 'You forgot to enter first name';
      }

      else {
        $first_name = trim($_POST['first_name']);
      }
      
      if(empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter last name';
      }

      else {
        $last_name = trim($_POST['last_name']);
      }
      
      if(empty($_POST['address'])) {
        $errors[] = 'You forgot to enter Address';
      }

      else {
        $Address = trim($_POST['address']);
      }
    
      if(empty($_POST['m_number'])) {
        $errors[] = 'You forgot to enter mobile No.';
      }

      else {
        $mobile = trim($_POST['m_number']);
      }
    
      if(empty($_POST['h_number'])) {
        $errors[] = 'You forgot to enter home No.';
      }

      else {
        $home = trim($_POST['h_number']);
      }
    
      if(empty($_POST['dob'])) {
        $errors[] = 'You forgot to enter date of birth';
      }

      else {
        $dob = trim($_POST['dob']);
      }
      
      if(empty($_POST['gender'])) {
        $errors[] = 'You forgot to enter gender';
      }

      else {
        $gender = trim($_POST['gender']);
      }
      
      if(empty($_POST['major'])) {
        $errors[] = 'You forgot to enter major';
      }

      else {
        $major = trim($_POST['major']);
      }
      
      if(empty($_POST['course'])) {
        $errors[] = 'You forgot to enter course';
      }

      else {
        $course = trim($_POST['course']);
      }
      
      if(empty($_POST['study_mode'])) {
        $errors[] = 'You forgot to enter Study mode';
      }

      else {
        $study_mode = trim($_POST['study_mode']);
      }
      
      if(empty($_POST['s_date'])) {
        $errors[] = 'You forgot to enter course start date.';
      }

      else {
        $course_start_date = trim($_POST['s_date']);
      }
    
      if(empty($_POST['e_date'])) {
        $errors[] = 'You forgot to enter course end date.';
      }

      else {
        $course_end_date = trim($_POST['e_date']);
      }



$link = mysqli_connect('127.0.0.1:3306', 'root', 'Augmented123?');
if(!$link){
  die("Connection failed: " .mysqli_connect_error());
}  
mysqli_select_db($link, 'Students');
mysqli_set_charset($link, 'utf8');

$sql = "INSERT INTO Students (Student_number,First_Name,Last_Name,Mobile_number,Home_number,Gender,Date_of_Birth, Address, Course,Major, Study_mode, Start_date, End_date ) VALUES ('$Student_number','$first_name','$last_name', '$mobile', '$home', '$gender', '$dob', '$Address', '$course', '$Major', '$study_mode', '$course_start_date', '$course_end_date')";


$result = mysqli_query($link, $sql);
if($result){
  echo "success";
} 

else{
  echo "failed !";
}


mysqli_close($db_connection);
      
}


?>