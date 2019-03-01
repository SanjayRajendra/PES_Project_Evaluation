function check_s(id) {
	var l=document.getElementById('label_id');
	var r=document.getElementById(id);
	if(r.check=="check")
	{
		l.innerHTML="Enter SRN";
	}
	else
	{
		l.innerHTML="Enter SRN";
	}
}

function check_f(id) {
	var l=document.getElementById('label_id');
	var r=document.getElementById(id);
	if(r.check=="checked")
	{
		l.innerHTML="Enter EMPID";
	}
	else
	{
		l.innerHTML="Enter EMPID";
	}
}


