<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/style.css">
  <title>HP STSE</title>
</head>

<body>
  <?php include 'header.php'; ?>
  <h1 class="text-center main-heading">
    State Level National Talent Search Examination
  </h1>
  <h3 class="text-center">
    (For Students Studying In Class X In H.P.)
  </h3>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <a href="login.php?type=student">
          <button role="button" class="btn btn-dark w-100">
            <h3>Login as Student</h3>
            <span>I am a candidate</span>
          </button>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="login.php?type=school">
          <button role="button" class="btn btn-dark w-100">
            <h3>Login as School</h3>
            <span>For school administration</span>
          </button>
        </a>
      </div>
      <div class="col-sm-4">
        <a href="login.php?type=admin">
          <button role="button" class="btn btn-dark w-100">
            <h3>Login as Admin</h3>
            <span>HP-STSE administration</span>
          </button>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <p class="alert alert-primary text-center" style="margin-top: 2.5%;" role="alert">
          Welcome to Himachal Pradesh State Level National Talent Search Examination !!
        </p>
      </div>
      <div class="col-sm-12">
        <a href="register.php">
          <button role="button" class="btn btn-dark w-100">
            <h3>Sign up</h3>
            <span>New students need to sign up first</span>
          </button>
        </a>
      </div>
    </div>
  </div>

  <?php include 'footer.php'; ?>
</body>
<!-- scripts for bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>