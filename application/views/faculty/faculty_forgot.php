<!DOCTYPE html> 
<html> 
<head> 
   <title>Faculty Forgot</title> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
   <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet"> 
   <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
   <link rel="icon" href="<?php echo base_url()?>images/PES.png"/>
   <script src="<?php echo base_url()?>js/jquery.js"></script> 
   <script src="<?php echo base_url()?>js/bootstrap.min.js"></script>
   <script src="<?php echo base_url()?>js/validate.js"></script>
   <script>
      function msg()
      { 
         $("#email_text").html("Sending...");
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() 
         {
            if (this.readyState == 4 && this.status == 200) 
            {
               $("#email_text").html(this.responseText);
               $("#otpbutton").val("Resend OTP");
            }
         };
         xmlhttp.open("POST", "<?php echo base_url();?>"+"faculty/send_faculty/" + $('#userid').val(), true);
         xmlhttp.send();
      }
   </script>
</head> 
<body> 
<div class="container"> 
   <div class="page-header" > 
      <img src="<?php echo base_url()?>images/pes_head.png" class="img-rounded" style="width:60%;">
      <div class="row">
         <ul class="nav nav-tabs"> 
            <li><a href="<?php echo base_url();?>student/index">Student Login</a></li> 
            <li class="active"><a href="<?php echo base_url();?>faculty/faculty_login">Faculty Login</a></li> 
            <li><a href="<?php echo base_url();?>admin/admin_login">Admin Login</a></li> 
         </ul>
      </div>
      <h1><small>Faculty</small></h1>
   </div>
   <?php echo form_open_multipart('faculty/update_faculty',array('class' => 'form-horizontal'));?> 
   <div class="form-group"> 
      <label for="firstname" class="col-sm-2 control-label">Faculty ID :</label> 
      <div class="col-sm-6">
         <input type="text" class="form-control" id="userid" name="userid" placeholder="Enter Faculty ID" required" value= <?php echo set_value('userid');?>>
         <span class="help-block" id="email_text"></span>
      </div>
   </div> 
   <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"> 
         <input  type="button" class="btn btn-primary" id="otpbutton"  value="Get OTP" onclick="msg();" style="background-color: #ff7733;border:none;"> 
      </div> 
   </div>
   <div class="form-group"> 
      <label for="empid" class="col-sm-2 control-label">OTP:</label> 
      <div class="col-sm-3"> 
         <input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required onchange="verify();" value="<?php echo set_value('otp');?>"> 
      </div> 
      <div class="col-sm-3"> 
         <label style="color:red;"><?php echo validation_errors(); ?></label>
      </div> 
   </div> 
   <div class="form-group"> 
      <label for="password" class="col-sm-2 control-label">New Password :</label> 
      <div class="col-sm-6"> 
         <input type="password" class="form-control" id="pass" name="npassword" placeholder="Enter New password" required> 
      </div> 
   </div> 
   <div class="form-group"> 
      <label for="password" class="col-sm-2 control-label">Confirm password :</label> 
      <div class="col-sm-6"> 
         <input type="password" class="form-control" id="cpass" onblur="check(this.id)" name="cpassword" placeholder="Enter Confirm password" required> 
      </div> 
   </div>

   <div class="form-group"> 
      <div class="col-sm-offset-2 col-sm-10"> 
         <input  type="submit" class="btn btn-primary" id="submit" value="Update" style="background-color: #ff7733;border:none;"> 
      </div> 
   </div> 
   <?php echo form_close();?>
</div> 
</body> 
</html>