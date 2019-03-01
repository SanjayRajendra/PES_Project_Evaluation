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
         xmlhttp.open("POST", "<?php echo base_url();?>"+"student/send_student/" + $('#userid').val(), true);
         xmlhttp.send();
      }
      function getname() 
      {
          var filename=$('#userfile').val();
          var extension = filename.replace(/^.*[\\\/]/, '');
          $('#file').val(extension);
      }
        function load() 
  {
    var s=document.getElementById('select');
    var s1=document.getElementById('select2');
      <?php
        if (!empty($records1)) 
        { 
            echo "$('#submit').attr('disabled','disabled')";
        }
      ?>

    <?php 
    $r=$records[0];
      $n=$r->max_students; 
    ?>
    for (var i = 1;i< <?php echo $n+1;?> ; i++)
    {
      var option = document.createElement("option");
      option.text=i;
      option.value=i;
      s.add(option);
    }
  }

  function sample(id)
  {
      var d=document.getElementById(id);
      var div=document.getElementById("div");
      var div2=document.getElementById("div2");
      while (div.firstChild)
        div.removeChild(div.firstChild);
      while (div2.firstChild)
        div2.removeChild(div2.firstChild);
  
      for (var i = 0; i < d.value; i++)
      {
        var a=i+1;
        var t = document.createElement('label');
        t.setAttribute("id","p"+i);
        t.innerHTML="Srn "+a+": ";
        var input = document.createElement("input");
        input.setAttribute("id","input"+a);
        input.setAttribute("name","input"+a);
        input.setAttribute("class","form-control");
        input.setAttribute("required","required");
        input.setAttribute("onblur","get(this.id)");
        input.setAttribute("onchange","validate_srn(this.id)");
        div.appendChild(t);
        div.appendChild(input);
        var p=document.createElement('label');
        p.innerHTML= "Name : "+a;
        var p1=document.createElement('label');
        p1.setAttribute("id","pinput"+a);
        p1.setAttribute("class","form-control");
        p1.setAttribute("placeholder","SRN");
        div2.appendChild(p);
        div2.appendChild(p1);
      }
  }
  function get(id)
  {
       var b=document.getElementById(id); 
       if (b.value!="")
       {
         var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function()
         {
          if (this.readyState == 4 && this.status == 200)
          {
            $("#p"+b.id).html(this.responseText);
          }
         };
         xmlhttp.open("POST", "<?php echo base_url();?>student/get_student_name/" + b.value , true);
         xmlhttp.send();
        }
  }
  function get_guide() 
  {
      $('#select2').html('<option>-----</option>');
      var mid=document.getElementById('based_project');
      $.ajax(
      {
         url:'<?php echo base_url();?>student/get_guide',
         method:'post',
         data:{'mid':mid.value},
         success:function(response) {
            $('#select2').append(response);
         }
      });
  }
  function set() 
  {
      $('#input1').val("<?php echo $_SESSION['student'];?>");
      $('#input1').attr('onchange','donotchange()');
  }
  function donotchange() 
  {
      $('#input1').val("<?php echo $_SESSION['student'];?>");
  }
  function get_model(pid) 
        {
          $('#modal-fullscreen').html('');
           $.ajax(
                {
                  url:'<?php echo base_url();?>student/student_pop',
                  method:'post',
                  data:{'pid':pid},
                  success:function(response)
                  {
                    $('#modal-fullscreen').append(response);
                  }
          });
        }