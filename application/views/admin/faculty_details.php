<!DOCTYPE html> 
<html> 
<head> 
    <title>Faculty Details</title> 
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
    <link rel="icon" href="<?php echo base_url(); ?>images/PES.png"/>
    <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script>
        function get_model(pid) 
        {
          $('#modal-fullscreen').html('');
           $.ajax(
                {
                  url:'<?php echo base_url();?>admin/faculty_more_info',
                  method:'post',
                  data:{'pid':pid},
                  success:function(response)
                  {
                    $('#modal-fullscreen').append(response);
                  }
          });
        }
        function edit()
        {
          pg=$('#pg').html();
          ug=$('#ug').html();
          $('#ug').html("<input type='number' id='ug1' name='ug' max=4 min=0 value='"+ug+"'>");
          $('#pg').html("<input type='number' id='pg1' name='pg' max=4 min=0 value='"+pg+"'>");
          $('#sub1').html("<input type='button' value='Update' onclick='update();'>");
        }

        function update()
        {
           $.ajax(
          {
              url:'<?php echo base_url();?>admin/update_faculty_projects',
              method:'post',
              data:{'ug':$('#ug1').val(),'pg':$('#pg1').val(),'empid':$('#empid').html()},
              success:function(response) 
              {
                alert("Updated");
              }
            });
        }
    </script>
</head> 
<body> 
<div class="container"> 
    <div class="page-header"> 
        <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
        <div class="row">
            <div class="col-sm-10">
            <ul class="nav nav-tabs"> 
                <li><a href="<?php echo base_url();?>admin/general_view">General</a></li> 
                <li><a href="<?php echo base_url();?>admin/student_details">Student</a></li> 
                <li class="active"><a href="#">Faculty</a></li>
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
    <div class="row">
        <label><h4><a href="<?php echo base_url();?>faculty/faculty_insert"><u>Add Faculty</u> </a></h4></label>
    </div>
    <div class="row">
      <div class="col-sm-5"><h1><small style="background-color: white;">Faculty Details</small></h1></div>
      <div class="col-sm-4"><h3><a href="table">Eligibility</a></h3></div>
      <div class="col-sm-3" style="margin-top: 3%"><b> Total no. of Faculty:<?php echo count($records);?></b></div>
    </div> 
    <table class="table" style="border:solid #ff7733 1px"> 
    <caption></caption> 
    <thead> 
      <tr bgcolor='#ff7733'> 
         <th>Employee ID</th> 
         <th>Name</th> 
         <th>Designation</th>
         <th>E-Mail</th>
         <th>Mobile number</th>
         <th>Details</th>
      </tr>
    </thead>
    <tr>
    <?php
    foreach ($records as $row) {
        echo "<tr bgcolor='#ffffcc'><td>".$row->empid."</td>";
        echo "<td>".$row->name." ".$row->lname."</td>";
        echo "<td style='text-transform: uppercase'>".$row->designation."</td>";
        echo"<td>".$row->email."</td>";
        echo"<td>".$row->phoneno."</td>";
        echo"<td><button type='button' class='btn btn-link' data-toggle='modal' data-target='#modal-fullscreen' onclick=get_model('$row->empid');>More</button>          
        <div class='modal modal-fullscreen fade' id='modal-fullscreen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div></td>";
    }  
    ?>
    </tr>
    </table>
</div>
</body> 
</html> 