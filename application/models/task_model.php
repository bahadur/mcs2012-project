<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Task_model extends CI_Model {

   public function getTasks($contactid, $projectid="") {

        $this->db->select("task.taskid, project.`name` as 'projectName',
                          task.taskName,  task.description, 
                          contact.firstName, contact.lastName,
                          priority.priority,
                          project_category.category,
                          date_format(task.startDate, '%M %e, %Y') dateStart,
                          date_format(task.dueDate, '%M %e, %Y') dueDate, 
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
        
        $rs = $this->db->get()->result();
        //echo $this->db->last_query();
        
        return $rs; 
    }
}

?>