<?php 

session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$year = date("Y");
$email = $_SESSION['register-email'];
$firstName = $_POST['fName'];
$lastName = $_POST['lName'];
$school = $_POST['inputSchool'];
$schoolRegNo = $_POST['schoolRegNo'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];
$OTP = $_POST['otp'];

if($password == $passwordConfirm){
	if($OTP==$_SESSION['OTP']){

		$sql_tmp = "SELECT id FROM Schools WHERE name='$school'";

		if($result=$conn->query($sql_tmp)){
			while($row=$result->fetch_assoc()){
				$school = $row['id'];
			}
		}


		#if error
		$sql = "INSERT INTO Students_$year (firstname, lastname, email, school, schoolRegNo, password) VALUES('$firstName', '$lastName', '$email', '$school', '$schoolRegNo', '$password')";
		echo $sql;
		if($conn->query($sql) !== TRUE ){
			# show error
			$_SESSION['registerStatus']=-1;
			header("Location: register.php");
			die();
		}
	}
	else{
		$_SESSION["otp"] = "some random thing that user can't guess. He need to now get another otp";
		$_SESSION['registerStatus']=-1;
		header("Location: register.php");
		die();
	}

	$_SESSION["otp"] = "some random thing that user can't guess. He need to now get another otp";
	# set login_session=1
	# redirect to dashboard
	session_destroy();
	session_start();

	$_SESSION['loginStatus'] = 1;
    $_SESSION['type'] = 'student';
    $_SESSION['email']=$email;
	header("Location: dashboard.php");
	die();
}
else{
	#show error
	header("Location: registration-student.php");
	die();
}

$conn->close();
?>