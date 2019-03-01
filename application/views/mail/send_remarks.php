<?php
	require 'Mail.php';
	$this->load->library('session');
	$mail = new Mail;
	if(empty($records))
	{
		echo "<script>alert('Something wrong');</script>";
	}
	else
	{
		foreach ($records as $v)
		{
			$msg="<table><tr><td><b>Project Name :</b></td><td>".$v->name."</td></tr>
				<tr><td><b>Status :</b></td><td>".$v->status."</td></tr>
				<tr><td><b>Remarks:</b></td><td>".$v->remarks."</td></tr></table>";
			$sub="Pes project";
			$to=$records[0]->email;
			$s=$mail->send_msg($v->email,$msg,$sub);
			if($s==true)
			{
				echo 'Message sent successfully';
			}
			else
			{
				echo $s;
			}
		}		
	}
?>