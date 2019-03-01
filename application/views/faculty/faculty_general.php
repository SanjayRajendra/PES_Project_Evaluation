<?php
$r=$records1[0];
?>
<!DOCTYPE html> 
<html> 
   <head> 
      <title>Faculty General</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url();?>images/PES.png"/>
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script>
        function get_model_view(pid) 
        {
          $('#modal-fullscreen').html('');
           $.ajax(
                {
                  url:'<?php echo base_url();?>faculty/faculty_pop',
                  method:'post',
                  data:{'pid':pid},
                  success:function(response)
                  {
                    $('#modal-fullscreen').append(response);
                  }
          });
      
        }

        function docheck1(id,id2){
           var z= document.getElementById(id);
           var x=document.getElementById(id2);
           if(z.value>5){
            alert("Max is 5");
            z.value="";
           }
           if(x.value!="" && z.value!=""){
            var l=parseInt(x.value)+parseInt(z.value);
            if(l>5){
             alert("Max is 5");
            z.value="";
            x.value=""; 
            }
           }

     }

     function func()
     {
        <?php
         if ($r->pg_projects>0 or $r->ug_projects>0) 
     	{
     	echo "$('#pg1').css('display','none');$('#ug1').css('display','none');$('#submit').css('display','none');";
     	}
     	else
     	{
     		echo "$('#ppg').css('display','none');$('#pug').css('display','none');";
     	}
        ?>
     }


        </script>
        <style>
        	tr td:first-child
        	{
        		font-weight: bold;
        		width: 15%;
        	}
        	tr td:nth-child(2)
        	{
        		width: 35%;
        	}
        	tr td:nth-child(3)
        	{
        		width: 15%;
        		font-weight: bold;
        	}
        	tr td:nth-child(4)
        	{
        		width: 35%;
        	}
        </style>
   </head> 
   <body onload="func()"> 
      <div class="container"> 
        <div class="page-header"> 
         <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
        <div class="row">
        <div class="col-sm-10">
         <ul class="nav nav-tabs"> 
          <li class="active"><a href="#">General</a></li> 
         <li><a href="<?php echo base_url();?>faculty/faculty_project_accept">Projects</a></li>
         <li><a href="<?php echo base_url();?>faculty/marks">Marks</a></li>
         <li><a href="<?php echo base_url();?>faculty/faculty_change">Change password</a></li>
         </ul></div>
         <div class="col-sm-2">
         <ul class="nav nav-tabs">
          <li><a href="<?php echo base_url();?>faculty/faculty_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
          </div>
          </div>
          	<h1><small>Personal Details</small></h1>
          </div>


  <div class="panel panel-danger" style="border: solid #ff7733 1px;">
      <div class="panel-heading" style="background-color: #ff7733;color: white;"><h4><b>Empid : </b><?php echo " $r->empid"?></h4></div>
      <div class="panel-body">
      	<?php echo form_open_multipart('faculty/add_faculty_project',array('class' =>'form-horizontal'));?>
      	<table class="table">
		<tr><td> Name :</td><td> <?php echo "$r->name " . "$r->lname" ?></td><td><td></td></td></tr>
		<tr><td> Empid : </td><td><?php echo " $r->empid"?></td><td></td><td></td></tr>
		<tr><td> Designation :</td><td> <?php echo " $r->designation"?></td><td><td></td></td></tr>
		<tr><td> Ex-in-PES :</td><td> <?php echo " $r->exp_in_pes"?></td>
			<td> Ex-non-PES :</td><td> <?php echo " $r->exp_non_pes"?></td></tr>
		<tr><td> Email :</td><td> <?php echo " $r->email"?></td>
		<td> Phone :</td><td> <?php echo " $r->phoneno"?></td></tr>

		<tr><td> Specialisation Area :</td><td colspan="3"> <?php echo " $r->spl_area"?></td></tr>            
		<tr><td> Research Area :</td><td colspan="3"> <?php echo " $r->research_area"?></td></tr>
		
		<tr><td> Eligibility :</td><td> <?php echo " $r->eligibility"?></td><td></td><td></td></tr>
		
		<tr>
			
			<td> UG Projects :</td><td> <p id="pug"><?php echo " $r->ug_projects"?></p>
				<input type="number" min="0" max="4" id="ug1" onblur="docheck1(this.id,'pg1')" name="ug_projects" style="width: 40%" required>
			</td>
			<td> PG projects :</td>
			<td> <p id="ppg"><?php echo " $r->pg_projects"?></p>
				<input type="number" max="3" min="0" id="pg1" name="pg_projects" onblur="docheck1(this.id,'ug1')" style="width:50%" required>
				<input type="submit" id="submit" value="Submit" style="background-color: #ff7733;border:none;">
			</td>

			 
		</tr>
    <?php 
    if(!empty($panel_mem))
    {
      echo "
      <tr>
      <td>Panel ID:</td>
      <td>".$panel_id."</td>
      <td>Panel Members:</td>
      <td><ul>";
      foreach ($panel_mem as $value) {
        echo "<li>$value->name $value->lname</li>";
      }
      echo "</ul></td></tr>";
    }
      ?>
    	</table> 
    	<?php echo form_close();?>

     </div>
    </div>
      </div>
   </body> 
</html> 
