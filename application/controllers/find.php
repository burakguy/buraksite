<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Find extends CI_Controller
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
        $store['lgdin'] = $this->session->userdata('lgdin');

        $this->load->view('findview', $store);
    }


    public function findemp()
    {
        $session = $this->session->all_userdata();

        $this->load->model('findmodel');

        $store['lgdin'] = $this->session->userdata('lgdin');

        $firstname = $this->input->get('firstname');
        $lastname = $this->input->get('lastname');
        $dept = $this->input->get('dept');
        $title = $this->input->get('jobtitle');

        if($session['lgdin'] == "1")
        {
            $this->load->model('findmodel');

            $store['res'] = $this->findmodel->findemp($firstname, $lastname, $title, $dept);

            $store['lgdin'] = $this->session->userdata('lgdin');

            $this->load->view('searchrespage', $store);
        }
        else
        {
            $this->load->model('findmodel');

            $results['results'] = $this->findmodel->findemp($firstname, $lastname, $title, $dept);

            $results['count'] = count($results['results']);

            header('Content-type: application/json');

            echo json_encode(array('count' => $results['count'], 'results' => $results['results']));
        }
    }

    public function srchdel()
    {
        $firstname = $this->input->get('firstname');
        $lastname = $this->input->get('lastname');
        $dept = $this->input->get('dept');
        $title = $this->input->get('title');

        $this->load->model('findmodel');

        $store['res'] = $this->findmodel->findemp($firstname, $lastname, $title, $dept);

        $store['lgdin'] = $this->session->userdata('lgdin');

        $this->load->view('found2del', $store);
    }

    public function srchup()
    {
        $firstname = $this->input->get('firstname');
        $lastname = $this->input->get('lastname');
        $dept = $this->input->get('dept');
        $title = $this->input->get('title');

        $this->load->model('findmodel');

        $store['res'] = $this->findmodel->findemp($firstname, $lastname, $title, $dept);

        $store['lgdin'] = $this->session->userdata('lgdin');

        $this->load->view('found2up', $store);
    }

}

?>