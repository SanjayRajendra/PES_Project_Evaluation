<?php
class Student extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
}	


public function stest()
{
	$query=$this->db->query("DELETE FROM student WHERE student.fname LIKE '%fname%'");
	$this->load->view('student/test');
}



public function index()
{
	$this->load->view('student/student_login');
}
public function new_student_otp($value='')
{
	$this->load->view('student/new_student_otp');
}

public function student_insert()
{
	$this->load->view('student/student_insert');
}

public function student_forgot()
{
	$this->load->view('student/student_forgot');
}

public function project_panel()
{
	if(isset($_SESSION['student']))
	{
		$sid=$_SESSION['student'];
		$query = $this->db->get("project_details");
		$data['records'] = $query->result();
		$query=$this->db->query("SELECT id FROM project,project_team WHERE student_id = '$sid' AND id = project_id and STATUS IN('pending','approved')");
		$data['records1']=$query->result();
		$query=$this->db->query("SELECT project_team.student_id FROM project,project_team WHERE project.id=project_team.project_id and student_id='$sid' and project.status in ('pending','approved_admin','pending_at_admin')");
		$data['records2']=$query->result();
		$this->load->view('student/project_panel',$data);
	}
	else
	{
		$this->load->view('student/student_login');
	}
}    

public function get_student_name()
{
	$srn=$this->uri->segment('3');
	$query=$this->db->get_where('student',array('srn'=> $srn));
	$data['records']=$query->result();
	$data['srn']=$srn;
	$query=$this->db->query("select * from student,project,project_team where srn=student_id and srn='$srn' and project_team.student_id=student.srn and project_team.project_id=project.id and project.status not in ('rejected_admin','faculty_rejected')");
	$data['records1']=$query->result();
	$this->load->view('student/project_get_name',$data);
}

public function get_guide()
{
	$this->load->model('Project_model');
	$mid=$this->input->post('mid');
	if ($mid=="other") {
		$query=$this->db->query("select distinct f.empid,name ,lname from faculty as f,faculty_specialisation as fs where f.empid=fs.empid and f.Eligibility='yes' and f.empid not in (select guide_id from project where project.status='approved_admin'  group by guide_id having count(*) >= (select ug_projects from faculty where project.guide_id=faculty.empid)) and ug_projects > 0 ");
	$data['records']=$query->result();	
	}
	else{
	$query=$this->db->query("select f.empid,name ,lname from faculty as f,faculty_specialisation as fs where f.empid=fs.empid and fs.specialisation='$mid' and f.Eligibility='yes' and f.empid not in (select guide_id from project where project.status='approved_admin'  group by guide_id having count(*) >= (select ug_projects from faculty where project.guide_id=faculty.empid)) and ug_projects > 0 ");
	$data['records']=$query->result();
	}
	$this->load->view('student/project_get_guide',$data);
}

public function add_student()
{
	$this->load->model('Project_model');
	$data = array('program' => $this->input->post('program') ,
 	'srn' => $this->input->post('srn'),
 	'fname' => $this->input->post('fname') ,
 	'mname' => $this->input->post('mname'),
 	'lname' => $this->input->post('lname') ,
 	'branch' => $this->input->post('branch') ,
 	'year' => $this->input->post('year') ,
 	'sem' => $this->input->post('sem') ,
 	'section' => $this->input->post('section') ,
 	'email' => $this->input->post('email') ,
 	'phoneno' => $this->input->post('mobile') ,
 	'password'=> sha1($this->input->post('password'))    //'password' => $this->input->post('password')
  	);
	if($this->Project_model->insert_student($data))
		$this->load->view('student/student_login');
	else
	{
		$data=array('msg'=>"You have already registered!Please Login",
		'goto'=>"student/student_login");
		$this->load->view('student/error_msg',$data);
	}
}

