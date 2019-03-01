<?php
	foreach ($records as $k)
	{
		echo "<option value=$k->empid>".$k->name." ".$k->lname."</option>";
	}
?>