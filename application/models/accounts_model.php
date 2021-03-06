<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Accounts_model extends CI_Model {

    public function getLogin($emailid, $pass) {


        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("email", $emailid);
        $this->db->where("password", md5($pass));
        $this->db->where("activated", 1);

        $rs = $this->db->get()->result();


        if (count($rs) > 0) {
            $this->session->set_userdata("login_id", $rs[0]->contactid);
            $this->session->set_userdata("login_email", $rs[0]->email);
            $this->session->set_userdata("login_fname", $rs[0]->firstName);
            $this->session->set_userdata("login_lname", $rs[0]->lastName);
            $this->session->set_userdata("contact_type", $rs[0]->contactType);

            return 1;
        } else {
            return 2;
        }
    }

    public function activate($contactid) {

        $this->db->select("*");
        $this->db->from("contact");
        $this->db->where("md5(contactid)", $contactid);

        $rs = $this->db->get()->result();

        if (count($rs) > 0) {
            if ($rs[0]->activated == 1) {
                return "Activation URL expired";
            } elseif ($rs[0]->activated == 0) {
                $data = array('activated' => 1);

                $this->db->where('md5(contactid)', $contactid);
                $this->db->update('contact', $data);
                return "Your account is ready to use. <br /><a href='" . base_url() . "' >Click here</a> to login";
            }
        } else {
            return "Activation URL is invalid";
        }
    }

    public function loadMenu() {


        $data_menu = array();



        $this->db->select("*");
        $this->db->from("menu");
        $this->db->join("permission", "menu.menuid = permission.menuid");
        $this->db->where("parentid", 0);
        $this->db->where("permission.roleid", $this->session->userdata("contact_type"));
        $this->db->order_by("order");
        $rs1 = $this->db->get()->result();


        //$manu = array("title"=>"","component"=>"","submenu" => array("title"=>"","component"=>""));
        foreach ($rs1 as $topmenu) {
            $menu["title"] = $topmenu->title;
            $menu["component"] = $topmenu->component;
            $menu["icon"] = $topmenu->icon;
            $menu["submenu"] = array();

            $this->db->select("*");
            $this->db->from("menu");
            $this->db->join("permission", "menu.menuid = permission.menuid");
            $this->db->where("parentid", $topmenu->menuid);
            $this->db->where("permission.roleid", $this->session->userdata("contact_type"));
            $this->db->order_by("order");
            $rs2 = $this->db->get()->result();
            foreach ($rs2 as $submenu) {
                $smenu["title"] = $submenu->title;
                $smenu["component"] = $submenu->component;
                $smenu["icon"] = $topmenu->icon;
                $menu["submenu"][] = $smenu;
            }
            $data_menu[] = $menu;
        }





        return $data_menu;
        //$this->load->view("menu")
    }

    public function getContacts() {


        $this->db->select("contact.contactid, CONCAT(contact.firstName, ' ', contact.lastName) as name ,contacttype.type, company.name as companyName, contact.email, createDate, activated", false);
        $this->db->from("contact");
        $this->db->join("company", "contact.companyid = company.companyid");
        $this->db->join("contacttype", "contact.contactType = contacttype.contactTypeid");

        $rs = $this->db->get()->result();

        $dataArray = array();
        foreach ($rs as $rows) {

            $name = "<a href='" . base_url() . "account/profile/" . md5($rows->contactid) . "'>" . $rows->name . "</a>";
            $designation = $rows->type;
            $companyName = $rows->companyName;
            $email = $rows->email;
            $dateCreate = $rows->createDate;
            $activated = ($rows->activated == 1) ? "Yes" : "No";



            $dataArray[] = array($name, $designation, $companyName, $email, $dateCreate, $activated);
        }

        return array("aaData" => $dataArray);
    }

    public function getManagerProjects() {





        $this->db->select("contact.contactid, CONCAT(contact.firstName, ' ', contact.lastName) as name ,company.name as companyName, contact.email, count(project.managerid) as TotalProjects", false);
        $this->db->from("contact");
        $this->db->join("project", "contact.contactid = project.managerid", "left");
        $this->db->join("company", "contact.companyid = company.companyid");
        $this->db->where("contactType", 2);

        $this->db->group_by("contact.contactid");



        $rs = $this->db->get()->result();
        //echo $this->db->last_query();
        $dataArray = array();
        foreach ($rs as $rows) {

            $name = "<a href='#''>" . $rows->name . "</a>";
            $companyName = $rows->companyName;
            $email = $rows->email;

            $TotalProjects = $rows->TotalProjects;



            $dataArray[] = array($name, $companyName, $email, $TotalProjects);
        }

        return array("aaData" => $dataArray);
    }

    public function getMessages() {
        date_default_timezone_set("Asia/Karachi");
        $this->db->select("message.message, UNIX_TIMESTAMP(message.msgtime) msgtime, contact.firstName, contact.lastName");
        $this->db->from("message");
        $this->db->join("contact", "message.fromid = contact.contactid");
        $this->db->where("isread", 0);
        $this->db->where("toid", $this->session->userdata("login_id"));
        $this->db->order_by("msgtime", "desc");
        $msg = array();
        foreach ($this->db->get()->result() as $values) {
            $msg[] = array("message" => word_limiter($values->message, 3),
                "msgtime" => getTimeSummary($values->msgtime), "from" => $values->firstName);
        }
        return $msg;
    }

    public function getNewMessage() {
        $this->db->select("*");
        $this->db->from("message");
        $this->db->where("toid", $this->session->userdata("login_id"));
        $this->db->where("isread", 0);
        $rs = $this->db->get();
        return count($rs->result());
    }

    public function getProjectLoad() {

        $this->db->select("count(contact.contactid) data, firstName, lastName", false);
        $this->db->from("contact");
        $this->db->join("project", "contact.contactid = project.managerid");
        $this->db->where("contact.contactType", 2);
        $this->db->group_by("contact.contactid");

        $rs = $this->db->get()->result();
        $arr = array();
        $color = array("#68BC31", "#2091CF", "#AF4E96", "#DA5430", "#FEE074");
        $a = 0;
        foreach ($rs as $row) {
            $arr[] = array("label" => $row->firstName . " " . $row->lastName, "data" => $row->data, "color" => $color[$a]);
            if ($a == 4) {
                $a = 0;
            } else {
                $a++;
            }
        }
        return $arr;
        // return array(
        // 			array("label"=>"Web Development", "data"=>78, "color"=>"#68BC31"),
        // 			array("label"=>"CMS Based Web app", "data"=>68, "color"=>"#2091CF"),
        // 			array("label"=>"Iphone app", "data"=>15, "color"=>"#AF4E96"),
        // 			array("label"=>"Android", "data"=>35, "color"=>"#DA5430"),
        // 			array("label"=>"other", "data"=>10, "color"=>"#FEE074")
        // 		);
    }

    public function getProfile($contactid) {

        $this->db->select(" contact.contactid,
                            contact.firstName,
                            contact.lastName,
                            company.name as company,
                            contact.email,
                            contact.password,
                            contact.title,
                            contact.workPhone,
                            contact.homePhone,
                            contact.mobilePhone,
                            contact.fax,
                            contact.contactType,
                            contact.companyid,
                            contact.mainContact,
                            contact.allowLogin,
                            contact.address1,
                            contact.address2,
                            contact.address3,
                            contact.city,
                            contact.state,
                            contact.country,
                            contact.twitter,
                            contact.facebook,
                            contact.linkedin,
                            contact.createDate,
                            contact.activated
                            
                            ");
        $this->db->from("contact");
        $this->db->join("company", "contact.companyid = company.companyid");

        $this->db->where("md5(contact.contactid)", $contactid);

        return $this->db->get()->result();
    }

    public function getProfileSelected($contactid) {

        $this->db->select("firstName as 'First Name', lastName as 'Last Name',  workPhone as 'Phone (office)', homePhone as 'Phone (home)', mobilePhone as 'Phone (mobile)', fax as 'Fax', contactType, companyid, mainContact, allowLogin, address1 as 'Address 1', address2 as 'Address 2', address3 as 'Address 3', city as 'City', state as 'State', country as 'Country'");
        $this->db->from("contact");
        $this->db->where("contactid", $contactid);

        return $this->db->get()->result();
    }

    public function update($contactid, $update_value) {
        if ($update_value['key'] == 'company') {
            $update_value['key'] = 'companyid';
        }
        $data = array(
            $update_value['key'] => $update_value['value']
        );

        $this->db->where('contactid', $contactid);
        $this->db->update('contact', $data);
    }

    public function getProjects($contactid) {
        $this->db->select("project.projectid, project.`name` as 'projectName' ,priority.priority, project_category.category, 
                           CONCAT(contact.firstName,' ',contact.lastName) as 'manager',
                           date_format(project.dateStart, '%b %D, %Y') dateStart,
                           date_format(project.dueDate, '%b %D, %Y') dueDate, 
                           TIMEDIFF(project.dueDate, NOW()) dueDateFormated", false);
        $this->db->from("project");
        $this->db->where("project.managerid", $contactid);
        $this->db->join('contact', 'contact.contactid = project.managerid');
        $this->db->join('priority', 'priority.priorityid = project.priority');
        $this->db->join('project_category', 'project_category.projectCategoryid = project.categoryid');

        $rs = $this->db->get()->result();

        $dataArray = array();
        foreach ($rs as $rows) {

            if ($rows->dueDateFormated < 0 && $rows->category != "Completed") {
                $overdue = "label-important";
                $dticon = "<i class='icon-bolt'></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            } else {
                $overdue = "label-info";
                $dticon = ($rows->category == "Completed") ? "<i class='icon-ok'></i>&nbsp;&nbsp;" : "<i class='icon-share-alt'></i>&nbsp;&nbsp;";
            }
            $name = "<a href='javascript:void(0)' class='prj_id' id='project_" . $rows->projectid . "' >" . $rows->projectName . "</a>";

            $startDate = '<span class="label  label-large label-info "><i class="fa fa-location-arrow"></i>&nbsp;&nbsp;' . $rows->dateStart . '</span>';
            $dueDate = '<span class="label  label-large  ' . $overdue . '" >' . $dticon . $rows->dueDate . '</span>';






            $dataArray[] = array($name, $startDate, $dueDate);
        }

        return array("aaData" => $dataArray);
    }

    public function getMembers($contactid) {
//        $rs = $this->db->query("select * from contact where contactid in (
//        select contactid from project_memebers where projectid in (
//        select projectid from project where managerid = ".$contacid."))");
//        $result = $rs->result();

        $this->db->select("*");
        $this->db->from("project");
        $this->db->where("managerid", $contactid);
        $prjid = $this->db->get()->result();

        foreach ($prjid as $prjid_val) {
            $this->db->select("project_memebers.rowid,
                                project_memebers.projectid,
                                project_memebers.contactid,
                                count(project_memebers.taskid) tasks,
                                contact.firstName,
                                contact.email,
                                project.name", false);
            $this->db->from("project_memebers");
            $this->db->where("project_memebers.projectid", $prjid_val->projectid);
            $this->db->join("project", "project_memebers.projectid = project.projectid");
            $this->db->join("contact", "project_memebers.contactid = contact.contactid");
            $this->db->group_by("project_memebers.projectid, project_memebers.contactid");




            $prj_membersid = $this->db->get()->result();

            foreach ($prj_membersid as $prj_membersid_val) {
                $dataArray[] = array($prj_membersid_val->firstName, $prj_membersid_val->email, $prj_membersid_val->tasks);
                //$data[$prjid_val->projectid][$prj_membersid_val->contactid][] = $prj_membersid_val->taskid;
            }
        }

        return array("aaData" => $dataArray);
    }

    public function getManagersCount() {
        $this->db->select("count(contactid) managers", false);
        $this->db->from("contact");
        $this->db->where("contactType", 2);
        $rs = $this->db->get()->result();

        return $rs[0]->managers;
    }

    public function getMembersCount($managerid) {
        
    }
    
    public function isManager($contactid){
        
        
        if($this->session->userdata('contact_type') == 2)
            return true;
        else 
            return false;
    }

}

?>