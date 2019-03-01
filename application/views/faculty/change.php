<!DOCTYPE html> 
<html> 
<head> 
    <title>Change Password</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
    <link rel="icon" href="<?php echo base_url();?>images/PES.png"/> 
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/validate.js"></script>
</head> 
<body onload="load();"> 
<div class="container"> 
  <div class="page-header"> 
    <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
    <div class="row">
      <div class="col-sm-10">
        <div class="row">
          <ul class="nav nav-tabs"> 
            <li><a href="<?php echo base_url();?>faculty/faculty_general">General</a></li> 
            <li><a href="<?php echo base_url();?>faculty/faculty_project_accept">Projects</a></li>
            <li><a href="<?php echo base_url();?>faculty/marks">Marks</a></li>
            <li  class="active"><a href="#">Change password</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-2">
        <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url();?>faculty/faculty_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
    <h1><small style="background-color: white;">Change Password</small></h1>
  </div>
  <?php echo form_open_multipart('faculty/faculty_changepass',array('class' => 'form-horizontal'));?>
  <div class="col-sm-2"></div>
  <div class="form-group">
    <div class="col-sm-4">
      <label>Old Password :</label> 
      <input type="password" class="form-control" name="old" id="pass" placeholder="Old Password" required>
    </div>
  </div>
  <div class="col-sm-2"></div>
  <div class="form-group">
    <div class="col-sm-4">
      <label>New Password :</label> 
      <input type="password" class="form-control" name="new" id="pass" placeholder="New Password" required>
    </div>
  </div>            
  <div class="col-sm-2"></div>
  <div class="form-group">
    <div class="col-sm-4">
      <label>Confirm Password :</label> 
      <input type="password" class="form-control" name="confirm" id="pass" placeholder="Confirm Password" required>
    </div>
  </div>
  <div class="col-sm-2"></div>
  <div class="form-group">
    <div class="col-sm-4">
      <input type="submit" class="btn btn-primary" id="submit" value="Submit" style="background-color: #ff7733;border:none;">
    </div>
  </div>
  <?php echo form_close();?>
</div> 
</body> 
</html>