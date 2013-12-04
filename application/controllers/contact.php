<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct(){
		
		parent::__construct();

		$this->load->model("contact_model");
	}

	public function index(){
		
		if($this->session->userdata("login_id"))
			redirect(base_url()."home");
		
		
		$data["title"] = "SAB | Login" ;
		
		
		

		$this->load->view("login",$data);
	}

	
	public function add(){
		$data["title"] = "SAB | Add New Contact" ;
		$data["container"] = "contact/add";
		$data['menu'] = $this->accounts_model->loadMenu(1);
		$this->load->view("layout/template", $data);
	}

	public function login(){

		echo $this->accounts_model->getLogin($this->input->post('email'),$this->input->post('passwor'));

	}

	public function logout(){
		
		$this->session->sess_destroy();
		redirect(base_url()."account");
	}


}