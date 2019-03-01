<!DOCTYPE html> 
<html> 
   <head> 
      <title>Project Status</title> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
      <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
      <link rel="icon" href="<?php echo base_url();?>images/PES.png"/> 
      <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
      <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
      <script src="<?php echo base_url(); ?>js/validate.js"></script>
      
      <script>
        function get_model(pid) 
        {
          $('#modal-fullscreen').html('');
           $.ajax(
                {
                  url:'<?php echo base_url();?>student/student_pop',
                  method:'post',
                  data:{'pid':pid},
                  success:function(response)
                  {
                    $('#modal-fullscreen').append(response);
                  }
          });
        }
      </script>
   </head> 
   <body> 
      <div class="container"> 
        <div class="page-header"> 
          <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%;">
          <div class="row">
            <div class="col-sm-10">
              <div class="row">
                <ul class="nav nav-tabs"> 
                  <li><a href="<?php echo base_url();?>student/student_general">General</a></li>
                  <li><a href="<?php echo base_url();?>student/project_panel">Project</a></li> 
                  <li class="active"><a href="#">Status</a></li> 
                  <li><a href="<?php echo base_url();?>student/remarks">Remarks</a></li>
                  <li><a href="<?php echo base_url();?>student/uploads">Uploads</a></li>
                  <li><a href="<?php echo base_url();?>student/student_change">Change Password</a></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-2">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo base_url();?>student/student_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
              </ul>
            </div>
          </div> 
        <table class="table" style="border:solid #ff7733 1px"> 
        <caption></caption> 
        <thead> 
        <tr bgcolor='#ff7733'>
          <th>S.No.</th> 
          <th>Project Name</th>
          <th>Status</th>
          <th>View</th>
        </tr>
        </thead>
        <?php
          $i=1;
          foreach ($records as $v) 
          {
            echo "<tr>";
            echo "<td>".$i."</td>";
            echo "<td>".$v->name."</td>";
            echo "<td>".$v->status."</td>";
            echo "<td><button type='button' class='btn' id='button1' data-toggle='modal' data-target='#modal-fullscreen' onclick=get_model('$v->id');>View</button>
            <div class='modal modal-fullscreen fade' id='modal-fullscreen' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'></div></td> </tr>";
            $i++;
          }
        ?>
        </table>
      </div>
    </div>   
  </body> 
</html>