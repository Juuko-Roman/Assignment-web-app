
<!-- this is side bar -->
<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                   <?php $query=mysqli_query($bd, "select firstName,lastName from teacher where username='".$_SESSION['login']."'");
 while($row=mysqli_fetch_array($query)) 
 {
 ?> 
                  <h5 class="centered"><?php echo htmlentities($row['firstName'])." ".htmlentities($row['lastName']) ;?></h5>
                  <?php } ?>
                    
                  <li class="mt">
          
                          <i class=""></i>
                          <span style="color: white; margin-left: 50px; font-size: 18px;" ><b>MENU</b></span>
                      
                  </li>

      <style>.com{text-align: center;} </style>
        <hr>

                  <li class="sub-menu">
                      <a href="Register-pupil.php" >
                          <i class="fa fa-book"></i>
                          <span>Register pupil</span>
                      </a>
                    
                  </li>
                            <style>.com{text-align: center;} </style>
                  <hr>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Assignments</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="viewAssignments.php">View All</a></li>
                          <li><a  href="newAssignment.php">Add new assignment</a></li>
                        
                      </ul>
                  </li>
                  <style>.com{text-align: center;} </style>
        <hr>


                  <li class="sub-menu">
                      <a href="view-pupil.php" >
                          <i class="fa fa-book"></i>
                          <span>View pupil</span>
                      </a>
                    
                  </li>
                  <style>.com{text-align: center;} </style>
        <hr>



                  <li class="sub-menu">
                      <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="scores.php">Pupils Marks</a></li>                        
                      </ul>
                  </li>
                  <style>.com{text-align: center;} </style>
        <hr>


                  <li class="sub-menu">
                      <a href="change-password.php" >
                          <i class="fa fa-cogs"></i>
                          <span>Change password</span>
                      </a>
                    
                  </li>
                  <style>.com{text-align: center;} </style>
        <hr>

                 
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside> 
</section>
