<?php
include('include/config.php');
$userName=$_POST['postID'];
$sql="DELETE FROM teacher where username='$userName'";
$query=mysqli_query($bd,$sql);

if($query){
	echo 1;
}
else
{
	echo 0;
}

	
?>

