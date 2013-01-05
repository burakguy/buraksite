<?php if ( ! defined('BASEPATH')) exit('Direct script access is not allowed');


class Ops extends CI_Controller
{

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

        redirect("/home");
    }

    public function loadaddview()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $this->load->view('addview', $store);
    }

    public function loaddelview()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $this->load->view('delview', $store);
    }

    public function loadupview()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $this->load->view('upview', $store);
    }

    public function addemployee()
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $dept = $this->input->post('dept');
        $title = $this->input->post('title');
        $salary = $this->input->post('salary');

        $this->load->model('opsmodel');

        if($this->opsmodel->add2db($dob, $firstname, $lastname, $gender, $title, $dept, $salary) == true)
        {
            $this->load->view('success');
        }
        else
        {
            $this->load->view('unsuccessful');
        }
    }

    public function delemployee($id)
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];


            $this->load->model('opsmodel');


            if($this->opsmodel->delfrmdb($id) == true)
            {
                $this->load->view('success');
            }
            else
            {
                $this->load->view('unsuccessful');
            }
    }

    public function upemployee($number)
    {
        $session = $this->session->all_userdata();

        $store['lgdin'] = $session['lgdin'];

        $this->load->model('findmodel');

        $data['emp'] = $this->findmodel->idsrch($number);

        $this->load->view('editpage', $data);
    }

    public function update2db($id)
    {
        $this->load->model('opsmodel');

        $firstname = $this->input->post('firstname');
        $lastname = $this->input->post('lastname');
        $dob = $this->input->post('dob');
        $gender = $this->input->post('gender');
        $dept = $this->input->post('dept');
        $title = $this->input->post('title');
        $salary = $this->input->post('salary');

        if($this->opsmodel->up2db($id, $dob, $firstname, $lastname, $gender, $title, $dept, $salary)==true)
        {
            $this->load->view('success');
        }
        else
        {
            $this->load->view('unsuccessful');
        }
    }
}