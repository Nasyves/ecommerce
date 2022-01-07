<?php
	require('connection.inc.php');
	require('functions.inc.php');

	$mobile=get_safe_value($con, $_POST['mobile']);
	$name=get_safe_value($con, $_POST['name']);
	$password=get_safe_value($con, $_POST['password']);
	$email=get_safe_value($con, $_POST['email']);

	$query=mysqli_query($con,"INSERT into users (name, email, mobile, password, added_on) VALUES('$name', '$email', '$mobile', '$password', '$added_on')");
	

	
?>