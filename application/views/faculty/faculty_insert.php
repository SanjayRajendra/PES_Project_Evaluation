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
    <script src="<?php echo base_url(); ?>js/validate.js"></script>
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
    <div class="col-sm-5"><h1><small style="background-color: white;">Faculty Form</small></h1></div>
    </div>
    <?php echo form_open_multipart('faculty/add_faculty',array('class' =>'form-horizontal'));?>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-1">      
                <label>Title :</label>  
                <select class="form-control" name="title" id="select">
                    <option>-----</option>
                    <option value="Mr">Mr</option>
                    <option value="Mrs">Mrs</option>
                    <option value="Ms">Ms</option>
                </select> 
            </div>
            <div class="col-sm-3">      
                <label>First Name : </label>  
                <input type="text" class="form-control" name="fname" id="fname" onblur="validate_name(this.id)" placeholder="Enter First Name" required> 
            </div>
            <div class="col-sm-3">      
                <label>Middle Name : </label>  
                <input type="text" class="form-control" name="mname"  id="mname" onblur="validate_name(this.id)"  placeholder="Enter Middle Name"> 
            </div>
            <div class="col-sm-3">      
                <label>Last Name : </label>  
                <input type="text" class="form-control" name="lname" id="lname" onblur="validate_name(this.id)" placeholder="Enter Last Name" required> 
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4">
                <label>Campus: </label> 
                <select class="form-control" name="campus" id="select">
                    <option>-----</option>
                    <option value="Central Campus">Central Campus</option>
                    <option value="West Campus">West Campus</option>
                    <option value="South Campus">South Campus</option>
                </select>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">      
                <label>Employee ID: </label>  
                <input type="text" class="form-control" name="empid" id="empid" placeholder="Enter Employee ID" required>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4">
                <label>Department :</label> 
                <select class="form-control" name="dept" id="dept" required>
                    <option>-----</option>
                    <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                    <option value="Information Science and Engineering">Information Science and Engineering</option>
                    <option value="Electronics and Communication">Electronics and Communication</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Electricals and Electronics">Electricals and Electronics</option>
                    <option value="Biotechnology">Biotechnology</option>
                    <option value="Mechanical">Mechanical</option>
                    <option value="Architecture">Architecture</option>
                </select>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">      
                <label>Designation: </label>
                <select class="form-control" name="designation" id="designation" required>
                    <option>-----</option>
                    <option value="Professor">Professor</option>
                    <option value="Associate Professor">Associate Professor</option>
                    <option value="Assistant Professor">Assistant Professor</option>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-4">
                <label>E-Mail</label> 
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">      
                <label>Phone No : </label> 
                <div class="input-group">
                    <span class="input-group-addon">+91</span> 
                    <input type="text" class="form-control" name="mobile" id="mob" maxlength="10" onblur="validate_mob(this.id)" placeholder="Enter Phone number" required>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                <label>Create Password :</label> 
                <input type="Password" class="form-control" name="password" id="pass" placeholder="Enter Password" required>
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">      
                <label>Confirm Password :</label>  
                <input type="Password" class="form-control" name="confpass" id="cpass" onblur="check(this.id)" placeholder="Confirm Password" required>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-4">
                <label for="name">Experiance In PES:</label>
                <div class="input-group">
                    <span class="input-group-addon"><input type="checkbox" name="ex_in_pes" id="c1" onchange="check_exp(this.id,'c11')"></span>
                    <input type="number" min="0" max="50" id="c11" onblur="docheck(this.id,'c22')" name="ex_in_pes"  class="form-control input-sm" id="expes"  disabled>
                </div>            
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-4">
                <label for="name">Experiance Outside PES:</label>
                    <div class="input-group">
                        <span class="input-group-addon" ><input type="checkbox" name="ex_non_pes" id="c2" onchange="check_exp(this.id,'c22')"></span>
                        <input type="number" max="50" min="0" id="c22" name="ex_non_pes" onblur="docheck(this.id,'c11')" class="form-control input-sm" id="nonpes"  disabled>
                    </div>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="form-group">
        <div class="col-sm-10">
            <label for="name">Wish to evaluate projects in the following domains :</label>
            <div class="row">
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Machine Learning" name="pv[]">Machine Learning</label>
                </div>           
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Deep Learning" name="pv[]">Deep Learning</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Image Processing" name="pv[]">Image Processing</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox"  value="Social Networking" name="pv[]">Social Networking</label>
                </div> 
            </div>
            <div class="row">
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Network Security" name="pv[]">Network Security</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Information Security" name="pv[]">Information Security</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="IOT" name="pv[]">IOT</label>
                </div>
                <div class="checkbox col-sm-3" >
                    <label><input type="checkbox" value="Information Systems" name="pv[]">Information Systems</label>
                </div>
            </div>
            <div class="row">
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Big Data Analytics" name="pv[]">Big Data Analytics</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Data Analytics" name="pv[]">Data Analytics</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Cloud Computing" name="pv[]">Cloud Computing</label>
                </div>
                <div class="checkbox col-sm-3" >
                    <label><input type="checkbox" value="Operating Systems" name="pv[]">Operating Systems</label>
                </div>
            </div>
            <div class="row">
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Compiler Design" name="pv[]">Compiler Design</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="App Devolopment" name="pv[]">App Devolopment</label>
                </div>
                <div class="checkbox col-sm-3">
                    <label><input type="checkbox" value="Green Computing" name="pv[]">Green Computing</label>
                </div>
                <div class="checkbox col-sm-3" >
                    <label><input type="checkbox" value="Soft Computing" name="pv[]">Soft Computing</label>
                </div>
            </div>
        </div>
    </div>    
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-9">
                <label for="comment">Area of Specialization:</label>
                <textarea class="form-control" rows="4" id="comment" name="specialisation"></textarea>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-sm-9">
                <label for="comment">Research Area:</label>
                <textarea class="form-control" rows="4" id="comment" name="research_area"></textarea>
            </div>
        </div>
    </div>
    <div class="col-sm-1"></div>
    <div class="row">
        <div class="form-group">
            <div class="col-xs-4">
                <input type="submit" class="btn btn-primary " id="submit" value="Submit" style="background-color: #ff7733;border:none;">
            </div>
            <div class="col-sm-1"></div>
            <div class="col-xs-4"> 
                <input type="Reset" class="btn btn-primary" value="Reset" style="background-color: #ff7733;border:none;" >
            </div>
        </div>
    </div>
    <?php echo form_close();?>
</div> 
</div>
</body> 
</html> 