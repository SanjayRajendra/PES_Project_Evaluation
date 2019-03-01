<div class="row">
            <div class="col-sm-10">
              <ul class="nav nav-tabs"> 
                <li><a href="<?php echo base_url();?>admin/general_view">General</a></li> 
                <li><a href="<?php echo base_url();?>admin/student_details">Student</a></li> 
                <li><a href="<?php echo base_url();?>admin/faculty_details">Faculty</a></li>
                <li><a href="<?php echo base_url();?>admin/faculty_panel">Panels</a></li>
                <li class="active"><a href="#">Projects</a></li>
                <li><a href="<?php echo base_url();?>admin/prints">Prints</a></li>
              </ul>
            </div>
            <div class="col-sm-2">
              <ul class="nav nav-tabs">
                <li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
            </div>
        </div>  
        <h1><small>Project Details</small></h1>
    </div>
    <div class="row">
            <div class="col-sm-2">
              <ul class="nav nav-tabs-vertical" style="background: #ff7733;border: solid 1px #ff7733;border-radius: 5px;"> 
                <li><a href="<?php echo base_url();?>admin/projects" style="color: #333333;font-size: 16px;">Pending</a></li> 
                <li><a href="<?php echo base_url();?>admin/admin_project_accept" style="color: #333333;font-size: 16px;">Accepted</a></li> 
                <li><a href="<?php echo base_url();?>admin/projects_reject" style="color: #333333;font-size: 16px;">Rejected</a></li>
                <li><a href="<?php echo base_url();?>admin/edit_project" style="color: #333333;font-size: 16px;">Edit Project</a></li>
              </ul>
            </div>