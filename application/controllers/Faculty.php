<?php
class Faculty extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
}	

public function faculty_login()
{
	$this->load->view('faculty/faculty_login');
}

public function faculty_insert()
{
	$this->load->view('faculty/faculty_insert');
}

public function new_faculty_send($value='')
{
	$userid=$this->input->post('userid');
	$data['records']= $userid;
	$this->load->view('mail/send_new_faculty',$data);
}
public function new_check_otp($value='')
{
	$input=$this->input->post('otp');
	$otp = $this->session->userdata('otp');
	if (isset($_SESSION['otp']) && $otp==$input) {
		$this->load->view("faculty/faculty_insert");
	}
	else
		echo "<script>alert('Invalid otp');document.location.reload();</script>";
}

public function faculty_forgot()
{
	$this->load->view('faculty/faculty_forgot');
}

public function add_faculty()
{
	$this->load->model('Project_model');
	$data = array('title' => $this->input->post('title') ,
	 'empid' => $this->input->post('empid'),
	 'name' => $this->input->post('fname') ,
	 'mname' => $this->input->post('mname'),
	 'lname' => $this->input->post('lname') ,
	 'department' => $this->input->post('dept') ,
	 'designation' => $this->input->post('designation') ,
	 'exp_in_pes' => $this->input->post('ex_in_pes') ,
	 'exp_non_pes' => $this->input->post('ex_non_pes') ,
	 'research_area' => $this->input->post('research_area') ,
	 'spl_area' => $this->input->post('specialisation') ,
	 'email' => $this->input->post('email') ,
	 'phoneno' => $this->input->post('mobile') ,
	 'password' => sha1($this->input->post('password'))  //'password' => $this->input->post('password') 
	  );
	$spec = $this->input->post('pv');
	$empid = $this->input->post('empid');
	if($this->Project_model->insert_faculty($data,$spec,$empid))
		$this->load->view('faculty/faculty_login');
	else
	{
		$data['a']=array('msg'=>"You have already registered!Please login",
		'goto'=>"faculty/faculty_login");
		$this->load->view('faculty/error_msg',$data);
	}
}



public function check_faculty()
{
	$this->load->model('Project_model');
	$empid=$this->input->post('username');
	$password=$this->input->post('password');
	$password=sha1($password);
	$query = $this->db->get_where("faculty_login",array('username'=>$empid , 'password'=>$password));
	$data['records'] = $query->result();
	$this->load->view('faculty/faculty_success',$data);
}

public function send_faculty()
{
	$this->load->helper('url');
	$userid=$this->uri->segment('3');
	$query=$this->db->get_where('faculty',array('empid' => $userid));
	$data['records']= $query->result();
	$this->load->view('mail/send_otp',$data);
}

public function update_faculty()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('otp', 'otp', 'callback_otp_check');
	if ($this->form_validation->run() == FALSE)
            $this->load->view('faculty/faculty_forgot');
    else
    {
        $pass=sha1($this->input->post('npassword'));
        $id=$this->input->post('userid');
        $this->db->set('password',$pass);
		$this->db->where('empid',$id);
		$this->db->update('faculty');
        $this->load->view('faculty/faculty_login');
    }
}

public function otp_check($str)
{
	$this->load->library('form_validation');
	$otp = $this->session->userdata('otp');
	if ($str==$otp) 
		return true;
	else
	{
		$this->form_validation->set_message('otp_check', 'Invalid otp');
		return false;
	}
}

public function faculty_change()
{
	if(isset($_SESSION['faculty']))
		$this->load->view('faculty/change');
	else
		$this->load->view('faculty/faculty_login');
}

public function faculty_changepass()
{
	$this->load->model('Project_model');
	$empid=$_SESSION['faculty'];
	$old=$this->db->query("select password from faculty where empid='$empid'");
	$data['records']=$old->result();
	$a=array('empid'=>$_SESSION['faculty'],
	'old_given'=>sha1($this->input->post('old')),
	'new'=>sha1($this->input->post('new')),
	'confirm'=>sha1($this->input->post('confirm'))
	);
	$data['a']=$a;
	$this->load->view('faculty/faculty_changepassword',$data);
}

public function faculty_edit()
{
	if(isset($_SESSION['faculty']))
		$this->load->view('faculty/edit');
	else
		$this->load->view('faculty/faculty_login');
}

public function faculty_logout()
{
	if(isset($_SESSION['faculty']))
		$this->load->view('faculty/logout');
	else
		$this->load->view('faculty/faculty_login');
}

