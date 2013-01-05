<?php  if ( ! defined('BASEPATH')) exit('Direct script access not allowed');

// Auth Controller (Handles login and logout operations)
class Lginout extends CI_Controller
{
    // Constructor for the Auth controller
    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');

        $this->load->helper('url');

        $session = $this->session->all_userdata();

        if(!isset($session['lgdin']))
        {
            $this->session->set_userdata(array('lgdin' => "0"));
        }
    }


    public function index()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $this->load->view('loginview', $store);
    }



    public function login()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $username = $this->input->post("username");

        $password = $this->input->post("password");

        $this->load->model('loginmodel');

        $this->loginmodel->logincheck($username, $password);
    }


    public function logout()
    {
        $this->session->set_userdata(array('lgdin' => "0"));

        redirect("/home");
    }

}

?>