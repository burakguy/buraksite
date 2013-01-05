<?php

class Searchcalc Extends CI_Model{

    public function findemp($fname, $sname, $dept, $title)
    {

        $this->load->database();

        $employees = array();

        $this->db->select('employees.first_name', 'employees.last_name');

        $this->db->from('employees');

        $this->db->where('employees.first_name', $fname);

        $res = $this->db->get();

        foreach($res->result() as $row)
        {
            $employees[] = array("firstname" => $row->first_name, "lastname" => $row->last_name);
        }

        return $employees;
    }


    }





?>