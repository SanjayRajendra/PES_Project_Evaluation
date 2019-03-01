function createstudents() {
	for (var i = 1;i<1000;i++)
	{
		$.ajax(
    	{
        	url:'add_student',
        	method:'post',
        	data:{
        		'program':"B.Tech",
        		'srn':"01fb15ecs"+i,
        		'fname':"fname",
        		'mname':"mname",
        		'lname':"lname",
        		'branch':"cs",
        		'year':"2018",
        		'sem':"6th",
        		'section':"e",
        		'email':"student"+i+"@mail.com",
        		'mobile':"1234"+i,
        		'password':"aaaa"
        	},
        	success:function(response)
        	{
            	$("#cid").html(i);
        	}
    	});
	}
}

function login() {
	for (var i = 1;i<=1000;i++)
	{
			$.ajax(
    	{
        	url:'check_student',
        	method:'post',
        	data:{
        		'srn':"01fb15ecs"+i,
        		'password':"aaaa"
        	},
        	success:function(response)
        	{
            	$("#lid").html(i);
        	}
    	});
	}
}