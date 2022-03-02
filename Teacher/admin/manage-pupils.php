
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
date_default_timezone_set('Asia/Kolkata');// change according timezone
$currentTime = date( 'd-m-Y h:i:s A', time () );


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Manage Teachers</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
		
</head>
<body>

<?php include('include/header.php');?>

	<div class="wrapper" >
		<div class="container" style="width: 100%;" >
			<div class="row" style="margin-left:5px;width: 100%; ">
<?php include('include/sidebar.php');?>				
			<div class="span11" style="margin-left:3px; >
					<div class="content">

	<div class="module">
							<div class="module-head">
								<h3 style="text-align: center;">Manage Teachers</h3>
							</div>
							<div class="module-body table">
	<?php if(isset($_GET['del']))
{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
									<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
<?php } ?>

									<br />

							
								<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" >
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>USER CODE</th>
                      <th>LAST NAME</th>
                      <th>FIRST NAME</th>
                      <th>GENDER</th>
                      <th>PHONE NUMBER</th>
                      <th>PUPIL STATUS</th>
                      <th>REGISTRATON DATE</th>
                      <th>ACTION</th>
                    
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($bd, "select * from pupil");
$cnt1=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td><?php echo htmlentities($cnt1);?></td>
                      <td id="<?php echo $cnt1;?>"><?php echo htmlentities($row['userCode']);?></td>
                      <td ><?php echo htmlentities($row['lName']);?></td>
                      <td><?php echo htmlentities($row['fName']);?></td>
                      <td><?php echo htmlentities($row['Sex']);?></td>
                      <td> <?php echo htmlentities($row['phone_number']);?></td>
                      <td id="n<?php echo $cnt1;?>"> <?php echo htmlentities($row['Status']);?></td>
                      <td> <?php echo htmlentities($row['regDate']);?></td>                      
                      <td>  
                       <button type="button" onClick="Delete(<?php echo $cnt1;?>)" class="btn btn-danger" >DELETE</button>
                      </td>
                      
                    <?php $cnt1=$cnt1+1; } ?>
                    
                </table>
                <script type="text/javascript" language="javascript">
      function Delete(value){
          var feedback=confirm("Do you really want to Delete the selected Pupil?");  


        if(feedback){
          var usercode=document.getElementById(value).innerHTML;
			

			$.post('deletePupil.php',{postcode:usercode},
			function(data)
			{

				if (data==1) 
				{

					alert("Pupil deleted successfully");
					window.location="manage-pupils.php";
					
				}
				if(data==0)
				{
					alert("Error! Pupil not Deleted")
				}					
				
			});
        }
        

}
</script>       
							</div>
						</div>						

						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>