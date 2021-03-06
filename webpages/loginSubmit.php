<?php 

session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

if (!in_array($_POST['type'], ['student', 'admin', 'school'])) {
    header("Location: index.php");
}

if(isset($_POST['type'])){

    $email = $_POST['email'];
    $password = $_POST['password'];
    $type = $_POST['type'];

    if($_POST['type']=="student"){
        $year = date("Y");
        $table = "Students_$year";
    }
    else if($_POST['type']=='admin'){
        $table = "Admin";
    }
    else if($_POST['type']=='school'){
        $table = "Schools";
    }

    $query = "SELECT * FROM `$table` WHERE email=\"$email\" and password=\"$password\";";

    if (($result = $conn->query($query)) && (mysqli_num_rows($result)>0)) {
        $row = $result -> fetch_assoc();
        $_SESSION['loginStatus'] = 1;
        $_SESSION['type'] = $type;
        $_SESSION['email']=$row['email'];
        $result -> free_result();
        if($type == 'student'){
            header("Location: dashboard.php");
            die();
        }
        else if($type=='school'){
            header("Location: school-dash.php");
            die();
        }
        else if ($type=='admin') {
            header("Location: admin-dash.php");
            die();
        }
    } else {
        $_SESSION['loginStatus']=-1;
        unset($_SESSION['email']);
        unset($_SESSION['type']);
        header("Location: login.php?type=$type");
    }
    

}
else {
    header("Location: login.php?type=student");
}
