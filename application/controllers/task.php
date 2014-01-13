<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model("accounts_model");
        $this->load->model("company_model");
        $this->load->model("project_model");
        $this->load->model("task_model");

        if (!$this->session->userdata("login_id")) {
            redirect(base_url() . "account");
        }
    }
    
    public function index(){
        $data["title"] = "SAB | Tasks";
        $data["container"] = "tasks/summary";
        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }
}

?>