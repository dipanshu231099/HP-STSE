<?php 
	session_start();
	use PHPMailer\PHPMailer\PHPMailer; 
	use PHPMailer\PHPMailer\Exception; 

	require 'vendor/autoload.php'; 

	function StudentVerfication($student_email){
		$otp = mt_rand(10000,99999);
		$mail = new PHPMailer(true); 

		try { 
			$mail->SMTPDebug = 2;									 
			$mail->isSMTP();											 
			$mail->Host	 = 'smtp.gmail.com;';					 
			$mail->SMTPAuth = true;							 
			$mail->Username = 'mandibtech@gmail.com';				 
			$mail->Password = 'mandi_hp_in';						 
			$mail->SMTPSecure = 'tls';							 
			$mail->Port	 = 587; 

			$mail->setFrom('mandibtech@gmail.com', 'HP-STSE');		 
			$mail->addAddress($student_email); 
			 
			
			$mail->isHTML(true);								 
			$mail->Subject = 'OTP Code for registration'; 
			$content = "Your one time password for your student sign-up is $otp";
			$mail->Body = $content; 
			$mail->AltBody = 'Use proper mail service to view the otp'; 
			$mail->send(); 
			echo "Mail has been sent successfully!"; 
		} catch (Exception $e) { 
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
		}
		
	return $otp;

	}
?>

<?php
	$email = $_POST['inputEmail'];

	if(filter_var($email, FILTER_VALIDATE_EMAIL)){
		$_SESSION['register-email'] = $email;

		#add email-sender, add OTP

		$_SESSION['OTP'] = StudentVerfication($email);

		header("Location: registration-student.php");
		die();
	}
	else{
		# show error invalid email id
		header("Location: register.php");
		die();
	}

?>