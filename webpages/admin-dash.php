<!DOCTYPE html>
<html lang="en">
<head>
<script>
$(document).ready(function(){

$("#generate").on('click', function(){

    $.ajax({
        type : "POST",
        url : "generate-admitcard.php",
        success : function(text){
            alert(text);
        }
    });
    return false;
}); 

});
</script>
</head>
<?php 
session_start();

$config = include('../config.php');
// establishing connection
$conn = new mysqli($config['host'],$config['username'],$config['password'],$config['dbname']);
if ($conn->connect_errno) {
    die("Failed to connect ot DB");
}

$status_obj[2] = 'Applications received (waiting to be processed) : ';
$status_obj[3] = 'Final Applications (Admit Card generated) : ';

$status = $_GET['status'];
if(!isset($status)){
	header("Location: admin-dash.php?status=2");
    die();
}

$year = date("Y");
$type = $_SESSION['type'];
$email = $_SESSION['email'];

if($type != 'admin'){
	header("Location: index.php");
    die();
}

$sql = "SELECT T2.submitted_at AS submitted_at, T1.ntseid AS ntseID, T1.schoolRegNo AS schoolID,T1.firstname AS fName,T1.lastname AS lName FROM Students_$year AS T1 INNER JOIN Students_Application_$year AS T2 ON T1.email=T2.email AND T2.status=$status ORDER BY T2.submitted_at ASC";

?>


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- bootstrap css -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/school.css">
  <title>HP STSE</title>
</head>
<body>
	<?php include 'header.php'; ?>

	<div class="text-center">
		<div class="dropdown status">
			<button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Application Status
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="admin-dash.php?status=2">Pending Admit Card Generation</a>
				<a class="dropdown-item" href="admin-dash.php?status=3">Final Applicants (Admit Card generated)</a>
			</div>
		</div>
	</div>

	<div class="text-center custom">
		<?php
			echo $status_obj[$status];
			if ($result = $conn->query($sql)) {
				echo $result->num_rows;
			}
		?>
	</div>
    <?php
        if ($status == 2)
        {
            echo "<div class='text-center'>";
                // echo "<input type='button' class=\"btn btn-success\" value='Generate Admit Card' id='generate'>";
                echo '<form action="generate-admitcard.php" method="post">';
                    echo '<input type="submit" class="btn btn-success" value="Generate Admit Card">';
                echo '</form>';
            echo "</div>";
            echo "<br>";
        }
    ?>
	<table class="table table-striped" >
	  <thead class="thead-dark">
	    <tr>
	      <th>NTSE ID(Reg No.)</th>
	      <th>School ID(Reg No.)</th>
	      <th>Name</th>
	      <th>Form</th>
	    </tr>
	  </thead>
	  <tbody>
        <?php 
	    	if ($result) {
			    while($row = $result->fetch_assoc()){
			    	echo "<tr>";
			    		echo "<td>";
							echo $row['ntseID'];
						echo "</td>";
						echo "<td>";
							echo $row['schoolID'];
						echo "</td>";
						echo "<td>";
							echo $row['fName'].' '.$row['lName'];
			    		echo "</td>";
			    		echo "<td>";
			    			echo "<a href='application-view.php?ntseid=".$row['ntseID']."'>link</a>";
			    		echo "</td>";
			    	echo "</tr>";
			    }
			    $result->free_result();
			}
	     ?>
	  </tbody>
	</table>


	<?php include 'footer.php'; $conn->close(); ?>
</body>
<!-- scripts for bootstrap -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>