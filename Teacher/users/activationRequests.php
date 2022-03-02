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
</head>
<body>
<section>
  

<section id="container">
  
<?php include('includes/header.php'); ?>
<?php include('includes/side-bar.php'); ?>





<section id="main-content">
          <section class="wrapper">
            <h3 style="text-align: center;"> <b><span style="color:red;">WELCOME TO THE ACTIVATION REQUESTS </span></b></h3>

            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i>Below is the list of Deactivated pupils</h4>
      <div class="span9">
          <div class="content">

  <div class="module">

              <div class="module-body table">
                  <br />

              
                <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped  display" >
                  <thead>
                    <tr>
                      <th>#&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                      <th>USER CODE</th>
                      <th>LAST NAME</th>
                      <th>FIRST NAME</th>
                      <th>ACTIVATION REQUEST</th>                    
                      <th>ACTIONS</th>                    
                    </tr>
                  </thead>
                  <tbody>

<?php $query=mysqli_query($bd, "select * from pupil inner join activation_request on pupil.userCode=activation_request.pupil_userCode");
$cnt1=1;
while($row=mysqli_fetch_array($query))
{
?>                  
                    <tr>
                      <td><?php echo htmlentities($cnt1);?></td>
                      <td id="n<?php echo $cnt1;?>"><?php echo htmlentities($row['userCode']);?></td>
                      <td><?php echo htmlentities($row['lName']);?></td>
                      <td><?php echo htmlentities($row['fName']);?></td>
                      <td><?php echo htmlentities($row['request']);?></td>                                         

                      <?php if($row['Status']=="Active")
                      {?>
                      <td>  
                       <button type="button" id="<?php echo $cnt1;?>" onClick="Deactivate(<?php echo $cnt1;?>)" class="btn btn-danger" >Deactivate</button>
                      </td>
                      <?php }?>
                      <?php if($row['Status']=="Deactivated")
                      {?>
                      <td>  
                       <button type="button" id="<?php echo $cnt1;?>" onClick="Deactivate(<?php echo $cnt1;?>)" class="btn btn-primary" >ACTIVATE</button>
                      </td>
                      <?php }?>
                      
                    <?php $cnt1=$cnt1+1; } ?>
                    
                </table>
                <script type="text/javascript" language="javascript">
         function Deactivate(value){
          var ID="n"+value;
          var usercode=document.getElementById(ID).innerHTML;

          var btn=document.getElementById(value);
          
          if (btn.innerHTML=="ACTIVATE")
          {
            var feedback=confirm("Do you really want to Activate the selected Pupil?");  
            if(feedback)
            {

              var status="Active";
        

              $.post('ActivatePupil.php',{postcode:usercode,poststatus:status},
              function(data)
              {
                if (data==1) 
                {
                  

                  alert("Pupil Activated successfully");
                  window.location="activationRequests.php";
                  
                }
                if(data==0)
                {
                  alert("Error! Pupil not Activated")
                }         
                
              });
            }
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