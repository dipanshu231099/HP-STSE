<?php 

session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}


$applicantname = $_POST['appname'];
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$area = $_POST['area'];
$caste = $_POST['caste'];
$disability = $_POST['disability'];
$add1 = $_POST['add1'];
$add2 = $_POST['add2'];
$state = $_POST['state'];
$district = $_POST['district'];
$pincode = $_POST['pincode'];
$typeofins = $_POST['typeofinst'];
$kennavo = $_POST['kennavo'];
$meda = $_POST['meda'];
$medb = $_POST['medb'];
$fedu = $_POST['fedu'];
$focc = $_POST['focc'];
$medu = $_POST['medu'];
$mocc = $_POST['mocc'];
$family = $_POST['family'];
$brothers = $_POST['brothers'];
$sisters = $_POST['sisters'];
$brosis = $_POST['brosis'];
$pincome = $_POST['pincome'];
$Telephone = $_POST['Telephone'];
$email = $_SESSION['email'];
$mobile = $_POST['Mobile'];
$adhar = $_POST['adhar'];
$exam_center = $_POST['exam_center'];


	$sql = "INSERT INTO Students_Application_2020 (applicantname,fathername,mothername,gender,date_of_birth,area,caste,disability,add1,add2,state,district,pincode,type_of_ins,stu_of_ken,med_of_exam1,med_of_exam2,fedu,focc,medu,mocc,family_members,brothers,sisters,level_in_family,income,email,contact_number,aadhar,telephone,exam_center) VALUES('$applicantname', '$fname', '$mname', '$gender', '$dob', '$area', '$caste', '$disability', '$add1', '$add2', '$state', '$district', '$pincode', '$typeofins', '$kennavo', '$meda', '$medb', '$fedu', '$focc', '$medu', '$mocc', '$family', '$brothers', '$sisters', '$brosis', '$pincome', '$email', '$mobile', '$adhar', 'Telephone', '$exam_center')";

	if($conn->query($sql) !== TRUE ){
		# show error
		echo "Error: ".$sql."<br>".$conn->error;
	}

	# set login_session=1
	# redirect to dashboard

	header("Location: dashboard.php");
	die();


$conn->close();
?>
  	