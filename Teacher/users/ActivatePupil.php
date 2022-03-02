<?php
include('includes/config.php');
session_start();
$usercode=$_POST['postcode'];
$status=$_POST['poststatus'];
$sql="UPDATE  pupil set Status='$status' where userCode='$usercode'";
$query=mysqli_query($bd,$sql);

$sql2="DELETE FROM activation_request WHERE pupil_userCode='$usercode'";
$query2=mysqli_query($bd,$sql2);

if($query&&$query2){
	echo 1;
}
else
{
	echo 0;
}

	
?>

