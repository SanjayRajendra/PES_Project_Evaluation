<!DOCTYPE html> 
<html> 
<head> 
    <title>Evaluators</title> 
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css"> 
    <link rel="icon" href="<?php echo base_url(); ?>images/pes.png"/>
    <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
    <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
</head> 
<body> 
<div class="container"> 
    <div class="page-header"> 
    <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%">
        <div class="row">
 	       	<div class="col-sm-10">
         		<ul class="nav nav-tabs"> 
         			<li><a href="<?php echo base_url();?>admin/general_view">General</a></li> 
         			<li><a href="<?php echo base_url();?>admin/student_details">Student</a></li> 
         			<li><a href="<?php echo base_url();?>admin/faculty_details">Faculty</a></li>
         			<li class="active"><a href="#">Evaluators</a></li> 
              <li><a href="<?php echo base_url();?>admin/faculty_panel">Panel</a></li>
         			<li><a href="<?php echo base_url();?>admin/projects">Projects</a></li> 
              <li><a href="<?php echo base_url();?>admin/prints">Prints</a></li>
         		</ul>
         	</div>
         	<div class="col-sm-2">
         		<ul class="nav nav-tabs">
          			<li><a href="<?php echo base_url();?>admin/admin_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li></ul>
          	</div>
        </div>
		<h1><small style="background-color: white;">Eligibility for Project Evaluation</small></h1>
    </div>
    <div class="row"> 
        <div class="col-sm-6">
            <h3><span class="label" style="background-color:#ff7733; color:#1f2e2e">Faculty List</span></h3>
            <table class="table" style="border:solid #ff7733 1px">
            <?php
     	       	$i=1;
        	    echo "<tr bgcolor='#ff7733'>";
	            echo "<th>S.No</th>";
    	        echo "<th>First_Name</th>";
        	    echo "<th>Experiance</th>";
            	echo "<th>Designation</th>";
    	        echo "<th>Add</th>";
        	    echo "</tr>";
        	    foreach($records as $r)
            	{
	            	$sum=(int)$r->exp_in_pes+(int)$r->exp_non_pes;
	            	echo "<tr bgcolor='#ffffcc'>";
    	        	echo "<td>".$i++."</td>";
        	   	 	echo "<td>".$r->name." ".$r->lname."</td>";
            		echo "<td>".$sum."</td>";
            		echo "<td>".$r->designation."</td>";
    	        	echo "<td><a href='".base_url()."admin/admin_eligibility_add/".$r->empid."'>Add</a></td>";
        	    	echo "</r>";
            	}
            ?>
            </table>
        </div>
   	    <div class="col-sm-6"> 
           <h3><span class="label" style="background-color:#ff7733; color:#1f2e2e">Eligible List</span></h3>
	            <table class="table" style="border:solid #ff7733 1px" >
    	        <?php
        		    $i=1;
            		echo "<tr bgcolor='#ff7733'>";
	        	    echo "<th >S.No</th>";
    		        echo "<th>First_Name</th>";
		            echo "<th>Experiance</th>";
        		    echo "<th>Designation</th>";
        		    echo "<th>Delete</th>";
            		echo "</tr>";
            		foreach($records1 as $r)
            		{
            			$sum=(int)$r->exp_in_pes+(int)$r->exp_non_pes;
            			echo "<tr bgcolor='#ffffcc'>";
      		     	 	echo "<td>".$i++."</td>";
		            	echo "<td>".$r->name." ".$r->lname."</td>";
        		    	echo "<td>".$sum."</td>";
            			echo "<td>".$r->designation."</td>";
		            	echo "<td><a href='".base_url()."admin/admin_eligibility_remove/".$r->empid."'>Delete</a></td>";   
						echo "</tr>";
            		}
            	?>
            	</table>
        </div>
    </div>
</div> 
</body> 
</html> 