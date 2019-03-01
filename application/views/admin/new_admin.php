<!DOCTYPE html> 
<html> 
<head> 
    <title>Admin General</title>  
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
    <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/validate.js"></script>
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
    </div>
    <div class="row">
    <div class="col-sm-6">
        <h1><small style="background-color: white;">Admins</small></h1>
        <table class="table" style="border:solid #ff7733 1px"> 
      <caption></caption> 
      <thead> 
      <tr bgcolor='#ff7733'> 
         <th>User Name</th> 
         <th>Email</th> 
         <th></th>
        
      </tr>
      </thead>
      <?php
      foreach ($records as $row)
      {
          echo "<tr bgcolor='#ffffcc'><td>".$row->username."</td>";
          echo "<td>".$row->email."</td>";
          echo "<td><a href='".base_url()."admin/remove_admin/".$row->username."'>Delete</a></td>";
      }
        ?> 
      </table>
    </div>
    <div class="col-sm-6"><h1>
    <small style="background-color: white;">Admin Form</small></h1>
    
    <?php echo form_open_multipart('admin/new_admin_submit',array('class' =>'form-horizontal'));?>
  
    <div class="form-group">
        <div class="col-sm-8">
            <label>Email :</label> 
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
        </div>
    </div> 
  
    <div class="form-group">
        <div class="col-sm-8">
            <label>Username :</label> 
            <input type="text" class="form-control" name="username" id="username" placeholder="Enter Username" required>
        </div>
    </div>
  
    <div class="form-group">
        <div class="col-sm-8">
            <label>Password :</label> 
            <input type="Password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
        </div>
    </div>            

    <div class="form-group">
        <div class="col-sm-8">
            <label>Confirm Password :</label> 
            <input type="Password" class="form-control" name="confpass" id="cpass" onblur="check(this.id)" placeholder="Confirm Password" required>
        </div>
    </div>
  
    <div class="form-group">
        <div class="col-sm-8">
          <input type="submit" class="btn btn-primary" id="submit" value="Submit" style="background-color: #ff7733;border:none;">
        </div>
    </div>
    <?php echo form_close();?>
</div>
</div>
</div>
</body>
</html>
