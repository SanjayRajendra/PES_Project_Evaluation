<?php
	require 'PHPMailer-master/PHPMailerAutoload.php';
	class Mail
	{
		public function send_msg($to,$msg,$sub)
		{
			$email =  "pesgeneratedotp@gmail.com";
			$password = "pesssr2017";
			$to_id = $to;
			$message = $msg;
			$subject = $sub;
			try
			{
				$mail = new PHPMailer;	
				$mail->isSMTP();	
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 587;
				$mail->SMTPSecure = 'tls';
				$mail->SMTPAuth = true;
				$mail->Username = $email;
				$mail->Password = $password;
				$mail->addAddress($to_id);
				$mail->Subject = $subject;
				$mail->msgHTML($message);
				if($mail->send())
					return true;

			}
			catch(phpmailerException $e)
			{
				return false;	
			}
			catch(Exception $e)
			{
				return false;
			}
	}
	
}
?>
