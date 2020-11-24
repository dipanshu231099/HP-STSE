<!DOCTYPE html>
<html lang="en">

<?php
session_destroy();
session_start();
$type = $_GET['type'];
$_POST['type'] = $_GET['type'];
if (!in_array($type, ['student', 'admin', 'school'])) {
  header("Location: index.php");
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
    Sign In - <?php
              echo $_GET['type'];
              ?>
  </h1>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 login-form">
        <form action="loginSubmit.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
            </div>
            <div class="form-group col-md-6">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            </div>
            <div class="form-group d-none">
              <input type="text" class="form-control" id="type" placeholder="type" name="type" value="<?php echo $type; ?>">
            </div>
          </div>
          <div class="form-check col-md-12">
            <button type="submit" class="btn btn-dark" style="width: 100%;">Sign in</button>
          </div>
        </form>

      </div>

      <?php
        if($type != "admin"){
          ?>
          <div class="col-sm-6"><a href="login.php?type=admin">
            <button class="btn btn-dark w-100" type="button">
              I am an Admin
            </button></a>
          </div>
          <?php
        }
      ?>
      <?php
        if($type != "school"){
          ?>
          <div class="col-sm-6"><a href="login.php?type=school">
            <button class="btn btn-dark w-100" type="button">
              I am a School
            </button></a>
          </div>
          <?php
        }
      ?>

      <?php
        if($type != "student"){
          ?>
          <div class="col-sm-6"><a href="login.php?type=student">
            <button class="btn btn-dark w-100" type="button">
              I am a Student
            </button></a>
          </div>
          <?php
        }
      ?>

      <?php if(isset($_SESSION['loginStatus']) && $_SESSION['loginStatus']==-1) {?>
        <div class="col-sm-12">
          <p class="alert alert-danger" style="margin-top: 2.5%;" role="alert">
            Invalid Username or Password
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