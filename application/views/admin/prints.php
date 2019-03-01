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

       function delete_db()
        {
          var x=confirm("Are you sure?");
          if(x==true)
          {
            //alert("hi");
            $.ajax(
            {
              url:'<?php echo base_url();?>admin/delete_db',
              method:'post',
              //data:{'ug':$('#ug1').val(),'pg':$('#pg1').val(),'empid':$('#empid').html()},
              success:function(response) 
              {
                alert("Database Emptied!");
              }
            });

            
          }
          else
          {
            alert("Please Check again!!");
          }
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
                <li><a href="<?php echo base_url();?>admin/faculty_details">Faculty</a></li>
                <li><a href="<?php echo base_url();?>admin/faculty_panel">Panels</a></li>
                <li><a href="<?php echo base_url();?>admin/projects">Projects</a></li> 
                <li class="active"><a href="#">Print</a></li>
            </ul>
            </div>
            <div class="col-sm-2">
            <ul class="nav nav-tabs">
                <li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
            </div>
        </div>
    </div>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_student"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Student Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_faculty"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Faculty Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_project"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Project Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_panel"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;panel Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_marks"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Marks Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_evaluation1"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Evaluation_1 Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_evaluation2"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Evaluation_2 Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_evaluation3"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Evaluation_3 Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_evaluation4"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Evaluation_4 Details</a></li>
    <li class="active"><a href="<?php echo base_url();?>PesExcel/excel_evaluation5"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Evaluation_5 Details</a></li>
    <br>
    <li class="active" ><button class="btn btn-link" onclick="delete_db()"><i class="glyphicon glyphicon-log-in"></i>&nbsp;&nbsp;Delete Database</button></li>
</div>
</body> 
</html> 