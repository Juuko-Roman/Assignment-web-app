<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
   { 
 header('location:index.php');
 }
 
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>KDLsys | View Assignments</title>
  
  <link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/theme.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
  <script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
   
   
</head>
<body>
<section>
  

<section id="container">
  
<?php include('includes/header.php'); ?>
<?php include('includes/side-bar.php'); ?>





<section id="main-content">
          <section class="wrapper">
            <h3 style="text-align: center; color:red;"> <b><span style="color:red">WELCOME TO THE VIEW ASSIGNMENTS PAGE</span></b></h3>

            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Below is the list of Submitted Assignments</h4>
      <div class="span9">
          <div class="content">

  <div class="module">

              <div class="module-body table">
                  <br />
<?php
$sql="select * from teacher where username='".$_SESSION['login']."'";
$query=mysqli_query($bd,$sql);
$row=mysqli_fetch_array($query);
$teacherID=$row['teacher_id'];

 $query=mysqli_query($bd, "select * from assignment where teacher_id='$teacherID'");
while($row=mysqli_fetch_array($query))
{
  $assignmentNo=$row['assignmentNo'];
  $attemptDate=$row['attemptDate'];
  $date=date('Y-m-d');
if($attemptDate>$date){$status="Pending";}
else if($attemptDate<$date){$status="Expired";}
else $status="Open";

$sqlquerry="UPDATE assignment set assignment_status='$status' where teacher_id='$teacherID'AND assignmentNo='$assignmentNo' "; 
$query2=mysqli_query($bd,$sqlquerry);
  
}
?>
              
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" >
                  <thead>
                    <tr>
                      <th># &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th>Assignment<br> Number</th>
                      <th>Date<br> Uploaded</th>
                      <th>Number of <br>Characters</th>
                      <th>Characters<br> Submitted</th>
                      <th>Attempt Date</th>
                      <th>Start<br> Time</th>
                      <th>End<br> Time</th>
                      <th>Duration<br>(Minutes)</th>
                      <th>Status</th>
                      <th>ACTIONS</th>
                    
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($bd, "select * from assignment where teacher_id='$teacherID'");
$cnt1=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td><?php echo htmlentities($cnt1);?></td>                      
                      <td id="<?php echo $cnt1;?>"><?php echo htmlentities($row['assignmentNo']);?></td>
                      <td><?php echo htmlentities($row['dateUploaded']);?></td>
                      <td><?php echo htmlentities($row['noOfChars']);?></td>                                            
                      <td><?php echo htmlentities($row['Characters']);?></td>
                      <td><?php echo htmlentities($row['attemptDate']);?></td>
                      <td><?php echo htmlentities($row['start_time']);?></td>
                      <td><?php echo htmlentities($row['end_time']);?></td>
                      <td> <?php echo htmlentities($row['duration']);?></td>
                      <td> <?php echo htmlentities($row['assignment_status']);?></td>
                      <form action="editAssignment.php?n=<?php echo htmlentities($row['assignmentNo']);?>" method="POST">
                      <td>  
                       <input type="submit"  onClick="return assigEdit(<?php echo $cnt1;?>)" class="btn btn-primary" value="EDIT">
                       <button type="button" onClick="Delete(<?php echo $cnt1;?>)" class="btn btn-danger" >DELETE</button>
                      </td>
                      </form>
                      
                    <?php $cnt1=$cnt1+1; } ?>
                    
                </table>
                <script type="text/javascript" language="javascript">
                  function Delete(value){
          var feedback=confirm("Do you really want to Delete the selected assignment?");  


        if(feedback){
          var AssgNo=document.getElementById(value).innerHTML;
        

      $.post('deleteAssignment.php',{postAssg:AssgNo},
      function(data)
      {
        if (data==1) 
        {
          alert("Assignment deleted successfully");
          window.location="viewAssignments.php";          
        }
        if(data==0)
        {
          alert("Error! Assignment not Deleted")
        }                 
      });
        }
        

}

      function assigEdit(value){
          var feedback=confirm("Do you really want to edit the selected assignment?");  


        if(feedback){
          return true;
        }
        else
        {
          return false;
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

</div>
                          </div>
                          </div>



          </section>
</section>

  <?php include('includes/footer.php'); ?>    


</section>

    
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