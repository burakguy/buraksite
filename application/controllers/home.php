<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {


    public function __construct()
    {

        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');

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

        $this->load->view('homeview', $store);


    }
}