    function msg() 
    {
       $("#email_text").html("Sending...");
       userid=$('#email').val();
      $.ajax(
      {
         url:'new_student_send',
         method:'post',
         data:{'userid':userid},
         success:function(response) {
            $("#email_text").html(response);
            $('#otpbutton').val("Resend OTP");
         }
      });
  }

    function validate_otp() 
    {
      
      otp=$('#otp').val();
      $.ajax(
      {
         url:'new_check_otp/',
         method:'post',
         data:{'otp':otp},
         success:function(response) {
            $("#error_otp").html(response);
            
         }
      });
  }


