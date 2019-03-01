<div class="row">
<div class="col-sm-5">
<h4>Professor *:</h4></div>
<div class="col-sm-6">
<select class="form-control" name="professor" required>
	<option value="">--------------</option>
	<?php
		if (!empty($records1)) 
		{
			foreach ($records1 as $k) {
				echo "<option value='".$k->empid."'>".$k->name." ".$k->lname."</option>";
			}
		}
		
	?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-5">
<h4>Associate Professor*:</h4></div>
<div class="col-sm-6">
<select class="form-control" name="associative" required>
	<option value="">--------------</option>
	<?php
		if (!empty($records2)) 
		{
			foreach ($records2 as $k) {
				echo "<option value='".$k->empid."'>".$k->name." ".$k->lname."</option>";
			}
		}
	?>
</select>
</div>
</div>

<div class="row">
<div class="col-sm-5">
<h4>Assistant Professor *:</h4></div>
<div class="col-sm-6">
<select class="form-control" name="assistant" required>
	<option value="">--------------</option>
	<?php
		if (!empty($records3)) 
		{
			foreach ($records3 as $k) {
				echo "<option value='".$k->empid."'>".$k->name." ".$k->lname."</option>";
			}
		}
	?>
</select>
</div>
</div>