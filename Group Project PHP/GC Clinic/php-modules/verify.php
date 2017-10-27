<?php 

require 'db.php';
session_start();

//This makes sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet, i.e active = 0
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Account has already been activated or the URL is invalid!";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Your account has been activated!";
        
        // Set the user status to active to 1 indicating user is verified
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
                $mysqli->query("UPDATE login SET active='1' WHERE email='$email'") or die($mysqli->error);

        $_SESSION['active'] = 1;
        
        header("location: success.php");
    }
}
else {
    header("location: error.php");
}     
    
?>