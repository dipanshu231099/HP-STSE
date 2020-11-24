<?php

if(isset($_POST['Submit1']))
{ 

$extension = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
$name = "gandubhai";
move_uploaded_file($_FILES["file"]["tmp_name"],"uploads/".$name."."."jpg");

}
?>

