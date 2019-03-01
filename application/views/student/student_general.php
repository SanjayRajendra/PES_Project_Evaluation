<?php
$r=$records1[0];
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>General</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
    <link rel="icon" href="<?php echo base_url();?>images/PES.png"/> 
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/validate.js"></script>
    <style>
          tr td:first-child
          {
            font-weight: bold;
            width: 15%;
          }
          tr td:nth-child(2)
          {
            width: 35%;
          }
          tr td:nth-child(3)
          {
            width: 15%;
            font-weight: bold;
          }
          tr td:nth-child(4)
          {
            width: 35%;
          }
        </style>

</head> 
<body onload="load();"> 
<div class="container"> 
    <div class="page-header"> 
      <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
      <div class="row">
          <div class="col-sm-10">
            <div class="row">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#">General</a></li>
                <li><a href="<?php echo base_url();?>student/project_panel">Project</a></li> 
                <li><a href="<?php echo base_url();?>student/project_status">Status</a></li>
                <li><a href="<?php echo base_url();?>student/remarks">Remarks</a></li>
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
      </div>
            <h1><small>Personal Details</small></h1>
          </div>
  <div class="panel panel-danger" style="border: solid #ff7733 1px;">
      <div class="panel-heading" style="background-color: #ff7733;color: white;"><h4><b>SRN : </b><?php echo " $r->srn"?></h4></div>
      <div class="panel-body">
      	<table class="table">
		<tr><td> Name :</td><td> <?php echo "$r->fname " ."$r->mname ". "$r->lname" ?></td><td><td></td></td></tr>
		<tr><td> SRN : </td><td><?php echo " $r->srn"?></td><td></td><td></td></tr>
		<tr><td> Program :</td><td> <?php echo " $r->program"?></td>
		<td> Branch :</td><td> <?php echo " $r->branch"?></td></tr>
		<tr><td> Section :</td><td> <?php echo " $r->section"?></td>
    <td> Year :</td><td> <?php echo " $r->year"?></td></tr>
    <tr><td> Email :</td><td> <?php echo " $r->email"?></td>
    <td> Contact Number :</td><td> <?php echo " $r->phoneno"?></td></tr>
    </table>
    <hr>
    <?php
    
    if(!empty($records2))
    {
       echo"<h4>Project Details :</h4>
          <table class='table'>";
      $v=$records2[0];
      echo "
      <tr>
      <td>Project Name:</td>
      <td>".$v->name."</td></tr>
      <tr><td>Project ID:</td>
      <td>".$v->id."</td></tr>
      <tr><td>Project Guide:</td>
      <td>".$v->fname. " ".$v->mname. " ".$v->lname."</td></tr>
      </tr></table>";
    }
    ?>
    <?php
  $i=1;
    if(!empty($records3))
    {
      echo"<h4>Team Members :</h4>
  <table class='table'>";
      foreach ($records3 as $value) {
        echo "<tr><td>".$i++."</td><td>".$value->fname. " ".$value->mname. " ".$value->lname."</td></tr>";
      }
    }

    ?>
    	</table> 

     </div>
    </div>
      </div>
   </body> 
</html> 
