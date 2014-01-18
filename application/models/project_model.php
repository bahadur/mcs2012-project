<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Project_model extends CI_Model {

    public function getProjectsById($projectid){
        
        $this->db->select("project.projectid,
                            project.`name`,
                            project.categoryid,
                            project.managerid,
                            project.clientaccess,
                            date_format(project.dateStart, '%M %e, %Y') fstartdate,
                            date_format(project.dateStart,'%H:%i:%s') fstarttime,
                            date_format(project.dueDate,'%M %e, %Y') fduedate,
                            date_format(project.dueDate,'%H:%i:%s') fduetime,
                            project.priority,
                            project.timeAllocated,
                            project.qoutedPrice,
                            project.invoicePrice,
                            project.description,
                            project_category.category,
                            priority.priority", FALSE);
        $this->db->from("project");
        $this->db->join("project_category","project_category.projectCategoryid = project.categoryid");
        $this->db->join("priority","priority.priorityid = project.priority");
        $this->db->where("md5(projectid)",$projectid);
        $rs = $this->db->get()->result();
        
        return $rs;
        
    }
    
    
    public function getAllProjects($cat = "") {

        $this->db->select("project.projectid, project.`name` as 'projectName' ,priority.priority, project_category.category, 
                           CONCAT(contact.firstName,' ',contact.lastName) as 'manager',
                           date_format(project.dateStart, '%b %D, %Y') dateStart,
                           date_format(project.dueDate, '%b %D, %Y') dueDate, 
                           TIMEDIFF(project.dueDate, NOW()) dueDateFormated", false);
        $this->db->from("project");
        if($this->session->userdata('contact_type') == 2)
            $this->db->where("project.managerid", $this->session->userdata("login_id"));
                
        
        
        
        if(!empty($cat)){
            if($cat == "overDues"){
                $this->db->where("dueDate < ",date("Y-m-d"));
                $this->db->where("categoryid != ",3);
                
            }else {
                $this->db->where("project.categoryid", $cat);
            }
        }
        
        $this->db->join('contact', 'contact.contactid = project.managerid');
        $this->db->join('priority', 'priority.priorityid = project.priority');
        $this->db->join('project_category', 'project_category.projectCategoryid = project.categoryid');
        



        $rs = $this->db->get()->result();
        
        $dataArray = array();
        foreach ($rs as $rows) {
            $this->db->select("*");
            $this->db->from("project_memebers");
            $this->db->where("projectid",$rows->projectid);
            $this->db->group_by("projectid, contactid");
            
            
            $rsmembers = $this->db->get()->result();
            //echo $this->db->last_query(); 
            $countmemebers = count($rsmembers);

            $projectName = "<a href='".base_url()."project/detail/".md5($rows->projectid)."'>" . $rows->projectName . "</a>";
            
            $manager = $rows->manager;
            
            switch ($rows->priority){
                case "Very High":
                    $priority = '<span class="label label-small label-pink arrowed-right">'.$rows->priority.'</span>';
                    break;
                case "High":
                    $priority = '<span class="label label-small label-gray arrowed-right">'.$rows->priority.'</span>';
                    break;
                case "Medium":
                    $priority = '<span class="label label-small label-light arrowed-right">'.$rows->priority.'</span>';
                    break;
                case "Low":
                    $priority = '<span class="label label-small label-light arrowed-right">'.$rows->priority.'</span>';
                    break;
            }
            
            switch($rows->category){
                case "Completed":
                    $status = '<span class="label label-info arrowed-in-right arrowed">'.$rows->category.'</span>';
                    break;
                case "Running":
                    $status = '<span class="label label-success arrowed-in-right arrowed">'.$rows->category.'</span>';
                    break;
                case "On Hold":
                    $status = '<span class="label label-warning arrowed-in-right arrowed">'.$rows->category.'</span>';
                    break;
                case "Canceled":
                    $status = '<span class="label label-important arrowed-in-right arrowed">'.$rows->category.'</span>';
                    break;
                    
            }
            
            $startDate = '<span class="label  label-small label-info "><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;'.$rows->dateStart.'</span>';
            if($rows->dueDateFormated < 0 && $rows->category != "Completed"){
                $overdue = "label-important";
                $dticon = "<i class='icon-bolt'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } else {
                $overdue =  "label-info";
                $dticon = ($rows->category == "Completed")?"<i class='icon-ok'></i>&nbsp;&nbsp;":"<i class='icon-share-alt'></i>&nbsp;&nbsp;";
            }
            
            $dueDate = '<span class="label  label-small  '.$overdue.'" >'.$dticon.$rows->dueDate.'</span>';





            $dataArray[] = array($projectName, $manager, $countmemebers,  $priority, $status, $startDate, $dueDate);
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
        $this->db->where("contactType",2);
        $rs = $this->db->get()->result();
        foreach ($rs as $value) {
            $data[$value->contactid] = $value->firstName . " " . $value->lastName;
        }
        return $data;
    }
    
    public function getPorjectTeamMembers($projectid){
        
       
        
        $rs = $this->db->query("SELECT * FROM (contact) WHERE contactType = 3 AND contactid IN (SELECT contact.contactid 
                                FROM (contact) 
                                JOIN project_memebers ON contact.contactid = project_memebers.contactid 
                                WHERE md5(project_memebers.projectid) = '".$projectid."' UNION ALL
                                SELECT contact.contactid from contact where contact.contactType = 3 
                                and contactid not in (SELECT contactid from project_memebers where md5(projectid) != '".$projectid."'))");
        
        $result = $rs->result();
        
        $data = array();
        foreach ($result as $value) {
            $data[$value->contactid] = $value->firstName . " " . $value->lastName;
        }
        return $data;
    }
    
    
     public function getTeamMembers() {
        $this->db->select("contact.contactid");
        $this->db->from("contact");
        $this->db->join("project_memebers","contact.contactid = project_memebers.contactid");
        $this->db->join("project","project_memebers.projectid = project.projectid");
        $this->db->where("contact.contactType", 3);
        $this->db->or_where_in('project.categoryid',array(3,4));
        $rs1 = $this->db->get()->result();
        
        $contactid_not = array();
        foreach($rs1 as $v){
            $contactid_not[] = $v->contactid;
        }
        
        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("contactType",3);
        if(!empty($contactid_not))
            $this->db->where_not_in("contactid", $contactid_not);
        
        $rs = $this->db->get()->result();
        $data = array();
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
        $this->db->select("project_category.projectCategoryid,  project_category.category, count(project.categoryid) cat_count ", false);
        $this->db->from("project");
        if($this->session->userdata('contact_type') == 2)
            $this->db->where("project.managerid", $this->session->userdata("login_id"));
                
        
        
        $this->db->join("project_category", "project.categoryid = project_category.projectCategoryid","RIGHT");
        
        $this->db->group_by("project_category.category");
        $rs1 = $this->db->get()->result();
        
        $total = 0;
        foreach($rs1 as $val){
            $total += $val->cat_count;
        }
        
        
        $this->db->select("count(*) overdue", false);
        $this->db->from("project");
        if($this->session->userdata('contact_type') == 2)
            $this->db->where("project.managerid", $this->session->userdata("login_id"));
          
        $this->db->where("dueDate < ",date("Y-m-d"));
        $this->db->where("categoryid != ",3);
        $rs2 = $this->db->get()->result();
        
        $data = array("prg_cat" => $rs1,
                    "total" => $total,
                     "overdues" =>$rs2[0]->overdue
            );
        return $data;
        
        
    }
    
    public function getTeamMembersIds($projectid){
        $this->db->select("contactid");
        $this->db->from("project_memebers");
        $this->db->where("md5(project_memebers.projectid)",$projectid);
        $this->db->group_by("projectid, contactid");
        $rs = $this->db->get()->result();
        
        $data = array();
        foreach ($rs as $v){
            $data[] = $v->contactid;
         }
        
        return $data;
    }
    
    public function getProjectMembersById($projectid){
        $this->db->select("*, count(project_memebers.taskid) tasks_count");
        $this->db->from("project_memebers");
        $this->db->where("md5(project_memebers.projectid)",$projectid);
        $this->db->join("contact", "project_memebers.contactid = contact.contactid");
        $this->db->group_by("project_memebers.projectid, project_memebers.contactid");
        return $this->db->get()->result();
    }

}
