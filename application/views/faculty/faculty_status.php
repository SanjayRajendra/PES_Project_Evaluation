<!DOCTYPE html> 
<html> 
   <head> 
      <title>Projects</title>  
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"> 
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <script>
        function get_model(pid) 
        {
          $('#modal-fullscreen').html('');
           $.ajax(
                {
                  url:'<?php echo base_url();?>faculty/faculty_project_pop',
                  method:'post',
                  data:{'pid':pid},
                  success:function(response)
                  {
                    $('#modal-fullscreen').append(response);
                  }
                });
        }
        function success(pid) 
        {
           $.ajax(
                {
                  url:'<?php echo base_url();?>faculty/faculty_project_approved',
                  method:'post',
                  data:{'pid':pid,'comment':$('#comment').val()},
                  success:function(response)
                  {
                    
                  }
                });
          location.reload();
        }
        function reject(pid)
        {
           $.ajax(
                {
                  url:'<?php echo base_url();?>faculty/faculty_project_reject',
                  method:'post',
                  data:{'pid':pid,'comment':$('#comment').val()},
                  success:function(response)
                  {
    
                  }
                });
           location.reload();
        }
      </script>
   </head> 
   <body> 
      <div class="container"> 
          <div class="page-header"> 
            <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%;">
            <div class="row">
              <div class="col-sm-10">
                <ul class="nav nav-tabs"> 
                  <li><a href="<?php echo base_url();?>faculty/faculty_general">General</a></li> 
                  <li class="active"><a href="#">Projects</a></li> 
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
            <div>
              <table class="btm"><tr><td><label class="label1"><a href="<?php echo base_url();?>faculty/faculty_project_accept">Accepted</a></label></td>
                <td><label class="label2"><a href="#" style="color:white;">Pending</a></label></td></tr>
              </table>
            </div>         
            <table class="table" style="border:solid #ff7733 1px"> 
              <caption></caption> 
              <thead> 
              <tr bgcolor='#ff7733'> 
                <th>Project ID</th> 
                <th>Project Name</th> 
                <th>Specialization Area</th>
                <th>Verify</th>
              </tr>
              </thead>
              <?php
                foreach ($records as $v) 
                {
                  echo "<tr bgcolor='#ffffcc'>";
                  echo "<td>".$v->id."</td>";
                  echo "<td>".$v->name."</td>";
                  echo "<td>".$v->project_area."</td>";
                  echo "<td><button type='button' class='btn btn-link' id='button1' data-toggle='modal' data-target='#modal-fullscreen' onclick=get_model('$v->id');>Verify</button><div class='modal modal-fullscreen fade' id='modal-fullscreen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div></td> </tr>";
                }
              ?>
            </table>
          </div>
        </div>
    </body>
</html>