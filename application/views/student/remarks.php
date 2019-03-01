<!DOCTYPE html> 
<html> 
   <head> 
      <title>Project Remarks</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url();?>images/PES.png"/> 
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>js/validate.js"></script>
   </head> 
   <body> 
      <div class="container"> 
        <div class="page-header"> 
         <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%;">
         <div class="row">
            <div class="col-sm-10">
              <div class="row">
                <ul class="nav nav-tabs"> 
                  <li><a href="<?php echo base_url();?>student/student_general">General</a></li>
                  <li><a href="<?php echo base_url();?>student/project_panel">Project</a></li> 
                  <li><a href="<?php echo base_url();?>student/project_status">Status</a></li>
                  <li class="active"><a href="#">Remarks</a></li>
                  <li><a href="<?php echo base_url();?>student/uploads">Uploads</a></li>
                  <li><a href="<?php echo base_url();?>student/student_change">Change Password</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-2">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url();?>student/student_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </div>
            <h1><small style="background-color: white;">Remarks</small></h1>
          </div> 
          <table class="table" style="border:solid #ff7733 1px">
          <div class="row" style="border: solid #ff7733 1px;margin: 0px; background-color: #ff7733">
            <div class="col-sm-7">
              <h5><label><u>Remarks:</u></label></h5>
                <?php
                  if (!empty($s1)) 
                  {
                    echo"<tr><td><label>Evaluation 1:</label><p>".$s1[0]->remarks."</p></td></tr>";
                  }
                  if (!empty($s2)) 
                  {
                    echo"<tr><td><label>Evaluation 2:</label><p>".$s2[0]->remarks."</p></td></tr>";
                  }
                  if (!empty($s3)) 
                  {
                    echo"<tr><td><label>Evaluation 3:</label><p>".$s3[0]->remarks."</p></td></tr>";
                  }
                  if (!empty($s4)) 
                  {
                    echo"<tr><td><label>Evaluation 4:</label><p>".$s4[0]->remarks."</p></td></tr>";
                  }
                  if (!empty($s5)) 
                  {
                    echo"<tr><td><label>Evaluation 5:</label><p>".$s5[0]->remarks."</p></td></tr>";
                  }
                ?>
            </div>
          </div>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>