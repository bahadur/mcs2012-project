<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Task_model extends CI_Model {

   public function getTasks($contactid, $projectid="",$status="") {

        $this->db->select("task.taskid, project.`name` as 'projectName',
                          task.taskName,  task.description, 
                          contact.contactid,contact.firstName, contact.lastName,
                          priority.priority,
                          project_category.category,
                          date_format(task.startDate, '%M %e, %Y') dateStart,
                          date_format(task.dueDate, '%M %e, %Y') dueDate, 
                          date_format(task.dateComplete, '%M %e, %Y') dateComplete, 
                          TIMEDIFF(task.dueDate, NOW()) dueDateFormated", false);
        $this->db->from("project");
        $this->db->join("project_memebers", "project.projectid = project_memebers.projectid");
        $this->db->join("contact", "project_memebers.contactid = contact.contactid");
        $this->db->join("task", "project_memebers.taskid = task.taskid");
        $this->db->join("priority","priority.priorityid = project.priority");
        $this->db->join("project_category","project_category.projectCategoryid = project.categoryid");
       
        $this->db->where("project.managerid", $contactid);
        
        if($projectid != "")
            $this->db->where("project.projectid", $projectid);
        if($status !="")
            $this->db->where("status",$status);
        
        $rs = $this->db->get()->result();
        //echo $this->db->last_query();
        
        return $rs; 
    }
    
    
    public function update(){
        
        
        
        $data = array(
                'taskName' => $this->input->post("task"),
                'order' => '1' ,
                'taskStyle' => '1',
                'description' => $this->input->post("description"),
                'startDate' => $this->input->post("startDate"),
                'dueDate' => $this->input->post("endDate"),
                'dateComplete' => '0',
                'timeAllocate' => null,
                'priority' => '1',
                'status' => '1'
            
             );

        $this->db->insert('task', $data); 
        $taskid = $this->db->insert_id();
        
        
        $this->db->select("projectid, contactid,taskid", false);
        $this->db->from("project_memebers");
        $this->db->where("projectid",$this->input->post("projectid"));
        $this->db->where("contactid",$this->input->post("member"));
        $this->db->where("taskid",0);
        
        $rs = $this->db->get()->result();
        echo $this->db->last_query();
        if(count($rs) > 0){
            
            $this->db->where("projectid",$this->input->post("projectid"));
            $this->db->where("contactid",$this->input->post("member"));
            $this->db->update("project_memebers",array("taskid"=>$taskid));
        } else{
            
            $data = array(
                'projectid' => $this->input->post("projectid"),
                'contactid' =>  $this->input->post("member"),
                'taskid'  =>  $taskid );
               
                $this->db->insert('project_memebers', $data);
            
            
        }
        
        return 1;
        
    }
}

?>