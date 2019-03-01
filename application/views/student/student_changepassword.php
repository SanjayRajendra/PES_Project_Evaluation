<?php
	$old_password=$records[0]->password;
	$old_given=sha1($a['old_given']);    //$old_given=$a['old_given'];
	$new=sha1($a['new']);
	$confirm=sha1($a['confirm']);
	$srn=$a['srn'];

	if($old_password==$old_given && $new==$confirm)
	{
		$this->db->set('password',$new);
		$this->db->where('srn',$srn);
		$this->db->update('student');
		header('Location:project_status');
	}
	else
	{
		/*$data['a']=array('msg'=>"Invalid old password or new and confirm passwords dont match",'goto'=>"student/change"
		);
		$this->load->view('student/error_msg',$data);*/
		echo "<script>alert('Invalid old password or new and confirm passwords dont match');</script>";
		$this->load->view('student/change');
	}
?>