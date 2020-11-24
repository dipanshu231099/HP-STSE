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
    Online Application Form
  </h1>
  
  <br>

  <div class="container">
    <div class="row">
      
    </div>


    <div class="col-sm-12">
        <p class="alert alert-primary text-center" style="margin-top: 2.5%;" role="alert">
          Application Form 
        </p>
      </div>

    <div class="row">
       <div class="col-sm-12 login-form">
        <form action="applicationsubmit.php" method="post" enctype="multipart/form-data">
      <div class="col-sm-12">
        <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
          Personal Details
        </p>
      </div>

     
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="appname">Applicant's Name</label>
              <input type="text" class="form-control" id="appname" placeholder="Applicant's Name" name="appname" >
            </div>
            <div class="form-group col-md-6">
              <label for="fname">Father's Name</label>
              <input type="text" class="form-control" id="fname" placeholder="Father's Name" name="fname" >
            </div>
            <div class="form-group col-md-6">
              <label for="mname">Mother's Name</label>
              <input type="text" class="form-control" id="mname" placeholder="Mother's Name" name="mname" >
            </div>

            <div class="form-group col-md-2">
              <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender" >
                  <option  value='Male'>Male</option><option  value='Female'>Female</option>

                </select>
            </div>

            <div class="form-group col-md-4">
              <label for="mname">Date of Birth</label>
              <input type="date" class="form-control" id="dob" placeholder="Date of birth" name="dob" >
            </div>
            <div class="form-group col-md-4">
              <label for="area">Area in which candidate resides</label>
              <select class="form-control" id="area" name="area" >
                  <option  value='Rural'  >Rural</option><option  value='Urban'  >Urban</option>
                </select>
            </div>
            <div class="form-group col-md-4">
              <label for="caste">Caste Category of Candidate</label>
              <select class="form-control" id="caste" name="caste" >
                  <option value="EWS">EWS</option><option value="General">General</option><option value="OBC">OBC</option><option value="ST">ST</option><option value="SC">SC</option>
                </select>
            </div>
            <div class="form-group col-md-4">
              <label for="disability">Disability Status</label>
              <select class="form-control" id="disability" name="disability" >
                  <option value="AID">AID</option><option value="BLV">BLV</option><option value="DH">DH</option><option value="LD">LD</option><option value="MD">MD</option><option value="NONE">NONE</option>
                </select>
            </div>
            
            
            <div class="col-sm-12">
              <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
                Postal address of the candidate for correspondence
              </p>
            </div>
            <div class="form-group col-md-6">
              <label for="add1">Address 1</label>
              <input type="text" class="form-control" id="add1" placeholder="Address 1" name="add1" >
            </div>
            <div class="form-group col-md-6">
              <label for="add2">Address 2</label>
              <input type="text" class="form-control" id="add2" placeholder="Address 2" name="add2">
            </div>
            
            <div class="form-group col-md-6">
              <label for="state">State</label>
              <select class="form-control" id="state" name="state"  >
                  <option value="HP">HP</option><option value="Other">Other</option>
                </select>
            </div>

            <div class="form-group col-md-6">
              <label for="district">District</label>
              <input type="text" class="form-control" id="district" placeholder="District" name="district" >
            </div>
            <div class="form-group col-md-6">
              <label for="pincode">PIN Code</label>
              <input type="text" class="form-control" id="pincode" placeholder="PIN code" name="pincode" >
            </div>
            <div class="col-sm-12">
              <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
                Other Details
              </p>
            </div>

            <div class="form-group col-md-6">
              <label for="typeofins">Type of the institution in which studying at Class X</label>
              <select class="form-control" id="typeofinst" name="typeofinst" >
                  <option  value='GOVERNMENT'  >GOVERNMENT</option><option  value='LOCAL BODY'  >LOCAL BODY</option><option  value='PRIVATE AIDED'  >PRIVATE AIDED</option><option  value='PRIVATE UNAIDED'  >PRIVATE UNAIDED</option>''
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Are you Student of Kendriya Vidyalaya / Navodaya Vidyalaya? </label>
                  <select class="form-control" id="kennavo" name="kennavo" >
                  	<option  value='Yes'  >Yes</option><option  value='No'  >No</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Medium of Examinations at State Level </label>
              <select class="form-control" id="meda" name="meda" >    <option  value='English'  >English</option><option  value='Hindi'  >Hindi</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Medium of Examinations at NCERT Level </label>
              <select class="form-control" id="medb" name="medb" >    <option  value='English'  >English</option><option  value='Hindi'  >Hindi</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Father's Education </label>
              <select class="form-control" id="fedu" name="fedu" >
                  <option  value='DOCTORAL'  >DOCTORAL</option>
                    <option  value='GRADUATION'  >GRADUATION</option>
                    <option  value='NO FORMAL EDUCATION'  >NO FORMAL EDUCATION</option>
                    <option  value='POST GRADUATION'  >POST GRADUATION</option>
                    <option  value='PROFESSIONAL DEGREE'  >PROFESSIONAL DEGREE (ENGINEERING, LAW, MEDICINE, MCA, BCA, etc)</option>
                    <option  value='SECONDARY'  >SECONDARY</option>
                    <option  value='SENIOR SECONDARY'  >SENIOR SECONDARY</option>
                    <option  value='UP TO PRIMARY'  >UP TO PRIMARY</option>
                    <option  value='UPPER PRIMARY'  >UPPER PRIMARY</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Father's Occupation </label>
              <select class="form-control" id="foccu" name="foccu" >    <option  value='AGRICULTURE FISHERY'  >AGRICULTURE, FISHERY</option>
                    <option  value='BUSINESS'  >BUSINESS</option>
                    <option  value='CLERICAL'  >CLERICAL</option>
                    <option  value='EXECUTIVE AND MANAGERIAL'  >EXECUTIVE AND MANAGERIAL</option>
                    <option  value='NOT EMPLOYED'  >NOT EMPLOYED</option>
                    <option  value='OPERATORS AND LABOURERS'  >OPERATORS AND LABOURERS</option>
                    <option  value='PRODUCTION AND TRANSPORT'  >PRODUCTION AND TRANSPORT</option>
                    <option  value='PROFESSSIONAL'  >PROFESSSIONAL</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Mother's Education </label>
              <select class="form-control" id="medu" name="medu" ><option  value='DOCTORAL'  >DOCTORAL</option>
                    <option  value='GRADUATION'  >GRADUATION</option>
                    <option  value='NO FORMAL EDUCATION'  >NO FORMAL EDUCATION</option>
                    <option  value='POST GRADUATION'  >POST GRADUATION</option>
                    <option  value='PROFESSIONAL DEGREE'  >PROFESSIONAL DEGREE (ENGINEERING, LAW, MEDICINE, MCA, BCA, etc)</option>
                    <option  value='SECONDARY'  >SECONDARY</option>
                    <option  value='SENIOR SECONDARY'  >SENIOR SECONDARY</option>
                    <option  value='UP TO PRIMARY'  >UP TO PRIMARY</option>
                    <option  value='UPPER PRIMARY'  >UPPER PRIMARY</option>
                </select>
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Mother's Occupation </label>
              <select class="form-control" id="mocc" name="mocc" >
              	<option  value='AGRICULTURE FISHERY'  >AGRICULTURE, FISHERY</option>
                    <option  value='BUSINESS'  >BUSINESS</option>
                    <option  value='CLERICAL'  >CLERICAL</option>
                    <option  value='EXECUTIVE AND MANAGERIAL'  >EXECUTIVE AND MANAGERIAL</option>
                    <option  value='NOT EMPLOYED'  >NOT EMPLOYED</option>
                    <option  value='OPERATORS AND LABOURERS'  >OPERATORS AND LABOURERS</option>
                    <option  value='PRODUCTION AND TRANSPORT'  >PRODUCTION AND TRANSPORT</option>
                    <option  value='PROFESSSIONAL'  >PROFESSSIONAL</option>
                </select>
            </div>
            
            <div class="form-group col-md-6">
              <label for="family">Number of family members in the house</label>
              <input type="text" class="form-control" id="family" placeholder="" name="family" >
            </div>
            <div class="form-group col-md-3">
              <label for="brothers">Number of brothers</label>
              <input type="text" class="form-control" id="brothers" placeholder="" name="brothers" >
            </div>
            <div class="form-group col-md-3">
              <label for="sisters">Number of sisters</label>
              <input type="text" class="form-control" id="sisters" placeholder="" name="sisters" >
            </div>
            <div class="form-group col-md-6">
              <label for="brosis">At what no. is the candidate among his/her brothers and sisters</label>
              <input type="text" class="form-control" id="brosis" placeholder="" name="brosis" >
            </div>
            <div class="form-group col-md-6">
              <label for="typeofins">Parental Annual Income </label>
              <select class="form-control" id="pincome" name="pincome" > <option  value='2,00,001 to 3,00,000'  >2,00,001 to 3,00,000</option>
                  <option  value='3,00,001 to 5,00,000'  >3,00,001 to 5,00,000</option>
                  <option  value='5,00,001 to 10,00,000'  >5,00,001 to 10,00,000</option>
                  <option  value='More than 10,00,000'  >More than 10,00,000</option>
                  <option  value='Upto 2,00,000'  >Upto 2,00,000</option>
                </select>
            </div>
           
            <div class="form-group col-md-6">
              <label for="email">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder=<?php echo $_SESSION['email'] ?> disabled>
            </div>

             <div class="form-group col-md-6">
              <label for="Mobile">Mobile Number</label>
              <input type="text" class="form-control" id="Mobile" placeholder="" name="Mobile" >
            </div>
            <div class="form-group col-md-6">
              <label for="adhar">Adhar Card Number</label>
              <input type="text" class="form-control" id="adhar" placeholder="" name="adhar" >
            </div>

            

            <div class="col-sm-12">
              <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
                Select Examination Center
              </p>
            </div>
            <div class="form-group col-md-12">
              <p class="alert-warning alert" role="alert">Important Note : Please indicate your preferred examination centres from the given list. While every effort will be made to allot you a centre according to your preference, it may not be possible to do so due to logistical reasons.</p>
              <label for="exam_center">Exam Center</label>
              <select class="form-control" id="exam_center" name="exam_center" >
                  <option  value='1001'  >GSSS(Boys)  NAHAN Dist. Sirmaur</option>
                  <option value='1002' >GSSS(Boys)  RAJGARH Dist. Sirmaur</option>
                  <option  value='1003'  >GSSS(Boys)  PAONTA SAHIB Dist. Sirmaur</option>
                  <option  value='1004'  >GSSS SARAHAN Dist. Sirmaur</option>
                  <option  value='1005'  >GSSS NOHRADHAR Dist. Sirmaur</option>
                  <option  value='1006'  >GSSS DADAHU Dist. Sirmaur</option>
                  <option  value='101'  >GSSS(Boys) BILASPUR, Dist. Bilaspur</option>
                  <option  value='102'  >GSSS(Boys) GHUMARWIN Dist. Bilaspur</option>
                  <option  value='103'  >GSSS BERTHIN Dist. Bilaspur</option>
                  <option  value='104'  >GSSS(Girls)  GHUMARWIN Dist. Bilaspur</option>
                  <option  value='105'  >GSSS NAMHOL Dist. Bilaspur</option>
                  <option  value='106'  >GSSS JAMLI Dist. Bilaspur</option>
                  <option  value='1101'  >GSSS(Boys)  ARKI Dist. Solan</option>
                  <option  value='1102'  >GSSS(Girls)  ARKI Dist. Solan</option>
                  <option  value='1103'  >GSSS(Boys) SOLAN Dist. Solan</option>
                  <option  value='1104'  >GSSS(Girls)  SOLAN Dist. Solan</option>
                  <option  value='1105'  >GSSS DHARAMPUR Dist. Solan</option>
                  <option  value='1106'  >GSSS BAROTIWALA Dist. Solan</option>
                  <option  value='1107'  >GSSS KANDAGHAT Dist. Solan</option>
                  <option  value='1108'  >GSSS OACHGHAT Dist. Solan</option>
                  <option  value='1109'  >GSSS(Girls) NALAGARH Dist. Solan</option>
                  <option  value='1201'  >GSSS SALOH Dist. Una</option>
                  <option  value='1202'  >GSSS(Girls) UNA Dist. Una</option>
                  <option  value='1203'  >GSSS AMB Dist. Una</option>
                  <option  value='1204'  >GSSS BANGANA Dist. Una</option>
                  <option  value='201'  >GSSS(Boys) CHAMBA Dist. Chamba</option>
                  <option  value='202'  >GSSS(Girls) CHAMBA Dist. Chamba</option>
                  <option  value='203'  >GSSS CHOWARI Dist. Chamba</option>
                  <option  value='204'  >GSSS BANIKHET Dist. Chamba</option>
                  <option  value='205'  >GSSS KALHEL Dist. Chamba</option>
                  <option  value='301'  >GSSS(Boys)  HAMIRPUR Dist. Hamirpur</option>
                  <option  value='302'  >GSSS(Girls)  HAMIRPUR Dist. Hamirpur</option>
                  <option  value='303'  >GSSS(Boys) SUJANPUR Dist. Hamirpur</option>
                  <option  value='304'  >GSSS BANNI Dist. Hamirpur</option>
                  <option  value='305'  >GSSS BHORANJ Dist. Hamirpur</option>
                  <option  value='306'  >GSSS(Girls) NADAUN Dist. Hamirpur</option>
                  <option  value='307'  >KENDRIYA VIDYALYA, HAMIRPUR Dist. Hamirpur</option>
                  <option  value='401'  >GSSS NEW KANGRA Dist. Kangra </option>
                  <option  value='402'  >GSSS BAIJNATH Dist. Kangra</option>
                  <option  value='403'  >GSSS(Boys)  NURPUR Dist. Kangra</option>
                  <option  value='404'  >GSSS DEHRA Dist. Kangra</option>
                  <option  value='405'  >GSSS DARI Dist. Kangra</option>
                  <option  value='406'  >GMSMSSS, OLD KANGRA Dist. Kangra</option>
                  <option  value='407'  >GSSS(BOYS) NAGROTA BAGWAN Dist. Kangra</option>
                  <option  value='408'  >GSSS PALAMPUR Dist. Kangra</option>
                  <option  value='501'  >GSSS RECKONG PEO Dist. Kinnaur</option>
                  <option  value='502'  >GSSS POOH Dist. Kinnaur</option>
                  <option  value='601'  >GSSS(Boys) KULLU Dist Kullu</option>
                  <option  value='602'  >GSSS(Boys) ANI Dist Kullu</option>
                  <option  value='603'  >GSSS(Girls)  SULTANPUR Dist Kullu</option>
                  <option  value='701'  >GSSS JAHALMAN Dist. Lahul and Spiti</option>
                  <option  value='702'  >GSSS KAZA Dist. Lahul and Spiti </option>
                  <option  value='703'  >GSSS KEYLONG Dist. Lahul and Spiti</option>
                  <option  value='801'  >GSSS(Boys)  MANDI Dist. Mandi</option>
                  <option  value='802'  >GSSS(Boys) SARKAGHAT Dist. Mandi</option>
                  <option  value='803'  >GSSS(Boys)  SUNDER NAGAR Dist. Mandi</option>
                  <option  value='804'  >GSSS KARSOG Dist. Mandi</option>
                  <option  value='805'  >GSSS(Girls)  MANDI Dist. Mandi</option>
                  <option  value='806'  >GSSS(Girls)  SARKAGHAT Dist. Mandi</option>
                  <option  value='807'  >GSSS(Girls) SUNDER NAGAR Dist. Mandi</option>
                  <option  value='808'  >GSSS PANDOH Dist. Mandi</option>
                  <option  value='809'  >GSSS CHAIL CHOWK Dist. Mandi</option>
                  <option  value='810'  >GSSS REWALSAR Dist. Mandi</option>
                  <option  value='811'  >KENDRIYA VIDYALYA, KHALIAR Dist. Mandi</option>
                  <option  value='901'  >GSSS(Boys)  RAMPUR Dist. Shimla</option>
                  <option  value='902'  >GSSS(Boys)  ROHRU Dist. Shimla</option>
                  <option  value='903'  >GSSS(Girls)  PORTMORE Dist. Shimla</option>
                  <option  value='904'  >GSSS(Girls) THEOG Dist. Shimla</option>
                  <option  value='905'  >GSSS CHHOTA SHIMLA Dist. Shimla</option>
                  <option  value='906'  >GSSS GHANAHATTI Dist. Shimla</option>
                  <option  value='907'  >GSSS CHOPAL Dist. Shimla</option>
                  <option  value='908'  >GSSS KUMARSAIN Dist. Shimla</option>
                  <option  value='909'  >GSSS SUNNI Dist. Shimla</option>
                </select>
                
            </div>
            <div class="form-group d-none">
              <input type="text" class="form-control" id="type" placeholder="type" name="type" value="<?php echo $type; ?>">
            </div>
          </div>
          <div class="col-sm-12">
              <p class="alert alert-primary" style="margin-top: 2.5%;" role="alert">
                Upload Photo (Upload Recent colored photo, Photo Size Maximum 200 px X 200 px (Upto 20 Kb) and Photo file format should be JPG only)
              </p>
            </div>
            <form action="applicationsubmit.php" method="post">
              Select image :
                        <input type="file" name="file" required><br><br>
                  <input type="submit" value="Submit" class="btn btn-dark" name="Submit1" style="width: 100%;">

            </form>
          
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