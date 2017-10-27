<?php
/* Database connection settings */
$host = 'localhost:3306';
$user = 'root';
$pass = 'ROOT?123';
$db = 'clinicDB';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
?>