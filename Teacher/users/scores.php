<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
   { 
 header('location:index.php');
 }

 $sql="select * from teacher where username='".$_SESSION['login']."'";
$query=mysqli_query($bd,$sql);
$row=mysqli_fetch_array($query);
$teacherID=$row['teacher_id'];
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>KDLsys | Reports</title>
  
    <link href="assets/css/theme.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
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
            <h3 style="text-align: center;"><b><span style="color:red;">PUPILS' SCORES</span></b></h3>

            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Below is the list of student results from the attempted assignments</h4>
      <div class="span9">
          <div class="content">

  <div class="module">

              <div class="module-body table">
                  <br />

              
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" >
                  <thead>
                    <tr>
                      <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>                      
                      <th>FULL NAME</th>
                      <th>ASSIGNMENT NUMBER</th>
                      <th>CHARACTERS SUBMITTED</th>
                      <th>MARKS SCORED</th>
                      <th>ATTEMPT DURATION</th>
                      <th>TEACHER'S COMMENT</th>
                      <th>ACTION</th>
                    
                    </tr>
                  </thead>
                  <tbody>

<?php 
$sql="select * from teacher where username='".$_SESSION['login']."'";
$query=mysqli_query($bd,$sql);
$row=mysqli_fetch_array($query);
$teacherID=$row['teacher_id'];

$query=mysqli_query($bd, "select * from pupil inner join marks on marks.pupil_userCode=pupil.userCode inner join assignment on assignment.assignmentNo=marks.assignmentNo where assignment.teacher_id='$teacherID'");
// $query1=mysqli_query($bd, "select * from assignment");
// $query2=mysqli_query($bd, "select * from attempt");
//$query3=mysqli_query($bd, "select * from marks");
$cnt1=1;
for(;$row=mysqli_fetch_array($query);)/*$row1=mysqli_fetch_array($query1),$row2=mysqli_fetch_array($query2),$row3=mysqli_fetch_array($query3);)*/
{
?>                  
                    <tr>
                      <input id="n<?php echo $cnt1;?>" type="hidden" name="usercode" value="<?php echo htmlentities($row['userCode']);?>">
                      <td><?php echo htmlentities($cnt1);?></td>
                      <td><?php echo htmlentities($row['lName'])." ".htmlentities($row['fName']);?></td>
                      <td id="m<?php echo $cnt1;?>"><?php echo htmlentities($row['assignmentNo']);?></td>                      
                      <td><?php echo htmlentities($row['Characters']);?></td>
                      <td> <?php echo htmlentities($row['score']);?></td>                      
                      <td><?php echo htmlentities($row['duration']);?></td>
                      <td ><?php echo htmlentities($row['comment']);?></td>
                      <td>  
                       <button type="button" id="<?php echo $cnt1;?>" onClick="Comment(<?php echo $cnt1;?>)" class="btn btn-primary" >Click to comment</button>
                      </td>
                      
                    <?php $cnt1=$cnt1+1; } ?>
                    
                </table>

    <script type="text/javascript" language="javascript">
      function Comment(value1){
        userAcceptance=confirm("Do you really want to change this comment?")
          if(userAcceptance)
          {
            var feedback=prompt("Write your comment in the space below");
            if(feedback)
            {
              var usercodeID="n"+value1;
              var assgID="m"+value1;

              
              var usercode=document.getElementById(usercodeID).value;
              var assgNo=document.getElementById(assgID).innerHTML;              

              $.post('updateComment.php',{postname:usercode,postage:assgNo,postfeedback:feedback},
              function(data)
              {

                if (data==1) 
                {

                  alert("Comment updated successfully");
                  window.location="scores.php";
                  
                }
                if(data==0)
                {
                  alert("sorry something went wrong!");
                  window.location="scores.php";
                }         
                
              });          

            }
          }
}
    </script>                            
          </div><!--/.content-->
        </div><!--/.span9-->
      </div>
    </div><!--/.container-->
  </div><!--/.wrapper-->

</div>
                          </div>
                          </div>



          </section>
</section>

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
</html>