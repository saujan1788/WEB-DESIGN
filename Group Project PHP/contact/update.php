


<?php



// Note: Update button doesn't work but search does. It fetches mysql values in the form provided the undefined variable is removed from all fields. Enter student number afte removing thme from the fields and it will work.


$link = mysqli_connect('127.0.0.1:3306', 'root', 'Augmented123?');
if(!$link){
  die("Connection failed: " .mysqli_connect_error());
}  
mysqli_select_db($link, 'Students');
mysqli_set_charset($link, 'utf8');


function getPosts()
{
    $posts = array();
    $posts[0] = $_POST['s_number'];
    $posts[1] = $_POST['first_name'];
    $posts[2] = $_POST['last_name'];
    $posts[4] = $_POST['m_number'];
    $posts[5] = $_POST['h_number'];
    $posts[6] = $_POST['address'];
    $posts[7] = $_POST['gender'];
    $posts[8] = $_POST['s_date'];
    $posts[9] = $_POST['course'];
    $posts[10] = $_POST['study_mode'];
    $posts[11] = $_POST['major'];
    $posts[12] = $_POST['e_date'];

    return $posts;
}

// Search

if(isset($_POST['submit_s']))
{
    $data = getPosts();
    $search_Query = "SELECT * FROM Students WHERE Student_number =$data[0] ";
    
    $search_Result = mysqli_query($link, $search_Query);
    
    if($search_Result)
    {
        if(mysqli_num_rows($search_Result))
        {
            while($row = mysqli_fetch_array($search_Result))
            {
                $id = $row['Student_number'];
                $fname = $row['First_Name'];
                $lname = $row['Last_Name'];
                $address = $row['Address'];
                $mobile = $row['Mobile_number'];
                $home = $row['Home_number'];
                $course = $row['Course'];
                $major = $row['Major'];
                $mode = $row['Study_mode'];
                $sdate = $row['Start_date'];
                $edate = $row['End_date'];
                $gender = $row['Gender'];
                $dob = $row['Date_of_Birth'];

            }
        }else{
            echo 'No Data For This Id';
        }
    }else{
        echo 'Result Error';
    }
}







mysqli_close($link);
      



?>
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

  <form action="" method="POST" id="contact_form" >
      <div class="name">
      <label for="name"></label>
      <input type="text" value="<?php echo $id; ?>" placeholder="Enter your Student number" maxlength="8" name="s_number" id="name_input" >

    </div>
        <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="My First Name is" name="first_name" id="telephone_input" maxlength="20" value="<?php echo $fname; ?>" >
    </div>
        <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="My Last Name is" name="last_name" id="telephone_input" maxlength="20" value="<?php echo $lname; ?>" >
    </div>

    <div class="f_name">
      <label for="f_name"></label>
      <input type="text" placeholder="My mobile number is" value="<?php echo $mobile; ?>" name="m_number" id="fn_input" >
    </div>


   <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Enter your home number" value="<?php echo $home; ?>" maxlength="8" name="h_number" id="name_input" >
    </div>



    <div class="gender">
      <label for="gender"></label>
      <select placeholder="Gender" name="gender" value="<?php echo $gender; ?>" id="gender_input" >
        <option disabled hidden selected>Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>

   <div class="telephone">
      <label for="name"></label>
      <input type="text" placeholder="Date of Birth (DD/MM/YYYY)" value="<?php echo $dob; ?>" name="dob" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" >
    </div>






    <div class="message">
      <label for="message"></label>
      <textarea name="address" placeholder="My Address is" value="<?php echo $address; ?>" id="message_input" cols="30" rows="5" ></textarea>
    </div>



       <div class="gender">
      <label for="gender"></label>
      <select placeholder="Course" value="<?php echo $course; ?>" name="course" id="gender_input" >
        <option disabled hidden selected>Select Course</option>
        <option value="Bachelors in Computing Science (Hons)">Bachelors in Computing Science (Hons)</option>
        <option value="Bachelors in Computing Science">Bachelors in Computing Science</option>
        <option value="Higher Certificate in Computing">Higher Certificate in Computing</option>

      </select>
    </div>

     <div class="name">
      <label for="name"></label>
      <select placeholder="Course" value="<?php echo $major; ?>" name="major" id="gender_input" >
        <option disabled hidden selected>Select Major</option>
        <option value="Cyber Security">Cyber Security</option>
        <option value="Cloud Computing">Cloud Computing</option>
        <option value="Game Design & Logic">Game Design & Logic</option>

      </select>
    </div>

    <div class="subject">
      <label for="subject"></label>
      <select placeholder="Subject line" value="<?php echo $mode; ?>" name="study_mode" id="subject_input" >
        <option disabled hidden selected>Study Mode</option>
        <option value="Full-Time">Full-Time</option>
        <option value="Part-Time">Part-Time</option>
      </select>
    </div>
    <div class="name">
      <label for="name"></label>
      <input type="text" placeholder="Course Start Date (DD/MM/YYYY)" value="<?php echo $sdate; ?>" name="s_date" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" >
    </div>
    <div class="f_name">
      <label for="f_name"></label>
      <input type="text" placeholder="Course End Date (DD/MM/YYYY)" value="<?php echo $edate; ?>" name="e_date" id="telephone_input" pattern="(0[1-9]|1[0-9]|2[0-9]|3[01]).(0[1-9]|1[012]).[0-9]{4}" >
    </div>

    <div class="submit">
      <input type="submit" value="Update" id="form_button" name="submit_u"/>
    </div>
        <div class="submit">
      <input type="submit" value="Search" id="form_button" name="submit_s"/>
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


<a href="home.php">Go to Home Page</a>






</div><!-- // End #container -->
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

