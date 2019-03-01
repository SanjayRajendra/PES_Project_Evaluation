 function validate_name(id){
 			var idm=document.getElementById(id);
 			//setTimeout(function() { alert("my message"); }, 10);
			idm.value=idm.value.toUpperCase();
			if(idm.value==""){
			
			}
			else if(!(idm.value.match("^[  A-Z  a-z  ]{1,25}$"))){
				var x=document.getElementById(id);
				//var p=x.parentNode;
				document.getElementById(id).focus();
				document.getElementById(id).select();
				var p=x.parentNode;
				var z=document.getElementById("para");
				if(!(p.contains(z))){
					var para = document.createElement("p");
					para.setAttribute("id","para");
					para.innerHTML="*Please provide proper name";
					para.style.color="red";
					p.appendChild(para);
				}	
			}
			else{
				var x=document.getElementById(id).parentNode;
				var y=document.getElementById("para");
				x.removeChild(y);
			}
		}
		
		function validate_srn(id)
		{
			var idm=document.getElementById(id);
			//idm.value=idm.value.toUpperCase();
			if(idm.value==""){
			
			}
			else if(!(idm.value.match("^[  0-1]{2,4}[A-Za-z]{2}[0-9]{2}[A-Za-z]{3}[0-9   ]{3,6}$"))){
				var x=document.getElementById(id);
				var p=x.parentNode;
				//alert(p);//table cell
				document.getElementById(id).focus();
				document.getElementById(id).select();
				var z=document.getElementById("para");
				if(!(p.contains(z))){
					var para = document.createElement("label");
					para.setAttribute("id","para");
					para.setAttribute("class","help-block");
					para.innerHTML="*Please provide proper SRN";
					para.style.color="red";
					p.appendChild(para);
				}
	
			}
			else{
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
			if(idm.value==""){
			}
			else if(!(idm.value.match("^[6-9]{1}[0-9]{9}$"))){
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
		
		
		function check(id){
			var a=document.getElementById(id);  //confirm password
			var b=document.getElementById("pass");//new pass
			if(a.value=="" && b.value==""){
			}
			else if(!(a.value==b.value)){
				//alert("passwords don't match");
				var x=document.getElementById(id);
				var p=x.parentNode;
				b.focus();	
				b.select();
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
					//document.getElementById("submit").disabled=true;
				}
			}
			else{
				if(a.value==b.value){
					var p=document.getElementById(id).parentNode;
					var y=document.getElementById("para");
					p.removeChild(y);
					//document.getElementById("submit").disabled=false;
				}
			}
		}
	

