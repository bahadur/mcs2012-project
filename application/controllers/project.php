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

    public function index() {


        //$this->load->view("login");
    }
    
    
    public function detail($projectid){
        try {
            if ($this->session->userdata('contact_type') == 3) {
               throw new Exception();
            } 
        } catch (Exception $e) {
            show_404();
        }
        
        
        $data["title"] = "SAB | Project Detail";
        if ($this->session->userdata('contact_type') == 1){
            $data["container"] = "project/administrator_detail";
        } else {
            $data["container"] = "project/manager_detail";
        }
        $data['menu'] = $this->accounts_model->loadMenu();
        $data['categories'] = $this->project_model->getCategories();
        $data['priorities'] = $this->project_model->getPriorities();
        $data['managers'] = $this->project_model->getManagers();
        $data['teamMembers'] = $this->project_model->getPorjectTeamMembers($projectid);
        
        $data["teamMemberid"] = $this->project_model->getTeamMembersIds($projectid);
        if(empty($data["teamMemberid"])){
            $data["teamMemberid"] = array(-1,-2);
        }
        
        $data['projectMembers'] = $this->project_model->getProjectMembersById($projectid);
        $data['projects_detail'] = $this->project_model->getProjectsById($projectid);
        
        $data['project_tasks'] = $this->task_model->getTasks($this->session->userdata('login_id'), $data['projects_detail'][0]->projectid);
        
        $this->load->view("layout/template", $data);
    }
    
    public function summary() {
        
        $data["title"] = "SAB | Project Summary";
        $data["container"] = "project/summary";
        $data['menu'] = $this->accounts_model->loadMenu();
        $data['project_categories'] = $this->project_model->getCategories();
        //if($this->session->userdata('contact_type') == 1)
            $data['projects_detail'] = $this->project_model->getProjectsDetail();
        //else
           // $data['projects_detail'] = $this->project_model->getProjectsDetail($this->session->userdata("login_id"));
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
        
        try {
            if ($this->session->userdata('contact_type') != 1) {
               throw new Exception();
            } 
        } catch (Exception $e) {
            show_404();
        }
        $data["title"] = "SAB | Project Create";
        $data["container"] = "project/create";
        $data["menu"] = $this->accounts_model->loadMenu();
        $data['categories'] = $this->project_model->getCategories();
        $data['managers'] = $this->project_model->getManagers();
        $data['teamMembers'] = $this->project_model->getTeamMembers();
        
        $data['priorities'] = $this->project_model->getPriorities();
        $this->load->view("layout/template", $data);
    }
    
    // Ajax methods 
    public function update(){
        header("content-type: application/json");
        $respnse = "1";
        $msg = "";
        $data = array(
            'name'          => $this->input->post('name'),
            'categoryid'    => $this->input->post('categoryid'),
            'managerid'     => $this->input->post('managerid'),
            'clientaccess'  => $this->input->post('clientaccess'),
            'dateStart'     => date("Y-m-d H:i:s",strtotime($this->input->post('dateStart') . ' ' . $this->input->post('dateStart_time'))),
            'dueDate'       => date("Y-m-d H:i:s",strtotime($this->input->post('dueDate') . ' ' . $this->input->post('dueDate_time'))),
            'priority'      => $this->input->post('priority'),
            'description'   => $this->input->post('description')
        );
        
        $this->db->where('projectid', $this->input->post('projectid'));
        if($this->db->update('project', $data)){
           $msg .= "Record update successfully. "; 
            
            
            $selectmembersid = explode(',',$this->input->post('selectMembers_hidden'));
            
            $arrayinsert = array();
            if((count($selectmembersid) > 0) && ($selectmembersid[0] != "")){
                foreach ($selectmembersid as $idinsert){

                    $this->db->select("*");
                    $this->db->from("project_memebers");
                    $this->db->where("projectid",$this->input->post("projectid"));
                    $this->db->where("contactid",$idinsert);
                    $rs = $this->db->get()->result();

                    if(count($rs) == 0){
                        //$arrayinsert[] = array("projectid"=>$this->input->post('projectid'),"contactid"=>$idinsert);
                        $this->db->insert("project_memebers", array("projectid" => $this->input->post('projectid'),"contactid" => $idinsert));
                    }

                }
            }
            
            $deselectmembersid = explode(',',$this->input->post('deselectMembers_hidden'));
            $memmsg = "";
            foreach ($deselectmembersid as $idsdel){
                $this->db->select("project_memebers.contactid, count(project_memebers.contactid) tasks, contact.firstName, project_memebers.taskid",false);
                $this->db->from("project_memebers");
                $this->db->join("contact","contact.contactid=project_memebers.contactid");
                $this->db->where("project_memebers.projectid", $this->input->post('projectid'));
                $this->db->where("project_memebers.contactid", $idsdel);
                $this->db->group_by("project_memebers.projectid,project_memebers.contactid");
            
                $rs = $this->db->get()->result(); 
                
                if(count($rs) > 0){
                    if($rs[0]->tasks == 1 && $rs[0]->taskid == 0){ 
                        $this->db->delete('project_memebers', array('projectid' => $this->input->post('projectid'),'contactid'=> $idsdel));
                    } else {
                        $memmsg .= $rs[0]->firstName.", ";
                    }
                    
                }   
            }
            
            if($memmsg != "")
                       //$msg .= "Following memeber(s) aleady assinged task(s) which is on running state. ".$memmsg;
                       $respnse = 2;
            
            
            
          
             //echo json_encode(array("res"=>"1","msg"=>"Update Successfully.".$msg));
            echo $respnse;
            
        } else {
            echo 0;
        }
        
        
        
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
