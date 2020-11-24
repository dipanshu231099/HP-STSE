<?php
    session_start();

    $config = include('../config.php');
    // establishing connection
    $conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
    if ($conn->connect_errno) {
        die("Failed to connect ot DB");
    }

    $year = date("Y");
    $status = $_GET['status'];
    if(!isset($status) || ($status != 2 && $status != 3)){
        header("Location: admin-dash.php?status=2");
        die();
    }
    
    // get data
    $query = "SELECT T2.submitted_at AS submitted_at, T1.ntseid AS ntseID, T1.schoolRegNo AS schoolID,T1.firstname AS fName,T1.lastname AS lName FROM Students_$year AS T1 INNER JOIN Students_Application_$year AS T2 ON T1.email=T2.email AND T2.status=$status ORDER BY T2.submitted_at ASC";

    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
    $users = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=Students_Application_2020.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('No', 'First Name', 'Last Name', 'Email'));
    
    if (count($users) > 0) {
        foreach ($users as $row) {
            fputcsv($output, $row);
        }
    }
?>