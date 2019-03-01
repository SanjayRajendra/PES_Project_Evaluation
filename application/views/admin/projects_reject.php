<!DOCTYPE html> 
<html> 
<head> 
    <title>Accepted Projects</title> 
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
                  url:'<?php echo base_url();?>admin/project_pop_accepted',
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
        <img src="<?php echo base_url();?>images/pes_head.png" class="img-rounded" style="width:60%">
       <?php include_once 'sidenav.php';?>
            <div class="col-sm-10">
              <table class="table" style="border:solid #ff7733 1px"> 
            <caption></caption> 
            <thead> 
              <tr bgcolor='#ff7733'> 
                <th>Project ID</th> 
                <th>Project Name</th> 
                <th>Project Guide</th>
                <th>Specialization Area</th>
                <th></th>
              </tr>
            </thead>
            <?php
            foreach ($records as $v) 
            {
                echo "<tr bgcolor='#ffffcc'>";
                echo "<td>".$v->id."</td>";
                echo "<td>".$v->name."</td>";
                echo "<td>".$v->guide." ".$v->lname."</td>";
                echo "<td>".$v->project_area."</td>";
                echo "<td><button type='button' class='btn btn-link' id='button1' data-toggle='modal' data-target='#modal-fullscreen' onclick=get_model('$v->id');>More</button>
                  <div class='modal modal-fullscreen fade' id='modal-fullscreen' tabindex='-1' role='dialog'  aria-labelledby='myModalLabel' aria-hidden='true'></div></td> </tr>";
            }
            ?>
        </table> 
      </div>
        </div>
</div>
</body>
</html>