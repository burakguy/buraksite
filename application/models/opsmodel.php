<?php

// This is the Emps_mod model which physically performs database manipulation
class Opsmodel extends CI_Model
{

    public function add2db($dob, $firstname, $lastname, $gender, $title, $dept, $salary)
    {
        $this->load->database();

        $sql = "SELECT emp_no FROM employees order by emp_no desc limit 1";

        $result = $this->db->query($sql);

        $row = $result->row_array();

        $id = $row['emp_no'] + 1;

        $from_date = date('Y-m-d', time());

        $sql = "INSERT into employees values ('$id', '$dob', '$firstname', '$lastname', '$gender', '$from_date')";

        $this->db->query($sql);

        $sql = "INSERT into titles values ('$id', '$title', '$from_date', '9999-01-01')";

        $this->db->query($sql);

        $sql = "INSERT into dept_emp values ('$id', '$dept', '$from_date', '9999-01-01')";

        $this->db->query($sql);

        $sql = "INSERT into salaries values ('$id', '$salary', '$from_date', '9999-01-01')";

        $this->db->query($sql);

        return true;
    }


    public function delfrmdb($number)
    {
        $this->load->database();

        $sql = "DELETE FROM  employees WHERE emp_no = '".$number."'";

        $this->db->query($sql);

        return true;
    }

    public function up2db($id, $dob, $firstname, $lastname, $gender, $title, $dept, $salary)
    {
        $this->load->database();

        $sql = "SELECT employees.emp_no, employees.first_name, employees.last_name, employees.gender, employees.birth_date, titles.title, departments.dept_name, departments.dept_no, salaries.salary FROM employees LEFT JOIN dept_emp ON dept_emp.emp_no=employees.emp_no LEFT JOIN titles ON titles.emp_no=employees.emp_no LEFT JOIN salaries ON salaries.emp_no=employees.emp_no LEFT JOIN departments ON dept_emp.dept_no=departments.dept_no WHERE dept_emp.to_date = '9999-01-01' AND titles.to_date = '9999-01-01' AND salaries.to_date = '9999-01-01' AND employees.emp_no = '".$id."'";

        $res = $this->db->query($sql);

        $emp = $res->row();

        if(trim($firstname) != trim($emp->first_name) || trim($lastname) != trim($emp->last_name) || trim($dob) != trim($emp->birth_date) || trim($gender) != trim($emp->gender))
        {
            $this->db->query("UPDATE employees SET first_name = '".$firstname."', last_name = '".$lastname."', birth_date = '".$dob."', gender = '".$gender."' WHERE emp_no='".$id."'");
        }

        if(trim($title) != trim($emp->title))
        {
            $this->db->query("UPDATE titles SET to_date = '".date("Y-m-d", time())."' WHERE emp_no = '".$id."' AND to_date = '9999-01-01'");

            $this->db->query("INSERT into titles values ('$id', '$title', '".date("Y-m-d", time())."', '9999-01-01')");
        }

        if(trim($salary) != trim($emp->salary))
        {
            $this->db->query("UPDATE salaries SET to_date = '".date("Y-m-d", time())."' WHERE emp_no = '".$id."' AND to_date = '9999-01-01'");

            $this->db->query("INSERT into salaries values('$id', '$salary', '".date("Y-m-d", time())."', '9999-01-01')");
        }

        if(trim($dept) != trim($emp->dept_no))
        {
            $this->db->query("UPDATE dept_emp SET to_date = '".date("Y-m-d", time())."' WHERE emp_no = '".$id."' AND to_date = '9999-01-01'");



            $this->db->query("INSERT INTO dept_emp VALUES ('$id', '$dept', '".date("Y-m-d", time())."', '9999-01-01')");

        }

        return true;
    }
}