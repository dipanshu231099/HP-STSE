<!DOCTYPE html>
<html lang="en">

<?php
session_start();
?>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- bootstrap css -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="../css/register.css">
	<title>Begin Registration</title>
</head>

<body>
	<?php
		session_destroy();
		include 'header.php';
	?>
	
  <div class="container">
    <div class="row">
	   <form class="col-sm-12 reg-form" action="email-handler.php" method="POST">
        <div class="form-group">
          <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" id="inputEmail" name="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        <h1>Check your Email for OTP after submitting</h1>
	   </form>

	   <?php if(isset($_SESSION['registerStatus']) && $_SESSION['registerStatus']==-1) {?>
        <div class="col-sm-12">
          <p class="alert alert-danger" style="margin-top: 2.5%;" role="alert">
            Registration unsuccessful
          </p>
        </div>
      <?php } ?>
	   
	 </div>
	</div>

	<?php include 'footer.php'; ?>

</body>

	<!-- scripts for bootstrap -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>