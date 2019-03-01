
function goback() {
    window.history.back();
}

function validate_name(id)
{
  var idm=document.getElementById(id);
  idm.value=idm.value.toUpperCase();
  if(idm.value=="")
  {

  }
  else if(!(idm.value.match("^[A-Za-z]{1,20}$")))
  {
	var x=document.getElementById(id);
	var p=x.parentNode;
    document.getElementById(id).focus();
    document.getElementById(id).select();
	var z=document.getElementById("para");
	if(!(p.contains(z))){
	var para = document.createElement("p");
	para.setAttribute("id","para");
	para.innerHTML="*Please provide proper name";
	para.style.color="red";
	p.appendChild(para);
	}
  }
  else
  {
		var x=document.getElementById(id).parentNode;
		var y=document.getElementById("para");
		x.removeChild(y); 
  }
}



function validate_srn(id)
{
  var idm=document.getElementById(id);
  idm.value=idm.value.toUpperCase();
  if(idm.value=="")
  {

  }
  else if(!(idm.value.match("^[0-1]{2}[A-Za-z]{2}[0-9]{2}[A-Za-z]{3}[0-9]{3}$")))
  {
	var x=document.getElementById(id);
	var p=x.parentNode;
	//alert(p);//table cell
    document.getElementById(id).focus();
    document.getElementById(id).select();
	var z=document.getElementById("para");
	if(!(p.contains(z))){
	var para = document.createElement("p");
	para.setAttribute("id","para");
	para.innerHTML="*Please provide proper SRN";
	para.style.color="red";
	p.appendChild(para);
	}
	
  }
  else
  {
	//var p=document.getElementById(id).parentNode;
	//p.removeChild(p.childNodes[0]);
    var p = document.getElementById(id).parentNode;
	//var p=elem.parentNode;
	var para=document.getElementById("para");
    p.removeChild(para);
	}
}

function validate_mob(id){
  var idm=document.getElementById(id);
  if(idm.value=="")
  {
	idm.value="+91";
  }
  else if(!(idm.value.match("^[+]{1}[9]{1}[1]{1}[6-9]{1}[0-9]{9}$")))
  {
	var x=document.getElementById(id);
	var p=x.parentNode;
    document.getElementById(id).focus();
    document.getElementById(id).select();
	var z=document.getElementById("para");
	if(!(p.contains(z))){
	var para = document.createElement("p");
	para.setAttribute("id","para");
	para.innerHTML="*Please provide correct number";
	para.style.color="red";
	p.appendChild(para);
	}
  }
  else{
  
	var p=document.getElementById(id).parentNode;
	var d=document.getElementById("para");
	p.removeChild(d);
  }
}


function validate_year(id){
	var idm=document.getElementById(id);
	if(idm.value=="")
	{

	}
	else if(!(idm.value<=40))
	{
	var x=document.getElementById(id);
	var p=x.parentNode;
    document.getElementById(id).focus();
    document.getElementById(id).select();
	var z=document.getElementById("para");
	if(!(p.contains(z))){
	var para = document.createElement("p");
	para.setAttribute("id","para");
	para.innerHTML="*Value exceeded(max:40)";
	para.style.color="red";
	p.appendChild(para);
	}
	}
	else
	{
	var p=document.getElementById(id).parentNode;
	var c=document.getElementById("para");
	p.removeChild(c); 
	}
}

function check(id){
	var a=document.getElementById(id);
	var b=document.getElementById("pass");//new pass
	if(a.value=="")
	{

	}
	else if(!(a.value==b.value))
	{
	//alert("passwords don't match");
	var x=document.getElementById(id);
	var p=x.parentNode;
    //b.focus();
    //b.select();
	var z=document.getElementById("para");
	if(!(p.contains(z))){
	var para = document.createElement("p");
	para.setAttribute("id","para");
	para.innerHTML="*Passwords don't match(Enter again)";
	para.style.color="red";
	p.appendChild(para);
	a.value="";
	b.value="";
	b.focus();
	}
	}
	else
	{
		if(a.value==b.value)
		{
		var p=document.getElementById(id).parentNode;
		var y=document.getElementById("para");
		p.removeChild(y);
			}
	}
}




















