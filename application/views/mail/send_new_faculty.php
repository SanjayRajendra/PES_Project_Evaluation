<?php
	require 'Mail.php';
	$this->load->library('session');
	$mail = new Mail;
	$otp=rand(100000,999999);
	$msg="Your otp is <b>".$otp."</b>";
	$sub="One time Password";
	$to=$records;
	$bool=$mail->send_msg($to,$msg,$sub);
	if ($bool==true)
	{
		$this->session->set_userdata('otp',$otp);
		echo "Otp has been sent Successful..";
	}
	else
	{
		echo "Something wrong..! Contact Administrator....";
	}
?>