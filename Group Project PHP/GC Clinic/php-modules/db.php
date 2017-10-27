<?php
/* Database connection settings */
$host = 'localhost:3306';
$user = 'root';
$pass = 'dc4dfbc7c8fc33b7936ab0de516395e50e1afd060886c719';
$db = 'clinicDB';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>