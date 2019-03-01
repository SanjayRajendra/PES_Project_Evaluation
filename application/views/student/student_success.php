<?php
	if(empty($records))
	{		
		$this->load->view('student/student_login');
		echo "<script>alert('Invalid srn or password!');</script>";
	}
	else
	{
		if (!empty($records1))
		{	
			$r1=$records1[0];
			$this->session->set_userdata('project_id', $r1->project_id);
		}
		$r=$records[0];
		$this->session->set_userdata('student', $r->srn);
		header("Location:student_general");
	}
?>