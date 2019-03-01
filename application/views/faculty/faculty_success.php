<?php
	if(empty($records))
	{
		$this->load->view('faculty/faculty_login');
		echo "<script>alert('Invalid ID or password!');</script>";
	}
	else
	{
		$r=$records[0];
		$this->session->set_userdata('faculty', $r->username);
		header("Location:faculty_general");
	}
?>