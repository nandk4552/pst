<?php
$servername="localhost";
$username="root";
$password='$K!$h0r9007';
$dbname="map";

$conn=new mysqli($servername,$username,$password,$dbname);

if($conn->connect_error){
	die("Connection Failed".$conn->connect_error);
}else{
	//echo "connected";
}

?>
