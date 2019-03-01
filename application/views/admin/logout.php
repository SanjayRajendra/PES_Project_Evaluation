<?php
	$this->session->unset_userdata('admin');
	header('Location:'.base_url().'admin/admin_login');
?>