<!DOCTYPE html> 
<html> 
<head> 
   <title>Faculty Login</title> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"> 
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
   <link rel="icon" href="<?php echo base_url();?>images/PES.png"/>
   <script src="<?php echo base_url();?>js/validate.js"></script>
</head> 
<body> 
   <div class="container"> 
      <div class="page-header"> 
         <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
         <div class="row">
            <ul class="nav nav-tabs"> 
               <li><a href="<?php echo base_url();?>student/index">Student Login</a></li> 
               <li class="active"><a href="#">Faculty Login</a></li> 
               <li><a href="<?php echo base_url();?>admin/admin_login">Admin Login</a></li> 
            </ul>
         </div>
         <h1><small>Faculty Login </small></h1>
      </div>
      <?php echo form_open_multipart('faculty/check_faculty',array('class' => 'form-horizontal'));?>
      <div class="form-group"> 
         <label for="firstname" class="col-sm-2 control-label">Faculty ID</label> 
         <div class="col-sm-6">
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
               <input type="text" class="form-control" id="srn" name="username" placeholder="Enter Employee ID" required> 
            </div>
         </div> 
      </div> 
      <div class="form-group"> 
         <label for="password" class="col-sm-2 control-label">Password</label> 
         <div class="col-sm-6"> 
            <div class="input-group">
               <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
               <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required> 
            </div> 
         </div>
      </div> 
      <div class="form-group"> 
         <div class="col-sm-offset-2 col-sm-10">  
            <div> 
             <label> 
              <a href="faculty_forgot">Forgot Password?</a>
             </label> 
         </div> 
      </div> 
   </div> 
   <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"> 
         <input  type="submit" class="btn btn-primary" value="Sign In" style="background-color: #ff7733;border:none;"> 
      </div> 
   </div>
   <?php echo form_close();?>
</div>
</body> 
</html>