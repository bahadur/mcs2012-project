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

        if (!$this->session->userdata("login_id")) {
            redirect(base_url() . "account");
        }
    }

    public function index() {


        //$this->load->view("login");
    }

    public function summary() {
        $data["title"] = "SAB | Project Summary";
        $data["container"] = "project/summary";
        $data['menu'] = $this->accounts_model->loadMenu();
        $data['project_categories'] = $this->project_model->getCategories();
        $data['projects_detail'] = $this->project_model->getProjectsDetail();
        
        $this->load->view("layout/template", $data);
    }

    public function get() {
        header("content-type: application/json");

        $p = $this->project_model->getAllProjects();

        echo json_encode($p);
    }
    
     public function getOverDues() {
        header("content-type: application/json");

        $p = $this->project_model->getAllProjects('overDues');

        echo json_encode($p);
    }
    
    public function getByCat($catid) {
        header("content-type: application/json");

        $p = $this->project_model->getAllProjects($catid);

        echo json_encode($p);
    }

    public function create() {
        $data["title"] = "SAB | Project Create";
        $data["container"] = "project/create";
        $data["menu"] = $this->accounts_model->loadMenu();
        $data['categories'] = $this->project_model->getCategories();
        $data['managers'] = $this->project_model->getManagers();
        $data['teamMembers'] = $this->project_model->getTeamMembers();
        $data['priorities'] = $this->project_model->getPriorities();
        $this->load->view("layout/template", $data);
    }

    public function add_new() {
        $this->load->library('email');
        $data = array(
            'name'          => $this->input->post('name'),
            'categoryid'    => $this->input->post('categoryid'),
            'managerid'     => $this->input->post('managerid'),
            'clientaccess'  => $this->input->post('clientaccess'),
            'dateStart'     => $this->input->post('dateStart') . ' ' . $this->input->post('dateStart_time'),
            'dueDate'       => $this->input->post('dueDate') . ' ' . $this->input->post('dueDate_time'),
            'priority'      => $this->input->post('priority'),
            
            'description'   => $this->input->post('description')
        );
        
        
        
        
        if ($this->db->insert("project", $data)) {
            $projectid = $this->db->insert_id();
            $membersid = explode(',',$this->input->post('teamMembers_hidden'));
            
            
            foreach($membersid as $k => $value){
                $mem_data = array('projectid' => $projectid, "contactid" => $value);
                $this->db->insert("project_memebers",$mem_data);
            }
            
            
            echo 1;
        } else {
            echo 0;
        }
    }
    

}
