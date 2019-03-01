      function msg()
      { 
         $("#email_text").html("Sending...");
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() 
         {
            if (this.readyState == 4 && this.status == 200) 
            {
                   $("#email_text").html(this.responseText);
                   $('#otpbutton').val("Resend OTP");
            }
         };
         xmlhttp.open("POST", "send_student/" + $('#userid').val(), true);
         xmlhttp.send();
      }
      function getname() 
      {
          var filename=$('#userfile').val();
          var extension = filename.replace(/^.*[\\\/]/, '');
          $('#file').val(extension);
      }