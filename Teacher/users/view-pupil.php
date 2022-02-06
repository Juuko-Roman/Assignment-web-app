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
  <title>KDLsys | View Pupils</title>
    <link href="assets/css/theme.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">


    <script type="text/javascript" language="javascript">
function Deactivate(value1){
  var statusid="n"+value1;
  var btn= document.getElementById(value1);
  var status=document.getElementById(statusid);
  if(btn.innerHTML==="Deactivate")
  {
    var feedback=confirm("Are you sure you need to Deactivate this pupil?");
    if (feedback) {
      btn.innerHTML="Activate";
    btn.style.backgroundColor="red";
    status.innerHTML="Deactivated";
    }
  }
  else
  {
    var feedback=confirm("Are  you sure you need to Activate this pupil?");
    if (feedback) {
      btn.innerHTML="Deactivate";
      btn.style.backgroundColor="#428bca";
      status.innerHTML="Active";
    }

    
  }
}


    </script>
</head>
<body>
<section>
  

<section id="container">
  
<?php include('includes/header.php'); ?>
<?php include('includes/side-bar.php'); ?>





<section id="main-content">
          <section class="wrapper">
            <h3 style="text-align: center; color:red;"> <b>WELCOME TO THE VIEW PUPIL PAGE</b></h3>

            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Below is the list of registered pupils</h4>
      <div class="span9">
          <div class="content">

  <div class="module">

              <div class="module-body table">
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
                      <td><?php echo htmlentities($row['userCode']);?></td>
                      <td><?php echo htmlentities($row['lName']);?></td>
                      <td><?php echo htmlentities($row['fName']);?></td>
                      <td><?php echo htmlentities($row['Sex']);?></td>
                      <td> <?php echo htmlentities($row['phone_number']);?></td>
                      <td id="n<?php echo $cnt1;?>"> <?php echo htmlentities($row['Status']);?></td>
                      <td>  
                       <button type="button" id="<?php echo $cnt1;?>" onClick="Deactivate(<?php echo $cnt1;?>)" class="btn btn-primary" >Deactivate</button>
                      </td>
                      
                    <?php $cnt1=$cnt1+1; } ?>
                    
                </table>
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