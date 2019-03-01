<!DOCTYPE html> 
<html> 
<head> 
  <title>Project Panel</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
  <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>css/admin.css">
  <link rel="icon" href="<?php echo base_url(); ?>images/PES.png"/>
  <script src="<?php echo base_url(); ?>js/jquery.js"></script> 
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/validate.js"></script>
  
  <script>
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
  </script>
</head> 
<body onload="load();"> 
<div class="container"> 
  <div class="page-header"> 
      <img src="<?php echo base_url(); ?>images/pes_head.png" class="img-rounded" style="width:60%;">
      <div class="row">
        <div class="col-sm-10">
          <div class="row">
           <ul class="nav nav-tabs"> 
            <li><a href="<?php echo base_url();?>student/student_general">General</a></li>
             <li class="active"><a href="#">Project</a></li> 
             <li><a href="<?php echo base_url();?>student/project_status">Status</a></li>
             <li><a href="<?php echo base_url();?>student/remarks">Remarks</a></li>
             <li><a href="<?php echo base_url();?>student/uploads">Uploads</a></li>
             <li><a href="<?php echo base_url();?>student/student_change">Change Password</a></li>
          </ul>
         </div>
        </div>
        <div class="col-sm-2">
          <ul class="nav nav-tabs">
            <li><a href="<?php echo base_url();?>student/student_logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
          </ul>
        </div>
      </div>
        <h1><small style="background-color: white;">Project Panel</small></h1>
  </div>
  <div>
    <?php
      if (!empty($records2)) 
      {
        echo "<div class='alert alert-info'>
  <strong>Project team already submitted.</strong></div>";
      }
    ?>
    <?php echo form_open_multipart('student/project_panel_submit',array('class' => 'form-horizontal'));?>
      <div class="col-sm-1"></div>
      <div class="form-group">         
        <div class="col-sm-4">
            <label>Team Size : </label> 
            <select class="form-control" id="select" name="select1" onchange="sample(this.id)" onblur="set();" value="Select" required>
              <option value="">-----</option>
            </select>
        </div>
      </div>
      <div class="col-sm-1"></div>
      <div class="form-group">			
        <div id="div" class="col-sm-4"></div>
        <div class="col-sm-4">       
            <div id="div2"></div>
        </div>
			</div>
      <div class="col-sm-1"></div>
      <div class="form-group">
        <div class="col-sm-4">      
          <label>Project Area : </label>
          <select class="form-control" id="based_project" name="based_project" onchange="get_guide();" required>
            <option value="">-----</option>
            <option value="Web Technology">Web Technology</option>
            <option value="Data Science">Data Science</option>
            <option value="Algorithms & Computing Models">Algorithms & Computing Models</option>
            <option value="Artificial Intelligence">Artificial Intelligence</option>
            <option value="System & Core Computing">System & Core Computing</option>
            <option value="Computer Network & Communications">Computer Network & Communications</option>
            <option value="other">Other</option>
          </select>
        </div>
      </div>
      <div class="col-sm-1"></div>
        <div class="form-group">         
          <div class="col-sm-4">
            <label>Guide:</label> 
            <select class="form-control" id="select2" name="select2" required>
            <option value="">-----</option>
            </select>
          </div>
        </div>
        <div class="col-sm-1"></div>
          <div class="form-group">
            <div class="col-sm-4">      
              <label>Project Name:</label>  
              <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter Project Name" required> 
            </div>
          </div>
          <div class="col-sm-1"></div>
          <div class="form-group">
            <div class="col-sm-8">
              <label for="comment">Description:</label>
              <textarea class="form-control" rows="4" id="description" name="description"></textarea>
            </div>
          </div>
          <div class="col-sm-1"></div>
          <div class="form-group">
            <div class="col-sm-4">       
              <input class="btn btn-primary" type="submit" id="submit" value="Submit" style="background-color: #ff7733;border:none;">
            </div>
          </div>
  </div>
	<?php echo form_close();?>
</div> 
</body> 
</html> 
