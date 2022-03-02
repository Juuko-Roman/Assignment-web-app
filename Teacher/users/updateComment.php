<?php
include('includes/config.php');
session_start();
$sql="select * from teacher where username='".$_SESSION['login']."'";
$query=mysqli_query($bd,$sql);
$row=mysqli_fetch_array($query);
$teacherID=$row['teacher_id'];

$name=$_POST['postname'];
$assgNo=$_POST['postage'];
$com=$_POST['postfeedback'];

$sqlquerry="UPDATE marks set comment='$com' where assignmentNo='$assgNo' AND pupil_userCode='$name' AND teacher_id='$teacherID' "; 
$query=mysqli_query($bd,$sqlquerry);
if($query){
	echo 1;
}
else
{
	echo 0;
}

	
?>

