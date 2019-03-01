<?php
	$r=$records[0];
	echo "<div class='modal-dialog' style='width:70%'><div class='modal-content'><div class='modal-header'>
		<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button> 
		<h4 class='modal-title' id='myModalLabel'><label style='color:orange' id='empid'>".$r->empid."</label></h4></div>
		<div class='modal-body'>";

	echo "<table class='table'><tr><td><label>Name :</label></td><td>".$r->name." ".$r->lname."</td><td></td><td></td></tr>
		<tr><td><label>Department :</label></td><td>".$r->department."</td><td><label>Designation :</label></td><td>".$r->designation."</td></tr>
		<tr><td><label>Experiance In PES :</label></td><td>".$r->exp_in_pes."</td><td><label>Experiance Outside PES:</label></td><td>".$r->exp_non_pes."</td></tr>
		<tr><td><label>Email :</label></td><td>".$r->email."</td><td><label>Mobile No :</label></td><td>".$r->phoneno."</td></tr>";

	echo "<tr bgcolor='#ffeeee'><td><label>No. of UG projects:</label></td><td id='ug'>".$r->ug_projects."</td>
		<td><label>No. of PG projects :</label></td><td id='pg'>".$r->pg_projects."</td></tr>
	 	<tr bgcolor='#ffeeee'><td colspan=3></td><td id='sub1'><input type='button' class='btn btn-link' name='edit' value='Edit' onclick='edit()'></td></tr>";

	echo "<tr><td colspan='4'><p><label>Specialization:</label></p>".$r->spl_area."</td></tr>
		<tr><td colspan='4'><p><label>Research Area :</label></p>".$r->research_area."</td></tr></table>";

	echo "<br><a href='".base_url()."admin/remove_faculty/".$r->empid."'>Remove Faculty</a>";

	echo "<div class='modal-footer'><button type='button' class='btn btn-warning' data-dismiss='modal'>Close</button>
		</div></div></div></div>";
?>