public function check_student()
{
	$this->load->library('form_validation');
	$this->load->model('Project_model');
	$srn=$this->input->post('username');
	$password=sha1($this->input->post('password'));
	$query = $this->db->query("SELECT srn FROM student WHERE srn='$srn' and password='$password'");
	$data['records'] = $query->result();
	$query=$this->db->get_where('project_team',array('student_id'=> $srn));
	$data['records1'] = $query->result();
	$this->load->view('student/student_success',$data);
}

public function send_student()
{
	$this->load->helper('url');
	$userid=$this->uri->segment('3');
	$query=$this->db->get_where('student',array('srn' => $userid));
	$data['records']= $query->result();
	$this->load->view('mail/send_otp',$data);
}

public function new_student_send($value='')
{
	$userid=$this->input->post('userid');
	$data['records']= $userid;
	$this->load->view('mail/send_new_student',$data);
}
public function new_check_otp($value='')
{
	$input=$this->input->post('otp');
	$otp = $this->session->userdata('otp');
	if (isset($_SESSION['otp']) && $otp==$input) {
		$this->load->view("student/student_insert");
	}
	else
		echo "<script>alert('Invalid otp');document.location.reload();</script>";
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

public function update_student()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('otp', 'otp', 'callback_otp_check');
	if ($this->form_validation->run() == FALSE)
            $this->load->view('student/student_forgot');
    else
    {
        $pass=sha1($this->input->post('npassword'));
        $srn=$this->input->post('userid');
        $this->db->set('password',$pass);
		$this->db->where('srn',$srn);
		$this->db->update('student');
        $this->load->view('student/student_login');
    }
}

public function project_panel_submit()
{
	$sql=$this->db->query('select count(*) as num_projects from project');
	$result=$sql->result();
	$num=$result[0]->num_projects;
	$num=$num+1;
	$number = sprintf('%03d',$num);
	$pid=date('Y').'CS'.$number;
	$this->session->set_userdata('project_id',$pid);
	$n=$this->input->post('select1');
	$team= array();
	for ($i=1; $i <=$n; $i++) 
	{ 
		$sid=$this->input->post('input'.$i);
		$team[$i]=$sid;
	}
	$this->load->model('Project_model');
	$base=$this->input->post('based_project');
	if ($base=="other") {
		$base=$this->input->post('otherarea');
	}
	$guide=$this->input->post('select2');
	$name=$this->input->post('project_name');
	$description=$this->input->post('description');
	$data=array(    
	'id'=>$pid,
	'name'=>$name,
	'guide_id'=>$guide,
	'project_area'=>$base,
	'description'=>$description,
	'date'=>''.date('d-m-Y')
	);
	if($this->Project_model->insert_project($data,$team,$pid))
        header("Location:project_status");
    else
    {
        $data['msg']="Something wrong..! check again";
		$this->load->view('student/project_panel',$data);
    }
}

public function student_edit()
{
	if(isset($_SESSION['student']))
		$this->load->view('student/edit');
	else
		$this->load->view('student/student_login');
}

public function student_change()
{
	if(isset($_SESSION['student']))
		$this->load->view('student/change');
	else
		$this->load->view('student/student_login');
}

public function project_status()
{
	if(isset($_SESSION['student']))
	{
		$srn = $this->session->userdata('student');
		$sql=$this->db->query("select id,name,status from project,project_team where project.id=project_team.project_id and project_team.student_id='$srn'");
		$data['records']=$sql->result();
		$this->load->view('student/status',$data,$srn);
	}
	else
		$this->load->view('student/student_login');
}

public function student_logout()
{
	$this->load->view('student/logout');
}

public function student_changepass()
{
	$this->load->model('Project_model');
	$srn=$_SESSION['student'];
	$old=$this->db->query("select password from student where srn='$srn'");
	$data['records']=$old->result();
	$a=array('srn'=>$_SESSION['student'],
	'old_given'=>$this->input->post('old'),
	'new'=>$this->input->post('new'),
	'confirm'=>$this->input->post('confirm')
	);
	$data['a']=$a;
	$this->load->view('student/student_changepassword',$data);
}

