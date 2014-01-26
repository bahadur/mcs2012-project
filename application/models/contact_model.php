<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact_model extends CI_Model {

	

	



	public function getLogin($emailid, $pass){
		$this->db->select("*");
		$this->db->from("contact");
		$this->db->where("email", $emailid);
		$this->db->where("password",$pass);

		$rs = $this->db->get()->result();
		
		if(count($rs)>0){
			$this->session->set_userdata("login_id", $rs[0]->contactid);
			$this->session->set_userdata("login_email", $rs[0]->email);
			$this->session->set_userdata("login_fname", $rs[0]->firstName);
			$this->session->set_userdata("login_lname", $rs[0]->lastName);
			return 1;
		}
		else {
			return 2;
		}
	}


	public function loadMenu($contactid){

		
		$data_menu = array();
		if($contactid == 1){
			
			
			$this->db->select("*");
			$this->db->from("menu");
			$this->db->where("parentid", 0);
			$this->db->order_by("order");
			$rs1 = $this->db->get()->result();
			
			//$manu = array("title"=>"","component"=>"","submenu" => array("title"=>"","component"=>""));
			foreach($rs1 as $topmenu){
				$menu["title"] = $topmenu->title;
				$menu["component"] = $topmenu->component;
				$menu["submenu"] = array();
				
				$this->db->select("*");
				$this->db->from("menu");
				$this->db->where("parentid", $topmenu->menuid);
				$this->db->order_by("order");
				$rs2 = $this->db->get()->result();
				foreach($rs2 as $submenu){
					$smenu["title"] = $submenu->title;
					$smenu["component"] = $submenu->component;
					$menu["submenu"][] = $smenu;
				
					
				}
				$data_menu[] = $menu;
			}
				


		}	
		
		return $data_menu;
		//$this->load->view("menu")
	}
        
        

}

?>