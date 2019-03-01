<?php echo $msg;?>
<!DOCTYPE html> 
<html> 
   <head> 
      <title>Panels</title>  
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
      <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script>
          function get_guide() 
          {
            var mid=document.getElementById('mid');
            $.ajax(
            {
                url:'<?php echo base_url();?>admin/get_faculty_member',
                method:'post',
                data:{'mid':mid.value},
                success:function(response) 
                {
                      $('#select2').html(response);
                }
              });
            }
        </script>
   </head> 
   <body position="fixed">
   <div class="container">
      <div class="page-header"> 
         <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
        <div class="row">
        <div class="col-sm-10">
         <ul class="nav nav-tabs"> 
         <li><a href="<?php echo base_url(); ?>admin/general_view">General</a></li> 
         <li><a href="<?php echo base_url(); ?>admin/student_details">Student</a></li> 
         <li><a href="<?php echo base_url(); ?>admin/faculty_details">Faculty</a></li>
         <li class="active"><a>Panels</a></li>
         <li><a href="<?php echo base_url(); ?>admin/projects">Projects</a></li> 
         <li><a href="<?php echo base_url();?>admin/prints">Prints</a></li>
         </ul></div>
         <div class="col-sm-2">
         <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
          </div>
          </div>
          <div class="row">
            <div class="col-sm-8">
              <h1><small style="background-color: white;">Project Evaluation Panel</small></h1>
            </div><br>
            <div class="col-sm-4">
              <h4><span>No. of Panels: <label><?php echo count($records); ?></label></span></h4>
            </div>
          </div>
         
         
      </div>
      <?php echo form_open_multipart('admin/add_panel',array('class' =>'form-horizontal'));?>
      
<br><br>

  <div class="row">
    <div class="col-sm-6">
      <div class="row">
        <div class="col-sm-5">
      <h4>Specilazation Area:</h4></div>
      <div class="col-sm-6">
      <select class="form-control" id="mid" name="area" onchange="get_guide()" required>
        <option value="">--------------</option>
        <option value="Web Technology">Web Technology</option>
        <option value="Algorithms & Computing Models">Algorithms & Computing Models</option>
        <option value="System & Core Computing">System & Core Computing</option>
        <option value="Data Science">Data Science</option> 
        <option value="Artificial Intelligence">Artificial Intelligence</option> 
        <option value="Computer Network & Communications">Computer Network & Communications</option>
      </select>
    </div>
    </div>
    <br>
    <div id="select2">
    	<div class="row">
<div class="col-sm-5">
<h4>Professor *:<br>(Evaluator 1)</h4></div>
<div class="col-sm-6">
<select class="form-control" name="professor" required>
	<option value="">--------------</option>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-5">
<h4>Associate Professor *:(Evaluator 2)</h4></div>
<div class="col-sm-6">
<select class="form-control" name="associative" required>
	<option value="">--------------</option>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-5">
<h4>Assistant Professor *:(Evaluator 3)</h4></div>
<div class="col-sm-6">
<select class="form-control" name="assistant" required>
	<option value="">--------------</option>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-5">
<h4>Evaluator 4:</h4></div>
<div class="col-sm-6">
<select class="form-control" name="evaluator4">
  <option value="">--------------</option>
  <?php
  foreach ($records1 as $value) {
    echo "<option value=$value->empid>$value->name $value->lname</option>";
  }
  ?>
</select>
</div>
</div>
    <br>
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-3">
      <input type="submit" class="btn btn-primary" style="background-color: #ff7733;border: solid #ff7733 1px" value="Add Panel">
    </div><div class="col-sm-3">
      <input type="reset" style="background-color: #ff7733;border: solid #ff7733 1px" class="btn btn-primary"> 
      </div>
    </div>
      
    </div>
    <br>
    <br>
    <br>
    <div class="col-sm-6">
<div class="row">
<div class="col-sm-5">
<h4>Evaluator 5 :</h4></div>
<div class="col-sm-6">
<select class="form-control" name="evaluator5">
  <option value="">--------------</option>
    <?php
  foreach ($records1 as $value) {
    echo "<option value=$value->empid>$value->name $value->lname</option>";
  }
  ?>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-5">
<h4>Evaluator 6 :</h4></div>
<div class="col-sm-6">
<select class="form-control" name="evaluator6">
  <option value="">--------------</option>
    <?php
  foreach ($records1 as $value) {
    echo "<option value=$value->empid>$value->name $value->lname</option>";
  }
  ?>
</select>
</div>
</div>
<br>
<div class="row">
<div class="col-sm-5">
<h4>Evaluator 7 :</h4></div>
<div class="col-sm-6">
<select class="form-control" name="evaluator7">
  <option value="">--------------</option>
    <?php
  foreach ($records1 as $value) {
    echo "<option value=$value->empid>$value->name $value->lname</option>";
  }
  ?>
</select>
</div>
</div>
    </div>
    <?php echo form_close();?>
      </div> 
     <br>
     <br>
     <div style="border: solid 1px #ff7733">
      <?php
      if (!empty($records)) {
        foreach ($records as $value) 
        {
          echo "<pre style='font-size:14px;'><label>$value->panel_id.</label>";
          foreach ($panels[$value->panel_id] as $v) {
            echo "  ".$v->name." ".$v->lname."  ";
          }
          echo "<a href='".base_url()."admin/panel_remove/".$value->panel_id."' style='float:right'>Delete</a></pre>";
        }
      }
      ?>

     </div> 
   </body> 
</html> 