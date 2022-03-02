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
  $noChars=$_POST['noChars'];
  $Chars=$_POST['chars'];
  $startTime=$_POST['startTime'];
  $endTime=$_POST['endTime'];
  $attemptDate=date('Y-m-d',strtotime($_POST['attemptDate']));

  $date=date('Y-m-d');
if($attemptDate>$date){$status="Pending";}
else if($attemptDate<$date){$status="Expired";}
else $status="Open";

$date1=strtotime($endTime);
$date2=strtotime($startTime);
$duration=($date1-$date2)/60;

$sqlquerry="UPDATE assignment set noOfChars='$noChars', Characters='$Chars', attemptDate='$attemptDate', start_time='$startTime', end_time='$endTime', assignment_status='$status', duration='$duration' where assignmentNo='".$_GET['n']."'";
if(mysqli_query($bd,$sqlquerry))
{
  $successmsg="Assignment submitted Successfully!";
}
else
{
  $errormsg="Assignment not submitted!";
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
            <h3 style="text-align: center; color:red;"> <b>WELCOME TO EDIT ASSIGNMENT PAGE</b></h3>
            
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
                     

  <h4 class="mb">Enter assignment details as indicated below</h4>
    
                      <form class="form-horizontal style-form" method="post" name="profile" >
                        <?php 
                        $query=mysqli_query($bd, "select * from assignment where assignmentNo='".$_GET['n']."'");

                        $row=mysqli_fetch_array($query)
                        ?>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Number of characters:</label>
<div class="col-sm-4">
<input type="number" name="noChars" required="required" class="form-control" min="1" max="8" placeholder="<?php echo htmlentities($row['noOfChars']);?>" >
 </div>
<label class="col-sm-2 col-sm-2 control-label">characters:  </label>
 <div class="col-sm-4">
<input type="text" name="chars" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['Characters']);?>" >
</div>
 </div>


<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">Date of Attempt:</label>
 <div class="col-sm-4">
<input type="date" name="attemptDate" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['attemptDate']);?>">
</div>
<label class="col-sm-2 col-sm-2 control-label">Start time: </label>
<div class="col-sm-4">
<input type="time"   name="startTime" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['start_time']);?>">
</div>
</div>

<div class="form-group">
<label class="col-sm-2 col-sm-2 control-label">End time: </label>
<div class="col-sm-4">
<input type="time" name="endTime" required="required"  class="form-control" placeholder="<?php echo htmlentities($row['end_time']);?>">
</div>
</div>
                       <div class="form-group" style="margin-left:20%">
                           <div class="col-sm-10" style="padding-left:25% ">
<button type="submit" name="submit" class="btn btn-primary">Submit Edited Assignment</button>
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
