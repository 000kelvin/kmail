<?php
$connection = mysqli_connect('localhost','root','','kely_report');
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>