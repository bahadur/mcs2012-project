<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Task_model extends CI_Model {

   public function getTasks($contactid) {

        $this->db->select("project.`name` as 'projectName',
                          task.taskName, task.priority, task.status, task.description, 
                          contact.firstName, contact.lastName,
                          priority.priority,
                          project_category.category,
                          date_format(project.dateStart, '%b %D, %Y') dateStart,
                          date_format(project.dueDate, '%b %D, %Y') dueDate, 
                          TIMEDIFF(project.dueDate, NOW()) dueDateFormated", false);
        $this->db->from("project");
        $this->db->join("project_memebers", "project.projectid = project_memebers.projectid");
        $this->db->join("contact", "project_memebers.contactid = contact.contactid");
        $this->db->join("task", "project_memebers.taskid = task.taskid");
        $this->db->join("priority","priority.priorityid = project.priority");
        $this->db->join("project_category","project_category.projectCategoryid = project.categoryid");
       
        
        
        $this->db->where("project.managerid", $contactid);
        
        $rs = $this->db->get()->result();
        
        return $rs; 
    }
}

?>