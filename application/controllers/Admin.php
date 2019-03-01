<?php
class Admin extends CI_Controller {
function __construct()
{
	parent::__construct();
	$this->load->database();
	$this->load->library('session');
}
public function admin_login()
{
	$this->load->view('admin/admin_login');
}

public function admin_forgot()
{
	$this->load->view('admin/admin_forgot');
}

public function general_view($msg="")
{
	if(isset($_SESSION['admin']))
	{
		$query=$this->db->query("SELECT * FROM project_details");
		$data['records']=$query->result();
		$data['msg']=$msg;
		$this->load->view('admin/general',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function faculty_details()
{
	if(isset($_SESSION['admin']))
	{
		$this->load->model('Project_model');
		$query = $this->db->get("faculty");
		$data['records'] = $query->result();
		$this->load->view('admin/faculty_details',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function faculty_more_info()
{
	$empid=$this->input->post('pid');
	$this->load->model('Project_model');
	$query = $this->db->get_where("faculty",array('empid'=>$empid));
	$data['records'] = $query->result();
	$this->load->view('admin/faculty_more_info',$data);
}

public function student_details()
{
	if(isset($_SESSION['admin']))
	{
		$this->load->model('Project_model');
		$query = $this->db->get("student");
		$data['records'] = $query->result();
		$this->load->view('admin/student_details',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function table()
{
	if(isset($_SESSION['admin']))
	{
		$this->db->select('empid,name,lname,exp_in_pes,exp_non_pes,designation');
		$this->db->from('faculty');
		$query=$this->db->where('Eligibility','no');
		$query = $this->db->get();
		$data['records'] = $query->result();
		$this->load->helper('url');
		$this->db->select('empid,name,lname,exp_in_pes,exp_non_pes,designation');
		$this->db->from('faculty');
		$query=$this->db->where('Eligibility','yes');
		$query = $this->db->get();
		$data['records1']=$query->result();
		$this->load->view('admin/table',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function admin_eligibility_add()
{
	$this->load->helper('url');
	$empid=$this->uri->segment('3');
	$this->db->set('Eligibility','yes');
	$this->db->where('empid',$empid);
	$this->db->update('faculty');
	header('Location:'.base_url().'admin/table');
}

public function admin_eligibility_remove()
{
	$this->load->helper('url');
	$empid=$this->uri->segment('3');
	$this->db->set('Eligibility','no');
	$this->db->where('empid',$empid);
	$this->db->update('faculty');
	header('Location:'.base_url().'admin/table');
}


public function admin_logout()
{
	$this->load->view('admin/logout');
}
public function check_admin()
{
	$this->load->model('Project_model');
	$id=$this->input->post('username');
	$password=sha1($this->input->post('password'));
	$query = $this->db->get_where("admin_login",array('username' => $id,'password' => $password));
	$data['records'] = $query->result();
	$this->load->view('admin/admin_success',$data);
}

public function update_project_details()
{
	
	$max_student=$this->input->post('max_student');
    $max_faculty=$this->input->post('max_faculty');
    $no_of_student=$this->input->post('no_of_student');
    $no_of_faculty=$this->input->post('no_of_faculty');
    $start_date=$this->input->post('start_date');
    $end_date=$this->input->post('end_date');
   	$data1=array('max_students'=>$max_student,
    	'max_faculty'=>$max_faculty,
    	'no_students'=>$no_of_student,
    	'no_faculty'=>$no_of_faculty,
   		'start_date'=>$start_date,
    	'end_date'=>$end_date);
	$this->db->insert('project_details',$data1);
	$msg="<script>alert('updated successfully');</script>";
    $this->general_view($msg);
}

public function send_admin()
{
	$this->load->helper('url');
	$userid=$this->uri->segment('3');
	$query=$this->db->get_where('admin_login',array('username' => $userid));
	$data['records']= $query->result();
	$this->load->view('mail/send_otp',$data);
}

public function update_admin()
{
	$this->load->library('form_validation');
	$this->form_validation->set_rules('otp', 'otp', 'callback_otp_check');
	if ($this->form_validation->run() == FALSE)
            $this->load->view('admin/admin_forgot');
    else
    {
        $pass=$this->input->post('npassword');
        $id=$this->input->post('userid');
        $this->db->set('password',$pass);
		$this->db->where('username',$id);
		$this->db->update('admin_login');
        $this->load->view('admin/admin_login');
    }
}
public function otp_check($otp)
{
	if($_SESSION['otp']==$otp)
	{
		return TRUE;
	}
	else
	{
		$this->form_validation->set_message('username_check', 'The {field} field can not be the word "test"');
        return FALSE;
	}
}

public function projects()
{
	if(isset($_SESSION['admin']))
	{
		$sql=$this->db->query("select p.id,p.name,f.name as guide ,f.lname,p.project_area,COUNT(t.student_id) as std  FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.status='pending_at_admin' GROUP by p.id");
		$data['records']=$sql->result();
		$this->load->view('admin/projects',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function admin_project_accept()
{
	if(isset($_SESSION['admin']))
	{
		$sql=$this->db->query("select p.id,p.name,f.name as guide ,f.lname,p.project_area,COUNT(t.student_id) as std  FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.status not in ('pending','pending_at_admin','faculty_rejected','rejected_admin') GROUP by p.id");
		$data['records']=$sql->result();
		$this->load->view('admin/projects_accept',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function projects_reject()
{
	if(isset($_SESSION['admin']))
	{
		$sql=$this->db->query("select p.id,p.name,f.name as guide ,f.lname,p.project_area,COUNT(t.student_id) as std  FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.status='rejected_admin' GROUP by p.id");
		$data['records']=$sql->result();
		$this->load->view('admin/projects_reject',$data);
	}
	else
		$this->load->view('admin/admin_login');
}

public function project_pop()
{
	$pid=$this->input->post('pid');
	$sql=$this->db->query("select p.id,p.name,f.name as guide ,f.lname,p.project_area,p.description,p.date FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.id='$pid' GROUP by p.id");
	$data['records']=$sql->result();
	$sql=$this->db->query("select fname,lname,srn from student,project_team where srn=student_id and project_id='$pid'");
	$data['records1']=$sql->result();
	$this->load->view('admin/project_pop',$data);
}

public function project_approved()
{
	$id=$this->input->post('pid');
	$comment=$this->input->post('comment');
	$this->db->set(array('status'=>'approved_admin','remarks'=>$comment));
	$this->db->where('id',$id);
	$this->db->update('project');
	$query=$this->db->query("select email,remarks,name,status FROM student,project_team,project where student_id=srn and project_id=id and project_id='$id';");
	$data['records']= $query->result();
	$this->load->view('mail/send_remarks',$data);
}

public function project_reject()
{
	$id=$this->input->post('pid');
	$comment=$this->input->post('comment');
	$this->db->set(array('status'=>'rejected_admin','remarks'=>$comment));
	$this->db->where('id',$id);
	$this->db->update('project');
	$query=$this->db->query("select email,remarks,name,status FROM student,project_team,project where student_id=srn and project_id=id and project_id='$id';");
	$data['records']= $query->result();
	$this->load->view('mail/send_remarks',$data);
}

public function project_pop_accepted()
{
	$pid=$this->input->post('pid');
	$sql=$this->db->query("select p.id,p.name,f.name as guide ,f.lname,p.project_area,p.description,p.date,p.remarks 
	FROM project_team t,project p,faculty f WHERE p.id=t.project_id and f.empid=p.guide_id and p.id='$pid' GROUP by p.id");
	$data['records']=$sql->result();
	$sql=$this->db->query("select fname,lname,srn from student,project_team where srn=student_id and project_id='$pid'");
	$data['records1']=$sql->result();
	$this->load->view('admin/project_pop_accepted',$data);
}

public function update_faculty_projects()
{
	$ug=$this->input->post('ug');
	$pg=$this->input->post('pg');
	$empid=$this->input->post('empid');
	$this->db->set(array('ug_projects'=>$ug,'pg_projects'=>$pg));
	$this->db->where('empid',$empid);
	$this->db->update('faculty');
	$data=array('ug'=>$ug,'pg'=>$pg,'empid'=>$empid);
}


public function faculty_panel($msg='')
{
	if (isset($_SESSION['admin'])) {
	
    $data['msg']=$msg;
    $sql=$this->db->query("select panel.panel_id from panel");
    $data['records']=$sql->result();
	$panel=$data['records'];
	$panels=[];
	foreach ($panel as $value) 
	{
		$sql=$this->db->query("SELECT faculty.name,faculty.lname FROM faculty,panel_members WHERE faculty.empid=panel_members.empid and 
		panel_members.panel_id=$value->panel_id");
		$panels[$value->panel_id]=$sql->result();
	}
	$data['panels']=$panels;

	$sql=$this->db->query("SELECT DISTINCT faculty.name,faculty.lname,faculty.empid FROM faculty where faculty.empid not IN(SELECT faculty.empid FROM panel,panel_members,faculty WHERE panel.panel_id=panel_members.panel_id and faculty.empid=panel_members.empid)");
	$data['records1']=$sql->result();
    $this->load->view("admin/project_panel",$data);
}
else
	$this->admin_login();
}


public function get_faculty_member($value='')
{
    $s=$this->input->post('mid');
    $sql=$this->db->query("SELECT distinct faculty.empid,name,lname FROM faculty,faculty_specialisation WHERE faculty.empid=faculty_specialisation.empid and faculty_specialisation.specialisation='$s' and faculty.designation='Professor' and faculty.empid not in (SELECT empid FROM panel_members);");
    $data['records1']=$sql->result();
    $sql=$this->db->query("SELECT distinct faculty.empid,name,lname FROM faculty,faculty_specialisation WHERE faculty.empid=faculty_specialisation.empid and faculty_specialisation.specialisation='$s' and faculty.designation='Associate Professor'  and faculty.empid not in (SELECT empid FROM panel_members);");
    $data['records2']=$sql->result();
    $sql=$this->db->query("SELECT distinct faculty.empid,name,lname FROM faculty,faculty_specialisation WHERE faculty.empid=faculty_specialisation.empid and faculty_specialisation.specialisation='$s' and faculty.designation='Assistant Professor' and faculty.empid not in (SELECT empid FROM panel_members);");
    $data['records3']=$sql->result();
    $this->load->view("admin/panel_get_guides",$data);
}

public function add_panel($value='')
{
    $sql=$this->db->query("select MAX(panel_id) as max from panel")->result();
	$max=$sql[0]->max;
	$sql=$this->db->query("select panel_id from panel");
	$records=$sql->result();
    $num=1;
    for ($i=1; $i <=$max; $i++) 
    { 
  		if ($i!=$records[$i-1]->panel_id) 
  		{
    		$num=$i;
    		break;
  		}
  		if ($i==$max) {
    	$num=$i+1;
  }
}
	if (isset($_POST['evaluator4']) && $_POST['evaluator4']!="") {
		$arr['evaluator4']=array('panel_id'=>$num,
		'empid'=>$this->input->post('evaluator4'));
	}

	if (isset($_POST['evaluator5'])&& $_POST['evaluator5']!="") {
		$arr['evaluator5']=array('panel_id'=>$num,
		'empid'=>$this->input->post('evaluator5'));
	}
	if (isset($_POST['evaluator6'])&& $_POST['evaluator6']!="") {
		$arr['evaluator6']=array('panel_id'=>$num,
		'empid'=>$this->input->post('evaluator6'));
	}
	if (isset($_POST['evaluator7'])&& $_POST['evaluator7']!="") {
		$arr['evaluator7']=array('panel_id'=>$num,
		'empid'=>$this->input->post('evaluator7'));
	}

 	$data = array('panel_id' => $num,
        'area'=>$this->input->post('area'));

    $arr['professor']=array('panel_id'=>$num,
        'empid'=>$this->input->post('professor'));
    $arr['associate']=array('panel_id'=>$num,
        'empid'=>$this->input->post('associative'));
    $arr['assistant']=array('panel_id'=>$num,
        'empid'=>$this->input->post('assistant') );

    $this->load->model('Project_model');
    if ($this->Project_model->add_panel($data,$arr)) 
    {
        $msg="<script>alert('Adding successfully');</script>";
        $this->faculty_panel($msg);
    }
    else
    {
        $msg="<script>alert('Error..! Something wrong');</script>";
        $this->faculty_panel($msg);
    }
}
public function panel_remove()
{
	$this->load->helper('url');
	$panel_id=$this->uri->segment('3');
	$r=$this->db->query("DELETE FROM panel WHERE panel_id='$panel_id'");
	$this->faculty_panel();
}
public function edit_project($value='')
{
	if (isset($_SESSION['admin'])) {
		
	$data['msg']=$value;
	$query=$this->db->query("select distinct f.empid,name ,lname from faculty as f,faculty_specialisation as fs where f.empid=fs.empid and f.Eligibility='yes' and f.empid not in (select guide_id from project where project.status='approved_admin'  group by guide_id having count(*) >= (select ug_projects from faculty where project.guide_id=faculty.empid)) and ug_projects > 0");
	$data['records']=$query->result();
	$this->load->view('admin/edit_project',$data);
	}
	else
	{
		$this->admin_login();
	}

}

public function get_edit_project($value='')
{
	$pid=$this->input->post('pid');
	$query=$this->db->query("select project.id,project.name pname,project.guide_id,faculty.name,faculty.lname from project,faculty where faculty.empid=project.guide_id and project.id='$pid' and project.status='approved_admin'");
	$data['records']=$query->result();
	$query=$this->db->query("select student.srn,student.fname,student.lname FROM student,project_team,project WHERE student.srn=project_team.student_id and project_team.project_id='$pid' and project.status='approved_admin' and project_team.project_id=project.id");
	$data['records1']=$query->result();
	$data['pid']=$pid;
	$this->load->view('admin/get_edit_project',$data);

}
public function delete_student_project($value='')
{
	$srn=$this->uri->segment('3');
	$this->db->query("DELETE FROM project_team WHERE student_id='$srn'");
	$msg="<script>alert('Student deleted successfully');</script>";
	$data['msg']=$msg;
	$this->load->view('admin/edit_project',$data);	
}
public function update_project_name($value='')
{
	$pid=$this->input->post('pid');
	$pname=$this->input->post('pname');
	$this->db->set('name',$pname);
	$this->db->where('id',$pid);
	if($this->db->update('project'))
		return true;
	else
		return false;
}

public function update_project_guide($value='')
{
	$pid=$this->input->post('pid');
	$gid=$this->input->post('empid');

	$this->db->query("delete FROM evaluation1 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation2 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation3 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation4 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation5 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");

	$this->db->set('guide_id',$gid);
	$this->db->set('status','pending');
	$this->db->where('id',$pid);
	if($this->db->update('project'))
		return true;
	else
		return false;
}

public function delete_project($value='')
{
	$pid=$this->uri->segment('3');
	$this->db->query("update project set project.status='rejected_admin' where project.id='$pid'");
	$this->db->query("delete FROM evaluation1 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation2 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation3 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation4 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	$this->db->query("delete FROM evaluation5 WHERE student_srn in (SELECT project_team.student_id FROM project_team WHERE project_team.project_id='$pid');");
	
	$msg="<script>alert('Project deleted successfully..');</script>";
	$data['msg']=$msg;
	$this->load->view('admin/edit_project',$data);

}
public function prints($value='')
{
	if (isset($_SESSION['admin'])) {
		$this->load->view('admin/prints');
	}
	else
		$this->admin_login();
}






public function delete_db()
{
	$this->db->query("delete FROM student");
	$this->db->query("delete FROM evaluation1,evaluation2,evaluation3,evaluation4,evaluation5");
	$this->db->query("delete FROM panel");
	$this->db->query("delete FROM project_team");
	$this->db->query("delete FROM panel_members");
	$this->db->query("delete FROM project_details");
	$this->db->query("delete FROM project_1phase");
	$this->db->query("delete FROM project");
	//add more if you want...
}

public function admin_change()
{
	if(isset($_SESSION['admin']))
		$this->load->view('admin/change');
	else
		$this->load->view('admin/admin_login');
}


public function admin_changepass()
{
	$this->load->model('Project_model');
	$empid=$_SESSION['admin'];
	$oldpass=sha1($this->input->post('old'));
	$new=sha1($this->input->post('new'));
	$con=sha1($this->input->post('confirm'));
	$old=$this->db->query("select password from admin_login where username='$empid' and password='$oldpass'");
	$r=$old->result();

	if(!empty($r) && $new==$con)
	{
		$this->db->set('password',$new);
		$this->db->where('username',$empid);
		$this->db->update('admin_login');
		$this->general_view();
	}
	else
	{
		echo "<script>alert('Passwords are not matched or wrong old password ".$empid."..');</script>";
		$this->admin_change();

	}
	

}

public function new_admin()
{
	if (isset($_SESSION['admin'])) {
		$query=$this->db->query("select * from admin_login");
		$data['records']=$query->result();
		$this->load->view('admin/new_admin',$data);
	}
	else
		$this->admin_login();
}
public function new_admin_submit()
{
	$this->load->model('Project_model');
	$data = array(
	'email' => $this->input->post('email') ,
 	'username' => $this->input->post('username'),
 	'password' => sha1($this->input->post('password')));

 	if($this->Project_model->insert_admin($data))
		echo "<script>alert('admin added successfully..');</script>";
	$this->general_view();

}

public function remove_admin()
{
	$this->load->helper('url');
	$empid=$this->uri->segment('3');
	if ($_SESSION['admin']==$empid) 
	{
		echo "<script> alert('You cannot remove itself..!'); </script>";
	}
	else
	{
		$r=$this->db->query("delete from admin_login where username='$empid'");	
	}
	$this->new_admin();
}
public function remove_faculty()
{
	$this->load->helper('url');
	$empid=$this->uri->segment('3');
	
	$r=$this->db->query("delete from faculty where empid='$empid'");	

	$this->faculty_details();
}

}
?>
