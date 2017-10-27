<?php
/* User and Staff login checks if user exists and if the password is correct */



// Escape email to protect against SQL injections
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM login WHERE user_type ='client' AND email ='$email'");
//$result2 = $mysqli->query("SELECT * FROM login WHERE email='$email'"); 

$result2 = $mysqli->query("SELECT * FROM login WHERE user_type='staff' AND email ='$email'");
//do an elseif statement after the password verify if statement and include staff login there
if ( ($result->num_rows == 0) && ($result2->num_rows == 0) ){ // User doesn't exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: php-modules/error.php");
}

else { // User exists
    $user = $result->fetch_assoc();
    $data = $result2->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {// Check for users
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['user_type'] = $user['user_type'];

        $_SESSION['active'] = $user['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
                header("location: ../home.php");



    }


    elseif(password_verify($_POST['password'], $data['password'])){// Check for staff
        $_SESSION['email'] = $data['email'];
        $_SESSION['name'] = $data['name']; //Staffname
        $_SESSION['user_type'] = $data['user_type'];
        $_SESSION['active'] = $data['active'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
            header("location: ../home.php");
    }

    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: php-modules/error.php");
    }
}








