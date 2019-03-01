<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
	<script src="<?php echo base_url(); ?>js/jquery.js"></script> 
	<script src="<?php echo base_url(); ?>js/stest.js"></script>
</head>
<body>
<table border="1px">
	<tr>
		<th>
			Fun Name
		</th>
		<th>
			No. of Input
		</th>
		<th>
			Output
		</th>
		<th>
			Action
		</th>
	</tr>
	<tr>
		<td>
			Create studnet
		</td>
		<td>
			1000
		</td>
		<td id="cid">
			0
		</td>
		<td>
			<input type="button" name="Check" onclick="createstudents();" value="Check">
		</td>
	</tr>
	<tr>
		<td>
			Student Login
		</td>
		<td>
			1000
		</td>
		<td id="lid">
			0
		</td>
		<td>
			<input type="button" name="Check" onclick="login();" value="Check">
		</td>
	</tr>

</table>
</body>
</html>