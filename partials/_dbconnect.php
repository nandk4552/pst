<?php
session_start();

// Script to connect to the database
define('SITEURL', 'http://localhost/hackathon/');

// script to connect to the database    
// creating connection
$servername = "localhost";
$username = "root";
$password = '$K!$h0r9007';
$database = "pst";

$conn = mysqli_connect($servername, $username, $password, $database);


?>