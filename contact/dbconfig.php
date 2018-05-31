<?php
$hostname_index = "localhost";
$database_index = "kely_feedback";
$username_index = "kely_feedback";
$password_index = "myfeedback101";

$connection = mysqli_connect($hostname_index, $username_index, $password_index, $database_index);	
if(!$connection)
{
	print("Connection failed: " . mysqli_connect_error());
}
?>