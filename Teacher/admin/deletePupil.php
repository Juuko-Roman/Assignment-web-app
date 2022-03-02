<?php
include('include/config.php');
$usercode=$_POST['postcode'];
$sql="DELETE FROM pupil where usercode='$usercode'";
$query=mysqli_query($bd,$sql);

if($query){
	echo 1;
}
else
{
	echo 0;
}

	
?>

