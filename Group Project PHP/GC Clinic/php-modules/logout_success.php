<?php
/* Displays all messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../reset.css">
    <link rel="stylesheet" href="../../style.css">
  <title>Error</title>
  <?php include './css/css.html'; ?>
</head>
<body>

<div class="form">
    <p>You have Successfully Logged out.</p>
    <?php header( "refresh:1;url= ../home.php" );?>
     
    <a href="../home.php"><button class="button button-block"/>Home</button></a>
</div>

</body>
</html>
