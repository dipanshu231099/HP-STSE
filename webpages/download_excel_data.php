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
    if(!isset($status) ){
        header("Location: admin-dash.php?status=2");
        die();
    }
    
    // get data
    if ($status == 2)
    {
        $query = "select T2.submitted_at, T2.email, T1.firstname, T1.lastname, T1.ntseid, T1.school, T1.`schoolRegNo`, T2.applicantname,T2.fathername,T2.mothername,T2.gender,T2.date_of_birth,T2.area,T2.caste,T2.disability,T2.add1,T2.add2,T2.state,T2.district,T2.pincode,T2.type_of_ins,T2.stu_of_ken,T2.med_of_exam1,T2.med_of_exam2,T2.fedu,T2.focc,T2.medu,T2.mocc,T2.family_members,T2.brothers,T2.sisters,T2.level_in_family,T2.income,T2.contact_number,T2.aadhar,T2.telephone, T2.exam_center  from Students_$year AS T1 INNER JOIN Students_Application_$year AS T2 ON T1.email=T2.email AND T2.status=2 order by T2.submitted_at ASC;";
    }
    else if ($status == 3)
    {
        $query = "select T2.submitted_at, T2.email, T1.firstname, T1.lastname, T1.ntseid, T1.school, T1.`schoolRegNo`, T2.applicantname,T2.fathername,T2.mothername,T2.gender,T2.date_of_birth,T2.area,T2.caste,T2.disability,T2.add1,T2.add2,T2.state,T2.district,T2.pincode,T2.type_of_ins,T2.stu_of_ken,T2.med_of_exam1,T2.med_of_exam2,T2.fedu,T2.focc,T2.medu,T2.mocc,T2.family_members,T2.brothers,T2.sisters,T2.level_in_family,T2.income,T2.contact_number,T2.aadhar,T2.telephone, T2.exam_center, T2.alloted_center, T2.ntse_rollno from Students_$year AS T1 INNER JOIN Students_Application_$year AS T2 ON T1.email=T2.email AND T2.status=3 order by T2.submitted_at ASC;";
    }

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
    if ($status == 2)
    {
        fputcsv($output, array('submitted_at', 'email', 'firstname', 'lastname', 'ntseid', 'school', 'schoolRegNo', 'applicantname', 'fathername', 'mothername', 'gender', 'date_of_birth', 'area', 'caste', 'disability', 'add1', 'add2', 'state', 'district', 'pincode', 'type_of_ins', 'stu_of_ken', 'med_of_exam1', 'fedu', 'focc', 'medu', 'mocc', 'family_members', 'brothers', 'sisters', 'level_in_family', 'income', 'contact_number', 'aadhar', 'telephone', 'preffered_exam_center'));
    }
    else if ($status == 3)
    {
        fputcsv($output, array('submitted_at', 'email', 'firstname', 'lastname', 'ntseid', 'school', 'schoolRegNo', 'applicantname', 'fathername', 'mothername', 'gender', 'date_of_birth', 'area', 'caste', 'disability', 'add1', 'add2', 'state', 'district', 'pincode', 'type_of_ins', 'stu_of_ken', 'med_of_exam1', 'fedu', 'focc', 'medu', 'mocc', 'family_members', 'brothers', 'sisters', 'level_in_family', 'income', 'contact_number', 'aadhar', 'telephone', 'preffered_exam_center', 'Allocated Exam Center', 'NTSE Roll No.'));
    }
    
    if (count($users) > 0) {
        foreach ($users as $row) {
            fputcsv($output, $row);
        }
    }
?>