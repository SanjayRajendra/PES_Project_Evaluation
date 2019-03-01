<!DOCTYPE html> 
<html> 
<head> 
  <title>Projects Evaluation_5</title> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/eval.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
  <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/evaluation.js"></script>
  <?php echo $msg;?>
</head> 
  <script>
  function fun(id,srn)
  {
    var id1=document.getElementById('formulation');
    var id2=document.getElementById('review');
    var id3=document.getElementById('discussion');
    var id4=document.getElementById('method');
    var id5=document.getElementById('originality');
    var id6=document.getElementById('contribution');
    var id7=document.getElementById('presentation');
    var id8=document.getElementById('viva');
    var id9=document.getElementById('htotal');
    id1.disabled=id2.disabled=id3.disabled=id4.disabled=id5.disabled=id6.disabled=id7.disabled=id8.disabled=id9.disabled=false;
  }
  </script>
<body> 
<div class="container"> 
  <div class="page-header"> 
    <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%">
    <div class="row">
      <div class="col-sm-10">
        <ul class="nav nav-tabs"> 
          <li><a href="<?php echo base_url();?>faculty/faculty_general">General</a></li> 
          <li><a href="<?php echo base_url();?>faculty/faculty_status">Projects</a></li>
          <li class="active"><a href="#">Evaluation</a></li> 
          <li><a href="<?php echo base_url();?>faculty/marks">Marks</a></li>
          <li><a href="<?php echo base_url();?>faculty/faculty_change">Change password</a></li>
        </ul>
      </div>
      <div class="col-sm-2">
        <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url();?>faculty/faculty_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        </ul>
      </div>
    </div>
    <h2><small>Evaluation Process</small></h2>
  </div>
  <div class="form-group"> 
    <ul class="nav nav-tabs"> 
      <li><a href="<?php echo base_url();?>faculty/evaluation1">Synopsis Approval</a></li> 
      <li><a href="<?php echo base_url();?>faculty/evaluation2">Progress Review-1</a></li>
      <li><a href="<?php echo base_url();?>faculty/evaluation3">Mid Progress Review</a></li>
      <li><a href="<?php echo base_url();?>faculty/evaluation4">Prefinal Progress Review</a></li>
      <li class="active"><a href="#">Final Review</a></li>
    </ul>
  </div>
  <?php
    $r=$records[0];
  ?>
   <?php
    if (!empty($records2)) {
        echo "<div class='alert alert-info'><strong>Already Evaluated...</strong></div>";
    }
    ?>
  <div>
    <h2 style="background-color: #ff7733;margin-bottom: 0px;">
    <small style="color: white;margin-left: 2%"><b><?php echo "$r->name";?></b></small></h2>
    <div class="row" style="border: solid #ff7733 1px;margin: 0px;">
      <div class="col-sm-7">
        <h5><label><u>Description:</u></label></h5>
        <p><?php echo "$r->description";?></p>
      </div>
      <div class="col-sm-5">
        <table class='table' style='float:right;'><caption><label>Team Members :</label></caption>
          <?php
            foreach ($records1 as $value) 
            {
              echo "<tr>";
              echo "<td>".$value->srn."</td>";
              echo "<td>".$value->fname." ".$value->mname." ".$value->lname."</td>";
              echo "</tr>";
            }
          ?>
        </table>
      </div>
    </div>
  </div>
  <?php 
    echo "
      <div class='divbox'>
      <h2 style='background-color: #ddd;margin-top: 0px;'>
      <small style='color: #ff7733;margin-left: 2%'>Final Review</small></h2>";
    echo form_open_multipart('faculty/evaluation5_submit',array('class' => 'form-horizontal'));
    echo "
      <input type='text' name='project_id' value='".$r->id."' style='display:none'>
      <table width='100%' class='table' >
      <tr>
      <td>
      <label>Problem Formulation :<br><small>(Max. Marks = 05)</small></label>
      <input class='form-control' min='0' max='5' type='number' name='formulation' id='formulation'  onchange='h_total(this.id)' required></td>
      <td><label>Review of Literature :<br><small>(Max. Marks = 10)</small></label>
      <input class='form-control' min='0' max='10' type='number' name='review' id='review' onchange='h_total(this.id)' required></td>
      </tr>
      <tr>
      <td>
      <label>Result,Discussion & Citation :<br><small>(Max. Marks = 15)</small></label>
      <input class='form-control' min='0' max='15' type='number' name='discussion' id='discussion' onchange='h_total(this.id)'  required></td>
      <td><label>Methodology :<br><small>(Max. Marks = 10)</small></label>
      <input class='form-control' min='0' max='10' type='number' name='method' id='method' onchange='h_total(this.id)' required></td>
      </tr>
      <tr>
      <td>
      <label>Originality & Significance & Relevance-Application in Real World :<br><small>(Max. Marks = 10)</small></label>
      <input class='form-control' min='0' max='10' type='number' name='originality' id='originality' onchange='h_total(this.id)' required></td>
      <td>
      <label class='htotal'><br><small>(Max. Marks = 15)</small></label><span id='htotal'>0</span></td>
      </tr>
      <tr><td><p style='color:red;'>* this above marks will be reduced to 15</p></td><td></td></tr>
      </table>
      <hr>
      <hr>
      <table width='100%' class='table' >
      <tr>
      <td><label>Individual & Team Contribution with Justification<br><small>(Max. Marks = 05)</small></label>
      <input class='form-control' type='number' min='0' max='5' name='contribution' id='contribution' onchange='total(this.id)' required></td>
      <td><label>presentation :<br><small>(Max. Marks = 10)</small></label>
      <input class='form-control' min='0' max='10' type='number' name='presentation' id='presentation' onchange='total(this.id)'  required></td>
      </tr>
      <tr>
      <td></td>
      <td><label>Viva-voce :<br><small>(Max. Marks = 10)</small></label>
      <input class='form-control' min='0' max='10' type='number' name='viva' id='viva' onchange='total(this.id)' required></td>
      </tr>
      <tr>
      <td>
      <div class='textarea'></div>
      <label style='text-align: left;'>Remarks by the Examiner:</label>
      <textarea class='form-control' name='remarks'></textarea>
      </td>
      <td><label class='Total'>Total Marks:</label><span id='total'>0</span></td>
      </tr>
      <tr>
      <td></td>
      <td><input type='submit' name='submit' class='btn btn-default' style='margin-left: 30%' id='submit".$value->srn."' onclick='fun(this.id,\"$value->srn\");'>
      <input type='reset' name='reset' class='btn btn-default' id='restore_all' onclick='set_zero(this.id)'></td>
      </tr>
      </table>";
    echo form_close();
    echo "</div>";
  ?>
</div>
</body>
</html>