<?php
	
	if (empty($records))
	{
		echo "<p style='color:red'>Invalid SRN</p>";
	}
	else
	{
		$r=$records[0];
		if (empty($records1))
		{
			echo "".$r->fname." ".$r->lname;
		}
		else
		{
			echo "<p style='color:red'>Already Registerd</p>";
		}
		
	}
?>