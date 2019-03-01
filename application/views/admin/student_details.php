<!DOCTYPE html> 
<html> 
<head> 
    <title>Student Details</title> 
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
            <li><a href="<?php echo base_url();?>admin/general_view">General</a></li> 
            <li  class="active"><a href="#">Student</a></li> 
            <li><a href="<?php echo base_url();?>admin/faculty_details">Faculty</a></li>
            <li><a href="<?php echo base_url();?>admin/faculty_panel">Panels</a></li>
            <li><a href="<?php echo base_url();?>admin/projects">Projects</a></li> 
            <li><a href="<?php echo base_url();?>admin/prints">Prints</a></li>
         </ul>
        </div>
        <div class="col-sm-2">
          <ul class="nav nav-tabs">
            <li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
        </div>
      </div>
    </div>
    <div>
      <div class="row">
        <div class="col-sm-9"><h1><small style="background-color: white;">Student Details</small></h1></div>
        <div class="col-sm-3" style="margin-top: 3%"><b> Total no. of Students:<?php echo count($records);?></b></div>
      </div>   
      <table class="table" style="border:solid #ff7733 1px"> 
      <caption></caption> 
      <thead> 
      <tr bgcolor='#ff7733'> 
         <th>Program</th> 
         <th>SRN</th> 
         <th>Name</th>
         <th>Branch</th>
         <th>Year</th>
         <th>Sem</th>
         <th>Section</th>
         <th>E-Mail</th>
         <th>Mobile Number</th>
      </tr>
      </thead>
      <?php
      foreach ($records as $row)
      {
          echo "<tr bgcolor='#ffffcc'><td>".$row->program."</td>";
          echo "<td>".$row->srn."</td>";
          echo "<td>".$row->fname." ".$row->lname."</td>";
          echo "<td>".$row->branch."</td>";
          echo"<td>".$row->year."  </td>";
          echo"<td>".$row->sem." </td>";
          echo"<td>".$row->section."</td>";
          echo"<td>".$row->email." </td>";
          echo"<td>".$row->phoneno."</td></tr>";
      }
	    ?> 
      </table>
</div>
</body>
</html> 