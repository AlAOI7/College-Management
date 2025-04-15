<?php
//database connection
$conn=mysqli_connect('localhost','root','','imperial_college');
if(!$conn) {
	echo "connection failed:" .mysqli_connect_error($conn);
	die();
}
?>