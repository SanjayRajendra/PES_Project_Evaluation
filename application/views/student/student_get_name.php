<?php
	if (empty($records)) 
	{
		echo "Invalid SRN";
	}
	else
	{
		$r=$records[0];
		echo $r->fname." ".$r->lname;
	}
?>