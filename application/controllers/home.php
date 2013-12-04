<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model("accounts_model");

        if (!$this->session->userdata("login_id"))
            redirect(base_url() . "account");
            
    }

    public function index()
    {   
        //echo $this->uri->segment(2); die;
        $data["title"] = "SAB | Dashboard";

        switch ($this->session->userdata('contact_type'))
        {
            case "1":
                $data['container'] = 'dashboard/administrator';
                break;
            case "2":
                $data['container'] = 'dashboard/manager';
                break;
            case "3":
                $data['container'] = 'dashboard/member';
                break;
        }

        //$data['container'] = 'dashboard';
        $data['menu'] = $this->accounts_model->loadMenu();

        $this->load->view("layout/template", $data);

    }
    
    
}
