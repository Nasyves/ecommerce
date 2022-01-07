<?php
	require('connection.inc.php');
	require('functions.inc.php');

	$password=get_safe_value($con, $_POST['password']);
	$email=get_safe_value($con, $_POST['email']);

	$query="SELECT * FROM users WHERE email='$email' AND password='$password'";
	$res = mysqli_query($con, $query);
	$count=mysqli_num_rows($res);
	
	if ($count == 1) {
		header('location:index.php');
	}else{
	header('location:login.php');
}
?>