<?php if ( ! defined('BASEPATH')) exit('Direct script access is not allowed');


class Loginmodel extends CI_Model
{

    public function logincheck($username, $password)
    {

        $this->load->database();


        $this->load->library('encrypt');


        $this->db->select('emp_num, password, level');
        $this->db->from('users');
        $this->db->where('emp_num', $username);


        $encrypted = $this->encrypt->sha1($username.$password);


        $this->db->where('password', $encrypted);


        $qresults = $this->db->get();

        if($qresults->num_rows() == 1)
        {


            $this->session->set_userdata(array('lgdin' => "1"));

            redirect("/home");
        }
        else
        {
            //Load incorrect view
        }


    }
}