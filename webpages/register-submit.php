<?php 

session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$email = $_SESSION['register-email'];
$firstName = $_POST['fName'];
$lastName = $_POST['lName'];
$school = $_POST['school'];
$schoolRegNo = $_POST['schoolRegNo'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$OTP = $_POST['otp'];

if($password == $passwordConfirm){
	$sql = "INSERT INTO Students_2020 (firstname, lastname, email, school, schoolRegNo, password) VALUES('$firstName', '$lastName', '$email', '$school', '$schoolRegNo', '$password')";

	if($conn->query($sql) !== TRUE ){
		# show error
		echo "Error: ".$sql."<br>".$conn->error;
	}

	# set login_session=1
	# redirect to dashboard

	header("Location: index.php");
	die();
}
else{
	#show error
	header("Location: registration-student.php");
	die();
}

$conn->close();
?>