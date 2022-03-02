<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
date_default_timezone_set('Africa/Kampala');
$currentTime = date( 'd-m-Y h:i:s A', time () );


if(isset($_POST['submit']))
{
  $firstname=$_POST['fName'];
  $lastname=$_POST['lName'];
  if(!empty($_POST['sex'])) {$sex=$_POST['sex'];}
  $phone=$_POST['phoneNo'];

$sqlquerry="UPDATE pupil set fName='$firstname', lName='$lastname', Sex='$sex', phone_number='$phone' where userCode='".$_GET['n']."'";
if(mysqli_query($bd,$sqlquerry))
{
  $successmsg="Changes Successfully made";
}
else
{
  $errormsg="An error occured, changes not saved!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>KDLsys | Submit assignment</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  
  </head>

  <body>

  <section id="container" >
     <?php include("includes/header.php");?>
      <?php include("includes/side-bar.php");?>
      <section id="main-content">
          <section class="wrapper">
            <h3 style="text-align: center; color:red;"> <b>WELCOME TO EDIT PUPIL DETAILS PAGE</b></h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                    

                      <?php if($successmsg)
                      {?>
                      <div class="alert alert-success alert-dismissable">
                       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Well done!</b> <?php echo htmlentities($successmsg);?></div>
                      <?php }?>

   <?php if($errormsg)
                      {?>
                      <div class="alert alert-danger alert-dismissable">
 <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      <b>Oops! </b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>
                     

  <h4 class="mb">Change pupil details as indicated below</h4>
    
                      <form class="form-horizontal style-form" method="post" name="profile" >
                        <?php 
                        $query=mysqli_query($bd, "select * from pupil where userCode='".$_GET['n']."'");

                        $row=mysqli_fetch_array($query)
                        ?>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">FIRST NAME:</label>
<div class="col-sm-4">
<input type="text" name="fName" required="required" class="form-control"  placeholder="<?php echo htmlentities($row['fName']);?>" >
 </div>
<label class="col-sm-2 col-sm-2 control-label">LAST NAME:  </label>
 <div class="col-sm-4">
<input type="text" name="lName" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['lName']);?>" >
</div>
 </div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">GENDER</label>
<div class="col-sm-2">
<input type="radio" name="sex" value="Male" required="required" style="height: 17px; width: 17px;" <?php if($row['Sex']=="male"){?> checked<?php }?> >
<label class="control-label">Male</label>
</div>
<div class="col-sm-2">
<input type="radio" name="sex" value="Female" required="required"  style="height: 17px; width: 17px;"<?php if($row['Sex']=="female"){?> echo checked<?php }?>>
<label class="control-label">Female</label>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">PHONE NUMBER:</label>
 <div class="col-sm-4">
<input type="tel" name="phoneNo" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['phone_number']);?>">
</div>
<label class="col-sm-2 col-sm-2 control-label">REGISTRATION DATE: </label>
<div class="col-sm-4">
<input type="text"   name="gender" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['regDate']);?>" readonly>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">USER CODE: </label>
<div class="col-sm-4">
<input type="text" name="usercode" class="form-control" placeholder="<?php echo htmlentities($row['userCode']);?>"readonly>
</div>
<label class="col-sm-2 col-sm-2 control-label">STATUS: </label>
<div class="col-sm-4">
<input type="text" name="status" class="form-control" placeholder="<?php echo htmlentities($row['Status']);?>"readonly>
</div>
</div>
                       <div class="form-group" style="margin-left:20%">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit Changes</button>
</div>
</div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
            
            
    </section>
      </section>
    <?php include("includes/footer.php");?>
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <!--script for this page-->
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom switch-->
  <script src="assets/js/bootstrap-switch.js"></script>
  
  <!--custom tagsinput-->
  <script src="assets/js/jquery.tagsinput.js"></script>
  
  <!--custom checkbox & radio-->
  
  <script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>
  
  <script type="text/javascript" src="assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  
  
  <script src="assets/js/form-component.js"></script>    
    
    
  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>
