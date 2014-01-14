<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model("accounts_model");
        $this->load->model("project_model");
        if (!$this->session->userdata("login_id"))
            redirect(base_url() . "account");
            
    }

    public function index()
    {   
        //echo $this->uri->segment(2); die;
        $data["title"] = "SAB | Dashboard";

        $data['projects_detail'] = $this->project_model->getProjectsDetail();
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
    
    public function _404(){
        $data['menu'] = $this->accounts_model->loadMenu();
        $data["title"] = "404 Error | SAB";
        $data['container'] = '_404';
        $this->load->view("layout/template", $data);
    }
    
    
}
