
function check_exp(id1,id2)
{
    var a=document.getElementById(id1).checked;
    if(a== true)
    {
        var z= document.getElementById(id2);
        z.disabled=false;
    }
    if(a==false)
    {
        var z= document.getElementById(id2);
        z.disabled=true;
    }
}
function docheck(id,id2)
{
    var z= document.getElementById(id);
    var x=document.getElementById(id2);
    if(!z.value.match("^[0-9]{1,2}$"))
    {
        alert("Please provide valid number!");
        z.value="";
    }
    if(x.value!="" && z.value!="")
    {  
        var l=parseInt(x.value)+parseInt(z.value);
        if(l>50)
        {
            alert("Max limit exceed!");
            x.value=z.value="";
        }
    }
}

function msg() 
{
    userid=$('#email').val();
    if (userid=="") 
    {
        alert("Enter proper mail id");
    }
    else
    {
        $("#email_text").html("Sending...");
        $.ajax(
        {
            url:'new_faculty_send',
            method:'post',
            data:{'userid':userid},
            success:function(response) {
                $("#email_text").html(response);
                $('#otpbutton').val("Resend OTP");
            }
        });
    }
}
function validate_otp(){
      otp=$('#otp').val();
      $.ajax(
      {
        url:'new_check_otp',
        method:'post',
        data:{'otp':otp},
        success:function(response) {
            $("#body_content").html(response);
            
        }
      });
}
