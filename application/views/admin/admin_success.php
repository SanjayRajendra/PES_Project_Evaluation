<?php
	if(empty($records))
	{
		$this->load->view('admin/admin_login');
		echo "<script>alert('Invalid ID or password!');</script>";
	}
	else
	{
		$r=$records[0]->username;
		$this->session->set_userdata('admin', $r);
		header("Location:general_view");
	}
?>