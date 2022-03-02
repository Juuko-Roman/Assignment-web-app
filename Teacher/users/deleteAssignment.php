<?php
include('includes/config.php');
$assgNo=$_POST['postAssg'];
$sql="DELETE FROM assignment where assignmentNo='$assgNo'";
$query=mysqli_query($bd,$sql);

if($query){
	echo 1;
}
else
{
	echo 0;
}

	
?>

