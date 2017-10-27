<?php
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM login WHERE email='$email' AND user_type='admin'");
//$result2 = $mysqli->query("SELECT * FROM login WHERE email='$email'"); 

//$result2 = $mysqli->query("SELECT * FROM Login WHERE user_type='admin'")

if ( $result->num_rows == 0){ // User doesn't exist
    echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* Wrong Username or Password <p>";
}
else { // User exists
    $user = $result->fetch_assoc();
    //$data = $result2->fetch_assoc();
    //$user_type = $data['user_type'];

    if ( password_verify($_POST['password'], $user['password'])) {
        
        $_SESSION['email'] = $user['email'];        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;


       header("location: admin.php");
    }
    else {
    echo "<p style=\"line-height: 0; padding: 0; margin: 0 auto; border: 0; text-align: center; color:red;\">* Wrong Username or Password <p>";

    }
}
