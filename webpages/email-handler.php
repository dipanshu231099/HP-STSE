<?php
session_start();

$email = $_POST['inputEmail'];

if(filter_var($email, FILTER_VALIDATE_EMAIL)){
	$_SESSION['register-email'] = $email;

	#add email-sender, add OTP

	$_SESSION['OTP'] = "12asf6";

	header("Location: registration-student.php");
	die();
}
else{
	# show error invalid email id
	header("Location: register.php");
	die();
}

?>