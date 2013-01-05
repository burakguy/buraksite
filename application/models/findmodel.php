<?php


class Findmodel extends CI_Model
{

    public function findemp($firstname, $lastname, $title, $department)
    {
        $this->load->database();

        $lgdin = $this->session->userdata('lgdin');

        $emps = array();

        if($lgdin == "1")
        {
            $this->db->select('employees.emp_no, employees.first_name, employees.last_name, titles.title, departments.dept_name, salaries.salary');
        }
        else
        {
            $this->db->select('employees.first_name, employees.last_name, titles.title, departments.dept_name, dept_emp.dept_no');
        }

        $this->db->from('employees');

        $this->db->join('dept_emp', 'dept_emp.emp_no = employees.emp_no', 'left');

        if($lgdin == "1")
        {
            $this->db->join('salaries', 'salaries.emp_no = employees.emp_no', 'left');
        }

        $this->db->join('titles', 'titles.emp_no = employees.emp_no', 'left');

        $this->db->join('departments', 'departments.dept_no = dept_emp.dept_no', 'left');

        if($firstname != "")
        {
            $this->db->where('employees.first_name', $firstname);
        }

        if($lastname != "")
        {
            $this->db->where('employees.last_name', $lastname);
        }

        if($title != "")
        {
            $this->db->where('titles.title', $title);
        }

        if($department != "")
        {
            $this->db->where('departments.dept_name', $department);
        }

        $this->db->where('dept_emp.to_date', '9999-01-01');
        $this->db->where('titles.to_date', '9999-01-01');

        if($lgdin == "1")
        {
            $this->db->where('salaries.to_date', '9999-01-01');
        }

        $res = $this->db->get();

        if($lgdin == "1")
        {
            foreach($res->result() as $row)
            {
                $emps[] = array($row->emp_no, $row->first_name, $row->last_name, $row->title, $row->dept_name, $row->salary);
            }
        }
        else
        {
            foreach($res->result() as $row)
            {
                if($row->title == 'Manager')
                {
                    $emps[] = array("firstname" => $row->first_name, "lastname" => $row->last_name, "jobtitle" => $row->title, "dept" => $row->dept_name, "deptid" => $row->dept_no, "ismanager" => 1);
                }
                else
                {
                    $emps[] = array("firstname" => $row->first_name, "lastname" => $row->last_name, "jobtitle" => $row->title, "dept" => $row->dept_name, "deptid" => $row->dept_no, "ismanager" => 0);
                }
            }
        }

        return $emps;
    }

    public function idsrch($number)
    {
        $this->load->database();

        $sql = "SELECT employees.emp_no, employees.first_name, employees.last_name, employees.gender, employees.hire_date, employees.birth_date, titles.title, departments.dept_name, salaries.salary FROM employees LEFT JOIN dept_emp ON dept_emp.emp_no=employees.emp_no LEFT JOIN titles ON titles.emp_no=employees.emp_no LEFT JOIN salaries ON salaries.emp_no=employees.emp_no LEFT JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE employees.emp_no = '".$number."' AND dept_emp.to_date = '9999-01-01' AND titles.to_date = '9999-01-01' AND salaries.to_date = '9999-01-01'";

        $res = $this->db->query($sql);

        return $res->row();
    }

}
?>