public function student_pop()
{
	$pid=$this->input->post('pid');
	$sql=$this->db->query("select p.id,p.name,p.status,p.remarks,f.name as guide ,f.lname,p.project_area,p.description,p.date 	FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.id='$pid' GROUP by p.id");
	$data['records']=$sql->result();
	$sql=$this->db->query("select fname,lname,srn from student,project_team where srn=student_id and project_id='$pid'");
	$data['records1']=$sql->result();
	$this->load->view('student/student_pop',$data);
}



public function upload_zip()
{
	if (isset($_SESSION['student'])) 
	{
		$this->load->model('Project_model');
	$file='userfile';
	$pid=$_SESSION['project_id'];

	if(!is_dir("./uploads/".$pid))
		mkdir("./uploads/".$pid);
	$config['upload_path']          = "./uploads/".$pid; 
    $config['allowed_types']        = 'zip|tar|tar.gz|rar'; 
    $config['max_size']             = 2000; 
    $this->load->library('upload', $config); 
    $this->upload->initialize($config);
    $query=$this->db->query("SELECT id from project WHERE id='$pid' and code_upload='yes'");
    if(empty($query->result()))
    { 	
    	if (!$this->upload->do_upload($file))  
    	{ 
        	$data = array('msg' => "<script>alert('".$this->upload->display_errors()."')</script>"); 
		$this->load->view('student/upload_form', $data); 
    	} 
    	else 
    	{ 
        	$data = array('msg'=>"<script>alert('Uploaded successfully...')</script>");
		$this->db->set('code_upload','yes');
		$this->db->where('id',$pid);
		$this->db->update('project');
		$this->load->view('student/upload_form', $data);
    	}
     }
	else
		$this->load->view('student/upload_form', $data=array('msg' => "<script>alert('already uploaded..');</script>")); 
}
else
	$this->index();
}

public function uploads()
{
	if(isset($_SESSION['student']) && isset($_SESSION['project_id']))
	{
		$data['msg']="";
		$this->load->view('student/upload_form',$data);
	}
	else if(isset($_SESSION['student']))
	{
		$this->load->view('student/no_project');
	}
	else
	{
		$this->load->view('student/student_login');
	}
}

public function remarks()
{
	if (isset($_SESSION['student'])) {
    $pid=$_SESSION['student'];
    $sql=$this->db->query("select evaluation1.remarks from evaluation1 where student_srn='$pid'");
    $data['s1']=$sql->result();
    $sql=$this->db->query("select evaluation2.remarks from evaluation2 where student_srn='$pid'");
    $data['s2']=$sql->result();
    $sql=$this->db->query("select evaluation3.remarks from evaluation3 where student_srn='$pid'");
    $data['s3']=$sql->result();
    $sql=$this->db->query("select evaluation4.remarks from evaluation4 where student_srn='$pid'");
    $data['s4']=$sql->result();
    $sql=$this->db->query("select evaluation5.remarks from evaluation5 where student_srn='$pid'");
    $data['s5']=$sql->result();
    $this->load->view('student/remarks',$data);
}
else
	$this->index();
}

public function student_general()
{
	if(isset($_SESSION['student']))
	{
		$srn=$_SESSION['student'];
		$query=$this->db->query("select fname,lname,mname,srn,email,phoneno,year,program,section,branch from student where srn='$srn';");
		$data['records1'] = $query->result();
		$query=$this->db->query("select project.name,project.id,faculty.name as fname,faculty.mname,faculty.lname from project,faculty,project_team where project.id=project_team.project_id and project.guide_id=faculty.empid and project.status='approved_admin' and project_team.student_id='$srn'");
		
		$data['records2'] = $query->result();
		
		if(!empty($data['records2']))
		{
			$pid=$data['records2'][0]->id;
			$query=$this->db->query("select student.fname,student.mname,student.lname,student.srn from student,project_team where project_team.student_id=student.srn and project_team.project_id='$pid'");
			$data['records3'] = $query->result();
		}		

		$this->load->view('student/student_general',$data);
	}
	else
		$this->load->view('student/student_login');
}
}
?>
