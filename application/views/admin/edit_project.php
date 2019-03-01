<!DOCTYPE html> 
<html> 
<head> 
    <title>Edit Projects</title> 
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
    <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script>
        function get_project(pid) 
        {
           $.ajax(
                {
                  url:'<?php echo base_url();?>admin/get_edit_project',
                  method:'post',
                  data:{'pid':$("#pid").val()},
                  success:function(response)
                  {
                     $('#project').html(response);
                  }
          });
        }

        function edit()
        {
          pname=$('#project_name').html();
          $('#project_name').html("<input type='text' class='form-control' id='pname' name='pname' size='30' value='"+pname+"'>");
          $('#project_edit').html("<input type='button' value='update' onclick='update_pname();'>");
        }
        function update_pname() {
          $.ajax(
                {
                  url:'<?php echo base_url();?>admin/update_project_name',
                  method:'post',
                  data:{'pid':$("#pid").val(),
                        'pname':$("#pname").val()},
                  success:function(response)
                  {
                     alert('updated project name successfully..');
                  }
          });
        }
        function edit_guide()
        {
          $('#guide_name').html("<?php

          	echo "<select id='guide_select' name='guide_select' required class='form-control'>";
          	foreach ($records as $value) 
          	{
				echo "<option value='$value->empid'>".$value->name." ".$value->lname."</option>";
			}
			echo "</select>"
          	?>");

          $('#guide_edit').html("<input type='button' value='update' onclick='update_guide();'>");
        }

        function update_guide() {
          $.ajax(
                {
                  url:'<?php echo base_url();?>admin/update_project_guide',
                  method:'post',
                  data:{'empid':$("#guide_select").val(),
                        'pid':$("#pid").val()},
                  success:function(response)
                  {
                     alert('updated guide successfully..');
                  }
          });
        }
    </script>
    <style type="text/css">
      .table > tbody > tr > td
      {
        border-top: none;
      }
    </style>
</head> 
<body> 
  
  <?php echo "$msg"; ?>

<div class="container"> 
    <div class="page-header"> 
        <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%">
       <?php include_once 'sidenav.php';?>
   <div class="col-sm-10">
       <div class="row">
          <div class="col-sm-4">
            <input type="text" name="pid" id="pid" class="form-control" placeholder="Enter Project ID" style="transform: uppercase">
              </div>
              <div class="col-sm-6">
        <input type="button" class="btn" value="Submit" onclick="get_project();" style="background: #ff7733;color: white;">
      </div></div>
      <div id="project"></div>
        </div>
</div>
</body>
</html>