public function marks(){
	if(isset($_SESSION['faculty']))
	{
		$empid=$_SESSION['faculty'];
		$query=$this->db->query("select marks_view.student_id,marks_view.project_id,marks_view.e1,marks_view.e2,marks_view.e3,marks_view.e4,marks_view.e5 from marks_view,project where marks_view.project_id=project.id and project.guide_id='$empid'");
		$data['records'] = $query->result();
		$this->load->view('faculty/marks',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}
public function faculty_general()
{
	if(isset($_SESSION['faculty']))
	{
		$empid=$_SESSION['faculty'];
		$query=$this->db->query("select ug_projects,pg_projects from faculty where empid='$empid' and (ug_projects=0 and pg_projects=0)");
		$data['records'] = $query->result();
		$query=$this->db->query("select empid,name,lname,designation,exp_in_pes,exp_non_pes,spl_area,research_area,email,phoneno,eligibility,ug_projects,pg_projects from faculty where empid='$empid';");
		$data['records1'] = $query->result();
		$query=$this->db->query("SELECT panel_members.panel_id FROM panel_members WHERE panel_members.empid='$_SESSION[faculty]'");
		$res=$query->result();
		if(!empty($res))
		{
			$res=$res[0]->panel_id;
			$query=$this->db->query("SELECT faculty.name,faculty.lname FROM panel_members,panel,faculty WHERE panel.panel_id=panel_members.panel_id AND panel.panel_id='$res' AND faculty.empid=panel_members.empid");
			$data['panel_mem'] = $query->result();
			$data['panel_id']=$res;
		}
		else
		{
			$data['panel_mem']="";
			$date['panel_id']="";
		}
		
		$this->load->view('faculty/faculty_general',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function faculty_status()
{
	if(isset($_SESSION['faculty']))
	{
		$empid=$_SESSION['faculty'];
		$sql=$this->db->query("select id,name,project_area from project where guide_id='$empid' and status='pending'");
		$data['records']=$sql->result();
		$this->load->view('faculty/faculty_status',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function faculty_project_accept()
{
	if(isset($_SESSION['faculty']))
	{
		$sql=$this->db->query("select p.id,p.name,p.project_area,COUNT(t.student_id) as std  FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.status not in('pending','pending_at_admin','faculty_rejected','rejected_admin') AND guide_id='$_SESSION[faculty]' GROUP by p.id");
		$data['records']=$sql->result();
		$this->load->view('faculty/projects_accept',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function faculty_project_pop()
{
	$pid=$this->input->post('pid');
	$sql=$this->db->query("select p.id,p.name,p.project_area,p.description,p.date FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.id='$pid' GROUP by p.id");
	$data['records']=$sql->result();
	$sql=$this->db->query("select fname,lname,srn from student,project_team where srn=student_id and project_id='$pid'");
	$data['records1']=$sql->result();
	$this->load->view('faculty/project_pop',$data);
}

public function faculty_project_approved()
{
	$id=$this->input->post('pid');
	$comment=$this->input->post('comment');
	$this->db->set(array('status'=>'pending_at_admin','remarks'=>$comment));
	$this->db->where('id',$id);
	$this->db->update('project');
}

public function faculty_project_reject()
{
	$id=$this->input->post('pid');
	$comment=$this->input->post('comment');
	$this->db->set(array('status'=>'faculty_rejected','remarks'=>$comment));
	$this->db->where('id',$id);
	$this->db->update('project');
	$query=$this->db->query("select email,remarks,name,status FROM student,project_team,project where student_id=srn and project_id=id and project_id='$id';");
	$data['records']= $query->result();
	$this->load->view('mail/send_remarks',$data);
}

public function add_faculty_project()
{
	$this->load->model('Project_model');
	$empid=$_SESSION['faculty'];
	$ug=$this->input->post('ug_projects');
	$pg=$this->input->post('pg_projects');
	$this->db->set('ug_projects',$ug);
	$this->db->set('pg_projects',$pg);
	$this->db->where('empid',$empid);
	$this->db->update('faculty');
	header("Location:faculty_status");
}

public function faculty_project_pop_accepted()
{
	$pid=$this->input->post('pid');
	$sql=$this->db->query("select p.id,p.name,p.project_area,p.status,p.description,p.date,p.remarks FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.id='$pid' GROUP by p.id");
	$data['records']=$sql->result();
	$sql=$this->db->query("select fname,lname,srn from student,project_team where srn=student_id and project_id='$pid'");
	$data['records1']=$sql->result();
	$this->load->view('faculty/project_pop_accepted',$data);
}

public function evaluation()
{
	if (isset($_SESSION['pid']))
		$this->session->unset_userdata('pid');
	$pid=$this->input->post('pid');
	$this->session->set_userdata('pid',$pid);
	$this->evaluation1("");
}

public function evaluation1($msg='')
{
	if (isset($_SESSION['faculty'])) 
	{
		$query=$this->db->query("SELECT p.id,p.name,description,p.status FROM project p WHERE guide_id='$_SESSION[faculty]' and status='approved_admin' and p.id='$_SESSION[pid]'");
		$data['records']=$query->result();
		$query=$this->db->query("SELECT srn,fname,mname,lname FROM student,project_team WHERE srn=student_id and  project_id='$_SESSION[pid]'");
		$data['records1']=$query->result();
		$data['msg']=$msg;
		$count=count($data['records1']);
		$srn=$data['records1'][$count-1]->srn;
		$query=$this->db->query("select evaluation1.student_srn from evaluation1 where student_srn='$srn'");
		$data['records2']=$query->result();
		$this->load->view('faculty/evaluation1',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function evaluation1_submit()
{
	$total=$this->input->post('realworld')+$this->input->post('title')+$this->input->post('method')+$this->input->post('presentation')+$this->input->post('viva');
	$this->load->model('Project_model');
	$data=array(
	'student_srn'=>$this->input->post('srn'),
	'application_realworld'=>$this->input->post('realworld'),
	'title'=>$this->input->post('title'),
	'method'=>$this->input->post('method'),
	'presentation'=>$this->input->post('presentation'),
	'viva'=>$this->input->post('viva'),
	'remarks'=>$this->input->post('remarks'),
	'total'=>$total);
	if ($this->Project_model->insert_evaluation1($data)) 
	{
		$msg="<script>alert('Updated successfully');</script>";
		$this->evaluation1($msg);
	}
	else
	{
		$msg="<script>alert('".$this->input->post('srn')." is already updated once..!');</script>";
		$this->evaluation1($msg);
	}
}

public function evaluation2($msg='')
{
	if (isset($_SESSION['faculty'])) 
	{
		if (!isset($_SESSION['pid'])) 
		{
			$pid=$this->input->post('pid');
			$this->session->set_userdata('pid',$pid);
		}
		$query=$this->db->query("SELECT p.id,p.name,description,p.status FROM project p WHERE guide_id='$_SESSION[faculty]' and status='approved_admin' and id='$_SESSION[pid]'");
		$data['records']=$query->result();
		$query=$this->db->query("SELECT srn,fname,mname,lname FROM student,project_team WHERE srn=student_id and  project_id='$_SESSION[pid]'");
		$data['records1']=$query->result();
		$data['msg']=$msg;
		$count=count($data['records1']);
		$srn=$data['records1'][$count-1]->srn;
		$query=$this->db->query("select evaluation2.student_srn from evaluation2 where student_srn='$srn'");
		$data['records2']=$query->result();
		$this->load->view('faculty/evaluation2',$data);

	}
	else
		$this->load->view('faculty/faculty_login');
}

public function evaluation2_submit()
{
	$total=$this->input->post('progress')+$this->input->post('method')+$this->input->post('presentation')+$this->input->post('viva');
	$this->load->model('Project_model');
	$data=array(
	'student_srn'=>$this->input->post('srn'),
	'progress'=>$this->input->post('progress'),
	'presentation'=>$this->input->post('presentation'),
	'method'=>$this->input->post('method'),
	'viva'=>$this->input->post('viva'),
	'remarks'=>$this->input->post('remarks'),
	'total'=>$total);
	if ($this->Project_model->insert_evaluation2($data)) 
	{
		$msg="<script>alert('Updated successfully');</script>";
		$this->evaluation2($msg);
	}
	else
	{
		$msg="<script>alert('".$this->input->post('srn')." is already updated once..!');</script>";
		$this->evaluation2($msg);
	}
}

public function evaluation3($msg='')
{
	if (isset($_SESSION['faculty'])) 
	{
		if (!isset($_SESSION['pid'])) 
		{
			$pid=$this->input->post('pid');
			$this->session->set_userdata('pid',$pid);
		}
		$query=$this->db->query("SELECT p.id,p.name,description,p.status FROM project p WHERE guide_id='$_SESSION[faculty]' and status='approved_admin' and id='$_SESSION[pid]'");
		$data['records']=$query->result();
		$query=$this->db->query("SELECT srn,fname,mname,lname FROM student,project_team WHERE srn=student_id and  project_id='$_SESSION[pid]'");
		$data['records1']=$query->result();
		$data['msg']=$msg;
		$count=count($data['records1']);
		$srn=$data['records1'][$count-1]->srn;
		$query=$this->db->query("select evaluation3.student_srn from evaluation3 where student_srn='$srn'");
		$data['records2']=$query->result();
		$this->load->view('faculty/evaluation3',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function evaluation3_submit()
{
	$total=$this->input->post('progress')+$this->input->post('presentation')+$this->input->post('viva');
	$this->load->model('Project_model');
	$data=array(
	'student_srn'=>$this->input->post('srn'),
	'progress'=>$this->input->post('progress'),
	'presentation'=>$this->input->post('presentation'),
	'viva'=>$this->input->post('viva'),
	'remarks'=>$this->input->post('remarks'),
	'total'=>$total);
	if ($this->Project_model->insert_evaluation3($data)) 
	{
		$msg="<script>alert('Updated successfully');</script>";
		$this->evaluation3($msg);
	}
	else
	{
		$msg="<script>alert('".$this->input->post('srn')." is already updated once..!');</script>";
		$this->evaluation3($msg);
	}
}

public function evaluation4($msg='')
{
	if (isset($_SESSION['faculty'])) 
	{
		if (!isset($_SESSION['pid'])) 
		{
			$pid=$this->input->post('pid');
			$this->session->set_userdata('pid',$pid);
		}
		$query=$this->db->query("SELECT p.id,p.name,description,p.status FROM project p WHERE guide_id='$_SESSION[faculty]' and status='approved_admin' and id='$_SESSION[pid]'");
		$data['records']=$query->result();
		$query=$this->db->query("SELECT srn,fname,mname,lname FROM student,project_team WHERE srn=student_id and  project_id='$_SESSION[pid]'");
		$data['records1']=$query->result();
		$data['msg']=$msg;
		$count=count($data['records1']);
		$srn=$data['records1'][$count-1]->srn;
		$query=$this->db->query("select evaluation4.student_srn from evaluation4 where student_srn='$srn'");
		$data['records2']=$query->result();
		$this->load->view('faculty/evaluation4',$data);
	}
	else
		$this->load->view('faculty/faculty_login');
}

public function evaluation4_submit()
{
	$total=$this->input->post('progress')+$this->input->post('discussion')+$this->input->post('presentation')+$this->input->post('viva');
	$this->load->model('Project_model');
	$data=array(
	'student_srn'=>$this->input->post('srn'),
	'progress'=>$this->input->post('progress'),
	'presentation'=>$this->input->post('presentation'),
	'discussion'=>$this->input->post('discussion'),
	'viva'=>$this->input->post('viva'),
	'remarks'=>$this->input->post('remarks'),
	'total'=>$total);
	if ($this->Project_model->insert_evaluation4($data)) 
	{
		$msg="<script>alert('Updated successfully');</script>";
		$this->evaluation4($msg);
	}
	else
	{
		$msg="<script>alert('".$this->input->post('srn')." is already updated once..!');</script>";
		$this->evaluation4($msg);
	}
}

public function evaluation5($msg='')
{
	if (isset($_SESSION['faculty'])) 
	{
		if (!isset($_SESSION['pid'])) 
		{
			$pid=$this->input->post('pid');
			$this->session->set_userdata('pid',$pid);
		}
		$query=$this->db->query("SELECT p.id,p.name,description,p.status FROM project p WHERE guide_id='$_SESSION[faculty]' and status='approved_admin' and id='$_SESSION[pid]'");
		$data['records']=$query->result();
		$query=$this->db->query("SELECT srn,fname,mname,lname FROM student,project_team WHERE srn=student_id and  project_id='$_SESSION[pid]'");
		$data['records1']=$query->result();
		$data['msg']=$msg;
		$count=count($data['records1']);
		$srn=$data['records1'][$count-1]->srn;
		$query=$this->db->query("select evaluation5.student_srn from evaluation5 where student_srn='$srn'");
		$data['records2']=$query->result();
		$this->load->view('faculty/evaluation5',$data);

	}
	else
		$this->load->view('faculty/faculty_login');
}

public function evaluation5_submit()
{
	$total=$this->input->post('htotal')+$this->input->post('contribution')+$this->input->post('presentation')+$this->input->post('viva');
$this->load->model('Project_model');
$pid=$this->input->post('project_id');

$sql=$this->db->query("SELECT student_id from project_team where project_id='$pid'");
$arr=$sql->result();
$flag=true;
foreach ($arr as $value) 
{
    $data=array(
        'student_srn'=>$value->student_id,
        'formulation'=>$this->input->post('formulation'),
        'review'=>$this->input->post('review'),
        'discussion'=>$this->input->post('discussion'),
        'method'=>$this->input->post('method'),
        'originality'=>$this->input->post('originality'),
        'contribution'=>$this->input->post('contribution'),
        'presentation'=>$this->input->post('presentation'),
        'viva'=>$this->input->post('viva'),
        'remarks'=>$this->input->post('remarks'),
    	'total'=> $total);
        if ($this->Project_model->insert_evaluation5($data)) 
        {
            $flag=$flag and true;
        }
        else
        {
            $flag=$flag and false;
        }
}
if ($flag) 
        {
            $msg="<script>alert('Updated successfully');</script>";
            $this->evaluation5($msg);
        }
        else
        {
            $msg="<script>alert('".$this->input->post('srn')." is already updated once..!');</script>";
            $this->evaluation5($msg);
        }

}

}
?>
