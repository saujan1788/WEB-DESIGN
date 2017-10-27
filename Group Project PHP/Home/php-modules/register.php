<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['name'] = $_POST['name'];
$_SESSION['contact'] = $_POST['contact'];

// Escape all $_POST variables to protect against SQL injections
$name = $mysqli->escape_string($_POST['name']);
$contact = $mysqli->escape_string($_POST['contact']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'User with this email already exists!';
    header("location: php-modules/error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (name, email, password, contact, hash) " 
            . "VALUES ('$name','$email','$password','$contact', '$hash')";

        
     $sql2 = "INSERT INTO Login (name,email, password, hash, user_type)". "VALUES ('$name','$email', '$password', '$hash', 'client')";       
    // Add user to the database
    if ( $mysqli->query($sql) && $mysqli->query($sql2)){

            //Mysqli->query=insert into login (email,password, usertype=client);

        $_SESSION['active'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";


        require 'email.php';

        header("location: php-modules/profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failed!';
        header("location: php-modules/error.php");
    }

}

?>