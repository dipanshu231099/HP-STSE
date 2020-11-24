<!DOCTYPE html>
<html lang="en">

<?php
session_start();

$email = $_SESSION['register-email'];

if(!isset($email)){
  header("Location: register.php");
  die();
}

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$sql = "SELECT name FROM Schools";

?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/registration-student.css">
	<title>Student Registration</title>
</head>

<body>
	<?php include 'header.php'; ?>
	
	<div class="container">
	<div class="row">
	<form class="col-sm-12 reg-form" action="register-submit.php" method="POST" oninput='inputPasswordConfirm.setCustomValidity(inputPasswordConfirm.value != inputPassword.value ? "Passwords do not match." : "")'>
		<div class="custom-header">Account Registration</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<label for="inputEmail">Email</label>
				<input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder=<?php echo $_SESSION['register-email'] ?> disabled>
			</div>
		</div>
		<div class="form-row">
    		<div class="form-group col-md-6">
    			<label for="fName">First Name</label>
      			<input type="text" class="form-control" id="fName" name="fName" placeholder="First name" required>
    		</div>
    		<div class="form-group col-md-6">
    			<label for="lName">Last Name</label>
      			<input type="text" class="form-control" id="lName" name="lName" placeholder="Last name">
    		</div>
  		</div>
  		<div class="form-row">
    		<div class="form-group col-md-6">
      		<label for="inputSchool">School</label>
  				<select class="form-control" name="inputSchool">
  					<?php 
              if ($result = $conn->query($sql)) {
                  while($row = $result->fetch_assoc()){
                    echo "<option>";
                      echo $row['name'];
                    echo "</option>";
                  }
                  $result->free_result();
              }
             ?>
  				</select>
    		</div>
    		<div class="form-group col-md-2">
  				<label for="inputClass">Class</label>
  				<input type="text" class="form-control" id="Class" placeholder="X" disabled>
  			</div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-6">
  				<label for="inputSchoolId">School Registration Number</label>
  				<input type="text" class="form-control" id="inputSchoolId" name="schoolRegNo" placeholder="School Registration Number" required>
  			</div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-6">
				<label for="inputPassword">Password</label>
				<input type="password" class="form-control" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,50}$" id="inputPassword" name="password" placeholder="Password" required>
				<small class="text-muted"> Password: Must contain at least a number, special character, upper and lower case letter and minimum length=8, maximum length=50 </small>
			</div>
			<div class="form-group col-md-6">
				<label for="inputPasswordConfirm">Confirm Password</label>
				<input type="password" class="form-control" id="inputPasswordConfirm" name="passwordConfirm" placeholder="Confirm Password" required>
			</div>
  		</div>
  		<div class="form-row">
  			<div class="form-group col-md-4">
  				<label for="OTP">OTP(sent over Email provided)</label>
				  
  				<input type="text" class="form-control" id="OTP" name="otp" placeholder="OTP" required>
  			</div>
  		</div>
  		<div class="text-center">
  			<button type="submit" class="btn btn-primary">Submit</button>
  		</div>
		  <br>
		  <br>
	</form>
	</div>
	</div>

  <?php include 'footer.php';$conn->close(); ?>
</body>

	<!-- scripts for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>