<?php
	echo "<script>alert('".$a['msg']."');</script>";
	$this->load->view($a['goto']);
?>