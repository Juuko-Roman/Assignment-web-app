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

if(isset($_POST['submit']))
{
  $firstname=$_POST['fName'];
  $lastname=$_POST['lName'];
  $phone=$_POST['phoneNo'];

$sqlquerry="UPDATE teacher set firstName='$firstname', lastName='$lastname', phoneNo='$phone' where teacher_id='".$_GET['n']."'";
if(mysqli_query($bd,$sqlquerry))
{
  $_SESSION['msg']="Changes Successfully made";
}
else
{
  $_SESSION['msg']="An error occured, changes not saved!";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin| Change Password</title>
  <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link type="text/css" href="css/theme.css" rel="stylesheet">
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
  <link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
  <script type="text/javascript">
function valid()
{
if(document.pwdVerify.password.value=="")
{
 if(document.pwdVerify.password.value!= document.pwdVerify.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.pwdVerify.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>
<?php include('include/header.php');?>

  <div class="wrapper">
    <div class="container" style="width: 100%;" >
      <div class="row" style="margin-left:5px;width: 100%; ">
<?php include('include/sidebar.php');?>       
      <div class="span11" style="margin-left:3px; >
          <div class="content">

            <div class="module">
              <div class="module-head">
                <h3 style="text-align: center;">Admin - Enter Teacher's details to be changed below</h3>
              </div>
              <div class="module-body">

                  <?php if(isset($_POST['submit']))
{?>
                  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
                  </div>
<?php } ?>
                  <br />

      <form class="form-horizontal row-fluid" name="pwdVerify" method="post" onSubmit="return valid();">
          <?php 
          $query=mysqli_query($bd, "select * from teacher where teacher_id='".$_GET['n']."'");

          $row=mysqli_fetch_array($query)
          ?>                
<div class="control-group">
<label class="control-label" for="basicinput">First Name</label>
<div class="controls">
<input type="text" placeholder="<?php echo htmlentities($row['firstName']);?>"  name="fName" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Last Name</label>
<div class="controls">
<input type="text" placeholder="<?php echo htmlentities($row['lastName']);?>"  name="lName" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">Phone No:</label>
<div class="controls">
<input type="tel" placeholder="<?php echo htmlentities($row['phoneNo']);?>"  name="phoneNo" class="span8 tip" required>
</div>
</div>

<div class="control-group">
<label class="control-label" for="basicinput">User Name</label>
<div class="controls">
<input type="text" placeholder="<?php echo htmlentities($row['username']);?>"  name="userName" class="span8 tip" readonly>
</div>
</div>




                    <div class="control-group" style="margin-left:13%">
                      <div class="controls">
                        <button type="submit" name="submit" class="btn btn-primary">Click to Submit made changes</button>
                      </div>
                    </div>
                  </form>
              </div>
            </div>

            
            
          </div><!--/.content-->
        </div><!--/.span9-->
      </div>
    </div><!--/.container-->
    <div style="margin-top:8%"></div>
  </div><!--/.wrapper-->

<?php include('include/footer.php');?>

  <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
</body>
<?php } ?>