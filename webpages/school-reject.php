<?php 

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

$sql1 = "SELECT email FROM Students_$year WHERE ntseid=$ntseid";
$std_email = $conn->query($sql1);
$std_email=$std_email->fetch_assoc();
$std_email = $std_email['email'];
echo $std_email;

$sql2 = "UPDATE Students_Application_$year SET status=0 WHERE email='$std_email'";
if($conn->query($sql2)){
	header("Location: school-dash.php?status=0");
	die();
}
else{
	header("Location: school-approval.php?ntseid=".$ntseid);
	die();
}

$conn->close(); 

 ?>