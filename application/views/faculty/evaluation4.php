<!DOCTYPE html> 
<html> 
<head> 
  <title>Projects Evaluation_4</title> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.css">
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/eval.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
  <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/evaluation.js"></script>    
  <?php echo $msg;?>
  <script>
    function restore1(id,srn)
    {
        var tot="total"+srn;
        var prog="progress"+srn;
        var pres="presentation"+srn;
        var dis="discussion"+srn;
        var viv="viva"+srn;
        var rem="remarks"+srn;
        document.getElementById(prog).disabled=false;
        document.getElementById(pres).disabled=false;
        document.getElementById(dis).disabled=false;
        document.getElementById(viv).disabled=false;
        document.getElementById(rem).innerHTML="";
        var total=document.getElementById(tot);
        total.innerHTML="0";
    }
    function fun(id,srn)
    {
        var tot="total"+srn;
        var prog="progress"+srn;
        var pres="presentation"+srn;
        var dis="discussion"+srn;
        var viv="viva"+srn;
        var rem="remarks"+srn;
        document.getElementById(prog).disabled=false;
        document.getElementById(pres).disabled=false;
        document.getElementById(dis).disabled=false;
        document.getElementById(viv).disabled=false;
    }
  </script>
</head> 
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
          <li><a  href="<?php echo base_url();?>faculty/evaluation2">Progress Review-1</a></li>
          <li><a href="<?php echo base_url();?>faculty/evaluation3">Mid Progress Review</a></li>
          <li class="active"><a href="#">Prefinal Progress Review</a></li>
          <li><a href="<?php echo base_url();?>faculty/evaluation5">Final Review</a></li>
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
    <h2 style="background-color: #ff7733;margin-bottom: 0px;"><small style="color: white;margin-left: 2%"><b><?php echo "$r->name";?></b></small></h2>
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
  <?php foreach ($records1 as $value) 
  {
    echo "
    <div class='divbox'>
    <h2 style='background-color: #ddd;margin-top: 0px;'>
    <small style='color: #ff7733;margin-left: 2%'>Marks for Review 1 <label style='margin-left:68%;'>".$value->srn."</label></small></h2>";
    echo form_open_multipart('faculty/evaluation4_submit',array('class' => 'form-horizontal'));
    echo "
    <input type='text' name='srn' value='".$value->srn."' style='display:none'>
    <table width='100%' class='table' >
    <tr>
    <td><label>Progress of project work :<br><small>(Max. Marks = 10)</small></label>
    <input class='form-control'  type='number' min='0' max='10' name='progress' id='progress".$value->srn."'  onchange='sum_marks(this.id,\"$value->srn\")'  required></td>
    <td><label>Presentation:<br><small>(Max. Marks = 10)</small></label>
    <input class='form-control' min='0' max='10'  type='number' name='presentation' id='presentation".$value->srn."' onchange='sum_marks(this.id,\"$value->srn\")' required></td>
    </tr>
    <tr>
    <td>
    <label>Result & Discussion :<br><small>(Max. Marks = 10)</small></label>
    <input class='form-control' min='0' max='10'  type='number' name='discussion' id='discussion".$value->srn."' onchange='sum_marks(this.id,\"$value->srn\")' required></td>
    <td><label>Viva-voce :<br><small>(Max. Marks = 10)</small></label>
    <input class='form-control' min='0' max='10'  type='number' name='viva' id='viva".$value->srn."' onchange='sum_marks(this.id,\"$value->srn\")' required></td>
    </tr>
    <tr>
    <td>
    <div class='textarea'></div>
    <label style='text-align: left;'>Remarks by the Examiner:</label>
    <textarea class='form-control' name='remarks' id='remarks".$value->srn."'></textarea>
    </td>
    <td><label class='Total'>Total Marks:</label><span id='total".$value->srn."'>0</span></td>
    </tr>
    <tr>
    <td></td>
    <td><input type='submit' name='submit' class='btn btn-default' style='margin-left: 30%' id='submit".$value->srn."' onclick='fun(this.id,\"$value->srn\");'>
    <input  type='reset' name='reset' class='btn btn-default' id='reset".$value->srn."' onclick=restore1(this.id,\"$value->srn\")></td>
    </tr>
    </table>";
    echo form_close();
    echo "</div>";
    }
  ?>
</div>
</body>
</html>