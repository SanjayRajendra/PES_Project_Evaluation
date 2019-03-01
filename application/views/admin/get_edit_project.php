<?php
if (!empty($records)) {
	$r=$records[0];
	echo "

	<br>
	<br>
<div class='panel panel-danger' style='border: solid #ff7733 1px;'>
      <div class='panel-heading' style='background-color: #ff7733;color: white;'>
      	<h4><b>Project ID : </b>".$r->id."</h4></div>
      <div class='panel-body'>
      	<table class='table'>
      		<tr>
      			<td style='font-weight:bold;'>Project Name :</td><td id='project_name'>".$r->pname."</td>
      			<td id='project_edit'><input type='button' class='btn btn-link' name='edit' value='Edit' onclick='edit();'></td>
      		</tr>
      		<tr>
      			<td style='font-weight:bold;'>Guide Name :</td><td id='guide_name'>".$r->name." ".$r->lname."</td>
                        <td id='guide_edit'><input type='button' class='btn btn-link' name='edit' value='Edit' onclick='edit_guide();'></td></tr>
      	    <tr>
      			<td style='font-weight:bold;'>Students :</td><td colspan='2'><table class='table'>";
      			if (!empty($records1)) {
      			foreach ($records1 as $value) {
      				echo "
      				<tr>
      				<td>".$value->srn."</td><td>".$value->fname." ".$value->lname."</td>
      				<td><a href='".base_url()."admin/delete_student_project/".$value->srn."'>Delete</a></td></tr>";
      			}
      		}


      echo "</table></td></tr>
      <tr><td colspan='3'>
      <a href='".base_url()."admin/delete_project/".$r->id."'>Delete Project</a></td></tr></table>
      </div>
</div>";
}
else
{
	echo "
      <br><br>
      <div class='alert alert-info'>
  <strong>Invalid Project ID or Project has been Rejected..!</strong></div>";
}
?>