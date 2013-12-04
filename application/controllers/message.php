<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller {
    
   	function __construct(){
		
        parent::__construct();
    
    	$this->load->model("accounts_model");
        
        if (!$this->session->userdata("login_id"))
            redirect(base_url() . "account");
		
	}
    
    public function index(){
        
        $data["title"] = "SAB | Add New Contact" ;
		$data["container"] = "message/all";
		$data['menu'] = $this->accounts_model->loadMenu(1);
		$this->load->view("layout/template", $data);
        
    }


}

