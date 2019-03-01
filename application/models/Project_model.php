<?php
class Project_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function insert_student($student_data)
	{
		if ($this->db->insert("student", $student_data))
			return true;
		else
			return false;
	}
	public function insert_admin($admin_data)
	{
		if ($this->db->insert("admin_login", $admin_data))
			return true;
		else
			return false;
	}

	public function insert_faculty($faculty_data,$spec,$empid)
	{
		if ($this->db->insert("faculty", $faculty_data))
		{
			foreach ($spec as $key => $value)
			{
				$this->db->query("insert into faculty_specialisation (empid,specialisation) values ('$empid','$value')");
			}
			return true;
		}
    	else
			return false;
	}

	public function insert_project($data,$team,$pid)
	{
		$this->db->trans_start();
		if($this->db->insert("project",$data))
		{
			foreach ($team as $value)
			{
				$this->db->query("insert into project_team(project_id,student_id) values ('$pid','$value')");
			}
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE)
    		    return false;
			else
				return true;
		}
	}

	public function insert_phase1($data)
	{
		if($this->db->insert("project_1phase",$data))
			return true;
		else
			return false;
	}

	public function insert_evaluation1($data)
	{
		if($this->db->insert("evaluation1",$data))
			return true;
		else
			return false;
	}

	public function insert_evaluation2($data)
	{
		if($this->db->insert("evaluation2",$data))
			return true;
		else
			return false;
	}

	public function insert_evaluation3($data)
	{
		if($this->db->insert("evaluation3",$data))
			return true;
		else
			return false;
	}

	public function insert_evaluation4($data)
	{
		if($this->db->insert("evaluation4",$data))
			return true;
		else
			return false;
	}

	public function insert_evaluation5($data)
	{
		if($this->db->insert("evaluation5",$data))
			return true;
		else
			return false;
	}
	public function add_panel($data,$arr)
	{
		$this->db->trans_start();
		if($this->db->insert("panel",$data))
		{
			foreach ($arr  as $value) {
				$this->db->insert("panel_members",$value);
			}
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE)
    	    return false;
		else
			return true;
		}
	}
}
?>