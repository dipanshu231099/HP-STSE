<!DOCTYPE html>
<head>
  <style>
  .html2canvas-container { width: 5000px !important; height: 5000px !important; }
  </style>

  <script type="text/javascript" src="../javascript/html2canvas.js"></script>
  <script type="text/javascript" src="../javascript/jspdf.min.js"></script>
  <script type="text/javascript">
    function genPDF()
    {
      html2canvas(document.getElementById("AdmitCard"),{
        onrendered:function(canvas){

        var img=canvas.toDataURL("image/png");
        var doc = new jsPDF("p", "mm", "a4");
        var width = doc.internal.pageSize.width;
        var height = doc.internal.pageSize.height;
        doc.addImage(img,'JPEG', 0, 2, width, height);
        doc.save('admit_card.pdf');
        }

        });
    }
    window.onload = function() 
    {
        genPDF();
    };
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/school-approval.css">
  <title>HP STSE</title>
</head>

<html lang="en">

<?php 
session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$year = date("Y");
$type = $_SESSION['type'];
$email = $_SESSION['email'];

if($type != 'student'){
  header("Location: index.php");
    die();
}

$sql = "SELECT * FROM Students_$year AS T1 INNER JOIN Students_Application_$year AS T2 ON T1.email=T2.email WHERE T2.email='$email'";
$result = $conn->query($sql);
$result = $result->fetch_assoc();
$status = $result['status'];
?>

<body>

  <div class="container" id="AdmitCard">
    <div class="col-sm-12">
      <p class="alert alert-primary text-center mt-2" role="alert">
        Admit Card
      </p>
    </div>

    <div class="row">
       <div class="col-sm-12 login-form">

        <div class="col-sm-12">
          <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
          Personal Details
          </p>
        </div>

        <?php $re = $result['email']; ?>
        <img src="uploads/<?php echo $re; ?>.jpg" style="width:100px;height:150px;margin:0px 50px 10px 10px">


      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="appname">Applicant's Name</label>
          <div>
            <?php echo $result['applicantname'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="fname">Father's Name</label>
          <div>
            <?php echo $result['fathername'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="mname">Mother's Name</label>
          <div>
            <?php echo $result['mothername'] ?>
          </div>
        </div>

        <div class="form-group col-md-2">
          <label for="gender">Gender</label>
          <div>
            <?php echo $result['gender'] ?>
          </div>
        </div>

        <div class="form-group col-md-4">
          <label for="mname">Date of Birth</label>
          <div>
            <?php echo $result['date_of_birth'] ?>
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="area">Area in which candidate resides</label>
          <div>
            <?php echo $result['area'] ?>
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="caste">Caste Category of Candidate</label>
          <div>
            <?php echo $result['caste'] ?>
          </div>
        </div>
        <div class="form-group col-md-4">
          <label for="disability">Disability Status</label>
          <div>
            <?php echo $result['disability'] ?>
          </div>
        </div>


        <div class="col-sm-12">
          <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
          Postal address of the candidate for correspondence
          </p>
        </div>
        <div class="form-group col-md-6">
          <label for="add1">Address 1</label>
          <div>
            <?php echo $result['add1'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="add2">Address 2</label>
          <div>
            <?php echo $result['add2'] ?>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label for="state">State</label>
          <div>
            <?php echo $result['state'] ?>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label for="district">District</label>
          <div>
            <?php echo $result['district'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="pincode">PIN Code</label>
          <div>
            <?php echo $result['pincode'] ?>
          </div>
        </div>
        <div class="col-sm-12">
          <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
          Other Details
          </p>
        </div>

        <div class="form-group col-md-6">
          <label for="typeofins">Type of the institution in which studying at Class X</label>
          <div>
            <?php echo $result['type_of_ins'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Are you Student of Kendriya Vidyalaya / Navodaya Vidyalaya? </label>
          <div>
            <?php echo $result['stu_of_ken'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Medium of Examinations at State Level </label>
          <div>
            <?php echo $result['med_of_exam1'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Medium of Examinations at NCERT Level </label>
          <div>
            <?php echo $result['med_of_exam2'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Father's Education </label>
          <div>
            <?php echo $result['fedu'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Father's Occupation </label>
          <div>
            <?php echo $result['focc'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Mother's Education </label>
          <div>
            <?php echo $result['medu'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Mother's Occupation </label>
          <div>
            <?php echo $result['mocc'] ?>
          </div>
        </div>

        <div class="form-group col-md-6">
          <label for="family">Number of family members in the house</label>
          <div>
            <?php echo $result['family_members'] ?>
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="brothers">Number of brothers</label>
          <div>
            <?php echo $result['brothers'] ?>
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="sisters">Number of sisters</label>
          <div>
            <?php echo $result['sisters'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="brosis">At what no. is the candidate among his/her brothers and sisters</label>
          <div>
            <?php echo $result['level_in_family'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="typeofins">Parental Annual Income </label>
          <div>
            <?php echo $result['income'] ?>
          </div>
        </div>
        <div class="form-group col-md-1">
          <label for="STD">STD</label>
          <div>hello</div>
        </div>
        <div class="form-group col-md-5">
          <label for="Telephone">Telephone</label>
          <div>
            <?php echo $result['telephone'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="email">Email Address</label>
          <div>
            <?php echo $result['email'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="Mobile">Mobile Number</label>
          <div>
            <?php echo $result['contact_number'] ?>
          </div>
        </div>
        <div class="form-group col-md-6">
          <label for="adhar">Adhar Card Number</label>
          <div>
            <?php echo $result['aadhar'] ?>
          </div>
        </div>
      
        <div class="col-sm-12">
          <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
          Examination Center
          </p>
        </div>
        <div class="form-group col-md-12 customBottom">
          <label for="exam_center">STSE Roll Number</label>
          <div>
            <?php echo $result['ntse_rollno'] ?>
          </div>
        </div>
        <div class="form-group col-md-12 customBottom">
          <label for="exam_center">Allocated Exam Center</label>
          <div>
            <?php echo $result['alloted_center'] ?>
          </div>
        </div>
      </div>

      <br>
      <br>
      <br>

      </div>
    </div>
  </div>

</body>
<!-- scripts for bootstrap -->

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
