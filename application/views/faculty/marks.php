<!DOCTYPE html> 
<html> 
   <head> 
      <title>Marks</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url();?>images/PES.png"/>
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  </head> 
   <body onload="func()"> 
      <div class="container"> 
        <div class="page-header"> 
         <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
        <div class="row">
        <div class="col-sm-10">
         <ul class="nav nav-tabs"> 
          <li><a href="<?php echo base_url();?>faculty/faculty_general">General</a></li> 
         <li><a href="<?php echo base_url();?>faculty/faculty_project_accept">Projects</a></li>
         <li class="active"><a href="#">Marks</a></li>
         <li><a href="<?php echo base_url();?>faculty/faculty_change">Change password</a></li>
         </ul></div>
         <div class="col-sm-2">
         <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url();?>faculty/faculty_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
          </div>
          </div>
          </div>

          <div class="row">
      <div class="col-sm-9"><h1><small style="background-color: white;">Student Marks</small></h1></div>
      <div class="col-sm-3" style="margin-top: 3%"><b> Total no. of students:<?php echo count($records);?></b></div>
    </div>
    <div> 
    <table class="table" style="border:solid #ff7733 1px"> 
    <caption></caption> 
    <thead> 
      <tr bgcolor='#ff7733'> 
         <th>Project ID</th> 
         <th>Student SRN</th> 
         <th>Evaluation-1</th>
         <th>Evaluation-2</th>
         <th>Evaluation-3</th>
         <th>Evaluation-4</th>
         <th>Evaluation-5</th>
      </tr>
    </thead>
    <tr>
    <?php
    if(!empty($records))
    {
        foreach ($records as $row) {
          echo "<tr><td>".$row->project_id."</td>";
          echo "<td>".$row->student_id."</td>";
          echo "<td>".$row->e1."</td>";
          echo"<td>".$row->e2."</td>";
          echo"<td>".$row->e3."</td>";
          echo"<td>".$row->e4."</td>";
          echo"<td>".$row->e5."</td>";
        }
    }  
    ?>
    </tr>
    </table>
</div>
</div>
</body> 
</html> 