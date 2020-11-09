<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">HP-STSE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Guidlines</a>
      </li>
      
    </ul>
    <ul class="nav navbar-nav ml-auto">
      
        <?php if(isset($_SESSION['loginStatus']) && ($_SESSION['loginStatus']==1)) { ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><span class="fas fa-sign-in-alt"></span>Welcome <?php echo $_SESSION['email'];?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php"><button role="button" class="btn btn-primary">Dashboard</button></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><button role="button" class="btn btn-primary">Logout</button></a>
          </li>
        <?php } else { ?>
        <li class="nav-item">
          <a class="nav-link" href="register.php"><button class="btn btn-primary">Sign Up</button> </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php?type=student"><button class="btn btn-primary">Login</button> </a>
        </li>
        <?php } ?>

    </ul>
  </div>
</nav>