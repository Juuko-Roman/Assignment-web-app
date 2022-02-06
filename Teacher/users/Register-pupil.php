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
$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$phoneNo=$_POST['phoneNo'];
$usercode=$_POST['usercode'];
if(!empty($_POST['sex'])) {$sex=$_POST['sex'];}
$sqlquerry="INSERT INTO pupil(userCode,lName,fName,Sex,phone_number,regDate) 
VALUES ('$usercode','$firstname','$lastname','$sex','$phoneNo','currentTime')";
if(mysqli_query($bd,$sqlquerry))
  { 
    $successmsg="Student registered Successfully";
  }
  else
  {
    $errormsg="Something went wrong. Student not registered!!!";
  }
}
 ?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>KDLsys | Register Pupil</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<section>
  
  


<section id="container" >
  
<?php include('includes/header.php'); ?>
<?php include('includes/side-bar.php'); ?>

      <section id="main-content">
          <section class="wrapper">
            <h3 style="text-align: center; color:red;"> <b>WELCOME TO THE REGISTER PUPIL PAGE</b></h3>
            
            <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Enter Student details as indicated below</h4>

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
                      <b>Oh snap!</b> </b> <?php echo htmlentities($errormsg);?></div>
                      <?php }?>


                      <form class="form-horizontal style-form" method="post" name="studentDetails" onSubmit="return valid();">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">First Name</label>
                              <div class="col-sm-10">
                                  <input type="text" name="firstname" placeholder="Student's first name" required="required" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10">
                                  <input type="text" name="lastname" required="required"placeholder="Student's last name" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Sex</label>
                              <div class="col-sm-2">
                                  <input type="radio" name="sex" value="Male" required="required" style="height: 17px; width: 17px;"  >
                                  <label class="control-label">Male</label>
                              </div>
                              <div class="col-sm-2">
                                  <input type="radio" name="sex" value="Female" required="required"  style="height: 17px; width: 17px;">
                                  <label class="control-label">Female</label>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Phone Number</label>
                              <div class="col-sm-10">
                                  <input type="tel" name="phoneNo" required="required" placeholder="Phone number eg 07xxxxxxxx " class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Code</label>
                              <div class="col-sm-10">
                                  <input type="text" name="usercode" required="required" placeholder="eg A100" class="form-control">
                              </div>
                          </div>

                          
                          <div class="form-group">
                           <div class="col-sm-10" style="padding-left:25% ">
                              <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>
                          </div>

                          </form>
                          </div>
                          </div>
                          </div>
                          
            
            
    </section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->
      

<div style="margin-top: 6%"></div>
  <?php include('includes/footer.php'); ?>    


</section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>


    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

</body>
</html>
<?php } ?>