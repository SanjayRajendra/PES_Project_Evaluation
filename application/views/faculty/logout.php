<?php
	$this->session->unset_userdata('faculty');
	header("Location:".base_url()."faculty/faculty_login");
?>