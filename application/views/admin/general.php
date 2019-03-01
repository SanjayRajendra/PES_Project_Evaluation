<?php
if(isset($_POST['max_faculty']))
{
   echo $msg;
}
?>
<!DOCTYPE html> 
<html> 
<head> 
    <title>Admin General</title>  
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
    <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="page-header"> 
        <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
        <div class="row">
            <div class="col-sm-10">
              <ul class="nav nav-tabs"> 
                  <li class="active"><a href="#">General</a></li> 
                  <li><a href="<?php echo base_url();?>admin/student_details">Student</a></li> 
                  <li><a href="<?php echo base_url();?>admin/faculty_details">Faculty</a></li> 
                  <li><a href="<?php echo base_url();?>admin/faculty_panel">Panels</a></li>
                  <li><a href="<?php echo base_url();?>admin/projects">Projects</a></li>
                  <li><a href="<?php echo base_url();?>admin/prints">Prints</a></li>
              </ul>
            </div>
            <div class="col-sm-2">
              <ul class="nav nav-tabs">
                  <li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </div>
        </div>
        <br>
        <a href="<?php echo base_url();?>admin/new_admin">Admins</a> | 
<a href="<?php echo base_url();?>admin/admin_change">Change Password</a>
        <h1><small style="background-color: white;">Project Details</small></h1>
    </div>

    <?php 
    if(empty($records))
    {
        echo form_open_multipart('admin/update_project_details',array('class' =>'form-horizontal'));
        echo"
    <div class='form-group'>
        <h5><label class='control-label col-sm-5'>Maximum number of students per group : </label></h5>
        <div class='col-sm-2'>
              <input type='text' name='max_student' class='form-control input-sm' required>
        </div>
    </div>
    <div class='form-group'>
        <h5><label class='control-label col-sm-5'>Maximum number of faculty per evaluation group : </label></h5>
        <div class='col-sm-2'>
              <input type='text' name='max_faculty' class='form-control input-sm' required>
        </div>
    </div>
    <div class='form-group'>
        <h5><label class='control-label col-sm-5'>Number of students : </label></h5>
        <div class='col-sm-2'>
              <input type='text' name='no_of_student' class='form-control input-sm' required>
        </div>
    </div>
    <div class='form-group'>
        <h5><label class='control-label col-sm-5'>Number of faculty : </label></h5>
        <div class='col-sm-2'>
              <input type='text' name='no_of_faculty' class='form-control input-sm' required>
        </div>
    </div>
    <div class='form-group'>
        <h5><label class='control-label col-sm-5'>Project evaluation starts from : </label></h5>
        <div class='col-sm-2'>
              <input type='date' name='start_date' id='var1' onfocus='get(this.id);' class='form-control input-sm' required>
        </div>
        <h5><label class='control-label col-sm-1'>Ends : </label></h5>
        <div class='col-sm-2'>
              <input type='date' name='end_date'  id='var2' onfocus='get(this.id);' class='form-control input-sm' required>
        </div>
    </div>
    <div class='form-group'> 
        <div class='col-sm-offset-5 col-sm-10'> 
            <input  type='submit' class='btn' style='background-color:#ff7733; font-weight: bold' value='submit'> 
        </div> 
    </div>";
  echo form_close();
  }
  else
  {
    $r=$records[0];
    echo "
    <div class='row'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8' style='border:solid #ff7733 1px;'>
    <style>
    .table>tbody>tr>td
    {
      border:none;
    }
    </style>
    <table class='table' style='font-weight:bold;'>
    <caption style='color:#ff7733'><center><h4>Project Details</h4></center></caption>
    <tr><td>Maximum Number of student in each group:</td><td>$r->max_students</td></tr>
    <tr><td>Maximum Number of faculty in each Panel:</td><td>$r->max_faculty</td></tr>
    <tr><td>Total Number of students</td><td>$r->no_students</td></tr>
     <tr><td>Total Number of faculty</td><td>$r->no_faculty</td></tr>
     <tr><td>Evaluation starts from</td><td><div id='sdate'>$r->start_date</div></td></tr>
     <!--<tr><td>Ends on</td><td><div id='edate'>$r->end_date<div><br><button class='btn-link'><u>Change Date</u></button></td></tr>--></table></div>
     <div class='col-sm-2'></div>
     </div>
    ";
  }
  ?>

</div>
</body> 
</html> 