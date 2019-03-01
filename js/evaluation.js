function get_model(pid) 
{
    $('#modal-fullscreen').html('');
    $.ajax(
    {
        url:'<?php echo base_url();?>index.php/Pes/faculty_project_pop_accepted',
        method:'post',
        data:{'pid':pid},
        success:function(response)
        {
            $('#modal-fullscreen').append(response);
        }
    });
}

function sum_marks(id,srn)
{
    
    var idm=document.getElementById(id);
    var maxm=parseFloat(idm.max);
    var val_given=parseFloat(idm.value);
    if(val_given>maxm)
    {
        alert("max is "+maxm);
        idm.value="";
        idm.focus();
        return;
    }

    document.getElementById(id).disabled=true;
    var tot="total"+srn;
    var total=document.getElementById(tot);
    var curr_tot=parseFloat(total.innerHTML);
    curr_tot+=val_given;
    curr_tot.toFixed(2);
    total.innerHTML=curr_tot.toString();
}

function h_total(id)
  {
    var idm=document.getElementById(id);
    var maxm=parseFloat(idm.max);
    var val_given=parseFloat(idm.value);
    if(val_given>maxm)
    {
      alert("max is "+maxm);
      idm.value="";
      idm.focus();
      return;
    }

    document.getElementById(id).disabled=true;
    var id1=document.getElementById('formulation');
    var id2=document.getElementById('review');
    var id3=document.getElementById('discussion');
    var id4=document.getElementById('method');
    var id5=document.getElementById('originality');
    if(id1.value=="" || id2.value=="" || id3.value=="" || id4.value=="" ||id5.value=="" )
    {
        return;
    }
    
    var sum=parseFloat(id1.value)+parseFloat(id2.value)+parseFloat(id3.value)+parseFloat(id4.value)+parseFloat(id5.value);  //alert("sum "+sum);
    var reduced_to_15=(sum*0.3).toFixed(2);  //alert("reduced to 15 "+(sum*0.3));
    var htotal=document.getElementById('htotal');
    htotal.innerHTML=reduced_to_15.toString();
    var total=document.getElementById('total');
    total.innerHTML=reduced_to_15.toString();
    
}

function total(id)
{
    var id1=document.getElementById('formulation');
    var id2=document.getElementById('review');
    var id3=document.getElementById('discussion');
    var id4=document.getElementById('method');
    var id5=document.getElementById('originality');
    if(id1.value=="" || id2.value=="" || id3.value=="" || id4.value=="" ||id5.value=="" )
    {
        alert("please fill the above first!");
        document.getElementById(id).value="";
        document.getElementById(id).focus();
        return;
    }
    
    //document.getElementById(id).disabled=true;
    var idm=document.getElementById(id);
    var maxm=parseFloat(idm.max);
    var val_given=parseFloat(idm.value);
    if(val_given>maxm)
    {
      alert("max is "+maxm);
      idm.value="";
      idm.focus();
      return;
    }
    document.getElementById(id).disabled=true;
    var htotal=parseFloat(document.getElementById('htotal').value);
    var total=document.getElementById('total');
    var curr_tot=parseFloat(total.innerHTML);
    curr_tot+=val_given;
    total.innerHTML=curr_tot.toString();
}

function set_zero(id)
{
  var id1=document.getElementById('formulation');
  var id2=document.getElementById('review');
  var id3=document.getElementById('discussion');
  var id4=document.getElementById('method');
  var id5=document.getElementById('originality');
  var id6=document.getElementById('contribution');
  var id7=document.getElementById('presentation');
  var id8=document.getElementById('viva');
  var total=document.getElementById('total');
  var htotal=document.getElementById('htotal');
  total.innerHTML="0";
  htotal.innerHTML="0";

  id1.value=id2.value=id3.value=id4.value=id5.value=0;
  id1.disabled=id2.disabled=id3.disabled=id4.disabled=id5.disabled=id6.disabled=id7.disabled=id8.disabled=false;
}
