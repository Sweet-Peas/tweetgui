<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "tweetgui";

$conn = mysqli_connect($host, $username, $password, $dbname);

if(mysqli_connect_errno($conn)){
	echo "Could not connect to database " . $dbname . ".<br />" . mysqli_connect_error();
	exit();
}

?>