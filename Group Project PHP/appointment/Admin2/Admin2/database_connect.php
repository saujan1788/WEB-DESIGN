<?php
DEFINE('DB_USER', 'root');
DEFINE('DB_PASSWORD', 'ROOT?123');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'clinicDB');
$db_connection = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR
die("Could not connect to MySQL! ". mysqli_connect_error());
mysqli_set_charset($db_connection, 'utf8');
?>