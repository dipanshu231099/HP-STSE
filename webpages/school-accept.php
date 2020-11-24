<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 
$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}
function mailto($student_email , $message){
	
	$mail = new PHPMailer(true); 

	try { 
		$mail->SMTPDebug = 0;									 
		$mail->isSMTP();											 
		$mail->Host	 = 'smtp.gmail.com;';					 
		$mail->SMTPAuth = true;							 
		$mail->Username = 'mandibtech@gmail.com';				 
		$mail->Password = 'mandi_hp_in';						 
		$mail->SMTPSecure = 'tls';							 
		$mail->Port	 = 587; 

		$mail->setFrom('mandibtech@gmail.com', 'Name');		 
		$mail->addAddress($student_email); 
		 
		
		$mail->isHTML(true);								 
		$mail->Subject = 'HP_STSE'; 
		$mail->Body = $message; 
		$mail->AltBody = 'Use a HTML mail client to properly open this mail'; 
		$mail->send(); 
		echo "Mail has been sent successfully!"; 
	} catch (Exception $e) { 
		echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
	}

	return 1;
	


}




session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$ntseid = $_GET['ntseid'];
if(!isset($ntseid)){
  header("Location: school-dash.php");
    die();
}

$year = date("Y");
$type = $_SESSION['type'];

if($type != 'school'){
  header("Location: index.php");
    die();
}

$sql1 = "SELECT * FROM Students_$year WHERE ntseid=$ntseid";
$std_email = $conn->query($sql1);
$std_email=$std_email->fetch_assoc();
$name = $std_email['firstname'];
$std_email = $std_email['email'];
//echo $std_email;

$sql2 = "UPDATE Students_Application_$year SET status=2 WHERE email='$std_email'";
if($conn->query($sql2)){
  
  $mail_body = "Hello $name . Your application is proceesed and approved by your school principal. Keep an eye on your mail for further updates";
  $no_use_var = mailto($std_email ,$mail_body);
	header("Location: school-dash.php?status=2");
	die();
}
else{
	header("Location: school-approval.php?ntseid=".$ntseid);
	die();
}
header("Location: school-dash.php?status=2");

$conn->close(); 

 ?>