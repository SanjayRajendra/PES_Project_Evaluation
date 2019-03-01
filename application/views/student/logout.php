<?php
	$this->session->unset_userdata('student');
	$this->session->unset_userdata('project_id');
	header("Location:".base_url()."student/index");
?>