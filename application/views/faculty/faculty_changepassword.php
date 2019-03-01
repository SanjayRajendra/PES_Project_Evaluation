<?php
	$old_password=$records[0]->password;
	$old_given=$a['old_given'];
	$new=$a['new'];
	$confirm=$a['confirm'];
	$empid=$a['empid'];
	if($old_password==$old_given && $new==$confirm)
	{
		$this->db->set('password',$new);
		$this->db->where('empid',$empid);
		$this->db->update('faculty');
		header('Location:faculty_status');
	}
	else
	{
		$data['a']=array('msg'=>"Invalid old password or passwords dont match",'goto'=>"faculty/change");
		$this->load->view('faculty/error_msg',$data);
	}
?>