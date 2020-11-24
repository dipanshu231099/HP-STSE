<?php
    session_start();
    $config = include('../config.php');
    // establishing connection
    $conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
    if ($conn->connect_errno) {
        die("Failed to connect ot DB");
    }

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;
    require 'vendor/autoload.php';

    function mailto($message){
	
    $config = include('../config.php');
    $conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
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
    
            $mail->setFrom('mandibtech@gmail.com', 'HP STSE');		 
            $query = "select email from Students_Application_2020 where status=2;";
            $result = $conn->query($query);

            while($row=$result->fetch_assoc()){
                $mail->addAddress($row['email']); 
            }

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

    //mailing the students
    $void_var = mailto("Your admit card has been generated. Kindly download it from the HP-STSE Portal.");

    //run the store proc
    $query = "CALL Allot_pref_centers()";
    if ($result = $conn->query($query)) {
        echo $result->num_rows;
    }
    $query = "CALL Allot_rem_centers()";
    if ($result = $conn->query($query)) {
        echo $result->num_rows;
    }
    $query = 'update Students_Application_2020 as app, (select concat("HTSE20", LPAD(cast(school as char(4)), 4, \'0\'), LPAD(cast(row_number() over(partition by school order by submitted_at) as char(10)), 5, \'0\')) as rowNum, email  from (select T2.school, T1.submitted_at, T1.email  from Students_Application_2020 as T1 inner join Students_2020 as T2 on T1.email = T2.email) as T3) as T set app.ntse_rollno = T.rowNum where app.email = T.email';
    if ($result = $conn->query($query)) {
        echo $result->num_rows;
    }
    header("Location: admin-dash.php");
    die();
?>