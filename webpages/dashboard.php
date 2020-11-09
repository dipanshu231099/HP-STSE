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

  <link rel="stylesheet" href="../css/style.css">
  <title>HP STSE</title>
</head>

<body>
  <?php include 'header.php'; ?>
  
  <h1 class="text-center main-heading">
    Dashboard
  </h1>
  <?php if(isset($_SESSION['loginStatus']) && ($_SESSION['loginStatus']==1)) { ?>
        <h1 class="text-center main-heading">Welcome <?php echo $_SESSION['email'];?></h1>
        <h2 class="text-center main-heading"> You are good to go to fill the application form now...</h2>
        <?php } ?>
  <br>

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

  <?php include 'footer.php'; ?>
</body>
<!-- scripts for bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>