<?php
	require('connection.inc.php');
	require('functions.inc.php');

	$name=get_safe_value($con, $_POST['name']);
	$email=get_safe_value($con, $_POST['email']);
	$mobile=get_safe_value($con, $_POST['mobile']);
	$comment=get_safe_value($con, $_POST['message']);
	$added_on=date('Y-m-d h:i:s');

	$query=mysqli_query($con,"INSERT into contact_us (name, email, mobile, comment, added_on) VALUES('$name', '$email', '$mobile', '$comment', '$added_on')");

	header("location:contact.php");
?>