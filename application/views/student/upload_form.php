<!DOCTYPE html> 
<html> 
   <head> 
      <title>Projects</title> 
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
                  <li ><a href="<?php echo base_url();?>student/remarks">Remarks</a></li>
                  <li class="active"><a href="#">Uploads</a></li>
                  <li><a href="<?php echo base_url();?>student/student_change">Change Password</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-2">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url();?>student/student_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </div>
            <h1><small>File Uploads</small></h1>
          </div> 
        </div>
          <?php 
          echo $msg;
          ?>

      <div class="panel panel-danger" style="border: solid #ff7733 1px;">
      <div class="panel-heading" style="background-color: #ff7733;color: white;"><h4><b>Uploads</b></h4></div>
      <div class="panel-body">
        <label>Note*:</label>
	<ul>
	<li>You can upload only once</li>
	<li>File size should be less than 3MB</li>
	<li>File should be .zip / .tar.bz / .rar format</li>
	</ul> 
        <table class="table">
          <tr>
          <td>
          <?php echo form_open_multipart('student/upload_zip');?>
          <h4>Code Upload :</h4>
    <div class="col-sm-6"><div class="input-group">    
    <input type="file" class="form-control" name="userfile" id="userfile" size="200" required />
    <span class="input-group-addon"><input type="submit" value="upload" /></span>
  </div>
</div>
<?php echo form_close();?>
</td>
          </tr>
        </table>
        
      </div>
    </div>
    </div>
  </body>
</html>
