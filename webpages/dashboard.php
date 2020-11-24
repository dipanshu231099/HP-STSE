<!DOCTYPE html>
<html lang="en">

<?php
session_start();
$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'], $config['username'], $config['password'], $config['dbname']);
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
    Dashboard
  </h1>
  <?php if (isset($_SESSION['loginStatus']) && ($_SESSION['loginStatus'] == 1)) { ?>
    <h1 class="text-center main-heading">Welcome <?php echo $_SESSION['email']; ?></h1>

    <?php
    $emailwa = $_SESSION['email'];
    $query = "SELECT * FROM Students_Application_2020 where email='$emailwa';";
    $resultofQ = $conn->query($query);
    $rows=0;
    if($result = $resultofQ->fetch_assoc())$rows++;
    $status = $result['status'];
    $naam = $result['applicantname'];
    if ($status == 1 || $status == 2) { ?>
      <center><img src="green.png" alt="" style="width:150px;height:150px" ;></center>
      <h3 class="text-center main-heading"> <?php echo "Dear $naam " ?> your application is submitted. <br>Wait till your School Principal approves your application. For any query contact 0141-342561 or you can email at hpstse@gmail.com"</h3>

    <?php } else if ($status == 0 && $rows) { ?>
      <h2 class="text-center main-heading"> Your Application from was rejected. Please fill it again...</h2>
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-sm-12 login-form">
            <form action="application.php" method="post">

              <div class="form-group d-none">

              </div>
              <div class="form-check col-md-12">
                <button type="submit" class="btn btn-dark" style="width: 100%;">Fill Application Form</button>
              </div>
            </form>

          </div>
        </div>
      </div>
      <?php
      } else if ($status == 3)
      {
        ?>
        <h3 class="text-center main-heading"> <?php echo "Dear $naam "?> your Admit Card for HTSE <?php echo date("Y"); ?> has been generated!<br></h3>
        <form action="application_view_stud.php" method="post" class="px-auto text-center my-5">
          <input type="submit" class="btn btn-success btn-lg" value="Download Admit Card">
        </form>
    <?php } else { ?>
      <h2 class="text-center main-heading"> You are good to go to fill the application form now...</h2>
      <div class="container">
        <div class="row">
        </div>
        <div class="row">
          <div class="col-sm-12 login-form">
            <form action="application.php" method="post">

              <div class="form-group d-none">

              </div>
              <div class="form-check col-md-12">
                <button type="submit" class="btn btn-dark" style="width: 100%;">Fill Application Form</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php }  ?>


  <br>



  <?php include 'footer.php'; ?>
</body>
<!-- scripts for bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>