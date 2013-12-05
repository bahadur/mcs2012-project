<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_model extends CI_Model {

    public function getAllProjects($cat = "") {

        $this->db->select("project.`name` as 'projectName' ,priority.priority,project_category.category, CONCAT(contact.firstName,' ',contact.lastName) as 'manager',
project.dateStart,
project.dueDate", false);
        $this->db->from("project");
        $this->db->join('contact', 'contact.contactid = project.managerid');
        $this->db->join('priority', 'priority.priorityid = project.priority');
        $this->db->join('project_category', 'project_category.projectCategoryid = project.categoryid');
        if(!empty($cat)){
            $this->db->where("project.categoryid", $cat);
        }



        $rs = $this->db->get()->result();

        $dataArray = array();
        foreach ($rs as $rows) {

            $projectName = "<a href='#'>" . $rows->projectName . "</a>";
            $category = $rows->category;
            $manager = $rows->manager;
            $priority = $rows->priority;
            $startDate = $rows->dateStart;
            $dueDate = $rows->dueDate;





            $dataArray[] = array($projectName, $manager, $priority, $startDate, $dueDate);
        }

        return array("aaData" => $dataArray);
    }

    public function getCategories() {
        $this->db->select("*");
        $this->db->from("project_category");
        $rs = $this->db->get()->result();
        foreach ($rs as $value) {
            $data[$value->projectCategoryid] = $value->category;
        }
        return $data;
    }

    public function getManagers() {
        $this->db->select("*");
        $this->db->from("contact");
        $rs = $this->db->get()->result();
        foreach ($rs as $value) {
            $data[$value->contactid] = $value->firstName . " " . $value->lastName;
        }
        return $data;
    }

    public function getPriorities() {
        $this->db->select("*");
        $this->db->from("priority");
        $rs = $this->db->get()->result();
        foreach ($rs as $value) {
            $data[$value->priorityid] = $value->priority;
        }
        return $data;
    }
    
    public function getProjectsDetail(){
        $this->db->select("project_category.category, count(project.categoryid) cat_count", false);
        $this->db->from("project");
        $this->db->join("project_category", "project.categoryid = project_category.projectCategoryid","RIGHT");
        $this->db->group_by("project_category.category");
        $rs1 = $this->db->get()->result();
        $total = 0;
        foreach($rs1 as $val){
            $total += $val->cat_count;
        }
        
        
        $this->db->select("count(*) overdue", false);
        $this->db->from("project");
        $this->db->where("dueDate < ",date("Y-m-d"));
        $rs2 = $this->db->get()->result();
        
        $data = array("prg_cat" => $rs1,
                    "total" => $total,
                     "overdues" =>$rs2[0]->overdue
            );
        return $data;
        
    }

}
