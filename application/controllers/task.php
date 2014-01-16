<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Task extends CI_Controller {

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
        
    }
    
    
    public function summary(){
        $data["title"] = "SAB | Tasks";
        $data["container"] = "task/summary";
        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }
    
    public function get(){
         header("content-type: application/json");
        
        $rs = $this->task_model->getTasks($this->session->userdata('login_id'));
        
        $dataArray = array();
        foreach ($rs as $rows) {

            $projectName = "<a href='#'>" . $rows->projectName . "</a>";
            $taskName = "<a href='#'>" . $rows->taskName . "</a>";
            $memeberName = $rows->firstName." ".$rows->lastName;
            $priority = $rows->priority;
            $status = $rows->status;
             if($rows->dueDateFormated < 0 ){
                $overdue = "label-important";
                $dticon = "<i class='icon-bolt'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } else {
                $overdue =  "label-info";
                $dticon = ($rows->category == "Completed")?"<i class='icon-ok'></i>&nbsp;&nbsp;":"<i class='icon-share-alt'></i>&nbsp;&nbsp;";
            }
            
            
            $startDate = '<span class="label  label-large label-info "><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;'.$rows->dateStart.'</span>';
            $dueDate = '<span class="label  label-large  '.$overdue.'" >'.$dticon.$rows->dueDate.'</span>';
            





            $dataArray[] = array($taskName, $projectName,$memeberName, $priority, $status,   $startDate, $dueDate);
        }

         
        
        
        
        echo json_encode(array("aaData" => $dataArray));
        
        
    }
    
    
    public function tasks($projectid = "") {
        header("content-type: application/json");
        
        $rs = $this->task_model->getTasks($this->session->userdata('login_id'), $projectid);
        
        $dataArray = array();
        foreach ($rs as $rows) {

            
            $taskName = "<a href='#'>" . $rows->taskName . "</a>";
            $member = $rows->firstName." ".$rows->lastName;
           $priority = $rows->priority;
           $status = $rows->category;
             if($rows->dueDateFormated < 0 ){
                $overdue = "label-important";
                $dticon = "<i class='icon-bolt'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } else {
                $overdue =  "label-info";
                $dticon = ($rows->category == "Completed")?"<i class='icon-ok'></i>&nbsp;&nbsp;":"<i class='icon-share-alt'></i>&nbsp;&nbsp;";
            }
            
            
            $startDate = '<span class="label  label-large label-info "><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;'.$rows->dateStart.'</span>';
            $dueDate = '<span class="label  label-large  '.$overdue.'" >'.$dticon.$rows->dueDate.'</span>';
            





            $dataArray[] = array($taskName, $member, $priority,$status,  $startDate, $dueDate);
        }

         
        
        
        
        echo json_encode(array("aaData" => $dataArray));
    }
    
}

?>