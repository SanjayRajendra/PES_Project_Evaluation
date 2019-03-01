<!DOCTYPE html> 
<html> 
   <head> 
      <title>student forgot</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="<?php echo base_url();?>css/bootstrap.min.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url();?>images/PES.png"/>
      <script src="<?php echo base_url();?>js/jquery.js"></script> 
      <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url();?>js/create_student.js"></script>
      <script src="<?php echo base_url(); ?>js/validate.js"></script>
   </head> 
   <body> 
      <div class="container"> 
         <div class="page-header"> 
            <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%;" >
            <div class="row">
               <ul class="nav nav-tabs"> 
                  <li  class="active"><a href="<?php echo base_url();?>student/index">Student Login</a></li> 
                  <li><a href="<?php echo base_url();?>faculty/faculty_login">Faculty Login</a></li> 
                  <li><a href="<?php echo base_url();?>admin/admin_login">Admin Login</a></li> 
               </ul>
            </div>
            <h1><small>Student</small></h1>
         </div>
          <?php echo form_open_multipart('student/add_student',array('class' => 'form-horizontal'));?>  
         <div class="form-group"> 
            <label for="firstname" class="col-sm-2 control-label">Email :</label> 
            <div class="col-sm-4">
               <input type="email" class="form-control" id="email" name="email" placeholder="Enter your Email ID" required value= <?php echo set_value('userid');?>>
               <span class="help-block" id="email_text"></span>
            </div>
         </div> 
         <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10"> 
               <input  type="button" class="btn btn-primary" id="otpbutton"  value="Get OTP" onclick="msg();" style="background-color: #ff7733;border:none;"> 
            </div> 
         </div>
         <br>
         <br>
         <div class="form-group"> 
            <label for="empid" class="col-sm-2 control-label">OTP:</label> 
            <div class="col-sm-4"> 
               <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required value="<?php echo set_value('otp');?>"> 
            </div> 
         </div>
             <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10"> 
               <input  type="button" class="btn btn-primary" id="otpbutton"  value="Validate" onclick="validate_otp();" style="background-color: #ff7733;border:none;"> 
            </div> 
         </div>

            <div class="col-sm-3"> 
            </div>
     
            <div id="error_otp">
            </div>
             <?php echo form_close();?>
      </div> 
   </body> 
</html> 