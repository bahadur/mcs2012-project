<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Account extends CI_Controller {

    function __construct() {

        parent::__construct();

        $this->load->model("accounts_model");
        $this->load->model("company_model");
        
    }

    public function index() {


        if ($this->session->userdata("login_id"))
            redirect(base_url() . "home");


        $data["title"] = "SAB | Login";





        $this->load->view("login", $data);
    }

    public function add_new() {
        
        
        $this->load->library('email');
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'title' => $this->input->post('title'),
            'workPhone' => $this->input->post('workPhone'),
            'homePhone' => $this->input->post('homePhone'),
            'mobilePhone' => $this->input->post('mobilePhone'),
            'fax' => $this->input->post('fax'),
            'contactType' => $this->input->post('contactType'),
            'companyid' => $this->input->post('companyid'),
            'mainContact' => ($this->input->post('mainContact') == 'on') ? 1 : 0,
            'allowLogin' => ($this->input->post('allowLogin') == 'on') ? 1 : 0,
            'password' => md5($this->input->post('password')),
            'address1' => $this->input->post('address1'),
            'address2' => $this->input->post('address2'),
            'address3' => $this->input->post('address3'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
            'twitter' => $this->input->post('twitter'),
            'facebook' => $this->input->post('facebook'),
            'linkedin' => $this->input->post('linkedin'),
            'createDate' => date("Y-m-d H:i:s"));


        if ($this->db->insert("contact", $data)) {
            $msg = "<p>Dear " . $this->input->post('firstName') . " " . $this->input->post('lastName') . "<br /><br />";
            $msg .= "Administrator of SAB created you account on behalf of you.</p>";
            $msg .= "<p><b><u>Account Info:</u></b><br />";
            $msg .= "<b>Login Email:</b>" . $this->input->post('email') . "<br />";
            $msg .= "<b>Password:</b>" . $this->input->post('password') . "<br /><br /></p>";
            $msg .= "<p>Please activate your account first by visiting below url.</p><br />";

            $msg .= base_url() . "account/activation/" . md5($this->db->insert_id());
            $msg .= "<p> Thanks <br /><br />";
            $msg .= "Team SAB Multi Project<br /><br /><br />";
            $msg .= "<hr>";
            $msg .= "<p><i>You are receiving this mail as you have registered with SAB Multi Project. Please do not reply on this email.</i></p>";


            $this->email->clear();
            $config['mailtype'] = 'html';
            $this->email->initialize($config);
            $this->email->from('bahadur.oad@gmail.com', 'Bahadur Oad');
            $this->email->to($this->input->post('email'));


            $this->email->subject('SAB Administrator | Account Created');
            $this->email->message($msg);

            if ($this->email->send())
                echo 1;
            else
                echo 2;
        } else {
            echo 0;
        }
    }

    public function activation($contactid) {
        $data["title"] = "SAB | Account Activation";
        $data['result'] = $this->accounts_model->activate($contactid);
        $this->load->view("activation", $data);
    }

    public function summary() {
        if (!$this->session->userdata("login_id"))
            redirect(base_url() . "account");
        //date_default_timezone_set("Asia/Karachi"); 
        //echo getTimeSummary(mktime(15,7,12,11,14,2013));

        $data["title"] = "SAB | Contacts Summary";
        $data["container"] = "contact/summary";
        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }

    public function create() {
        if (!$this->session->userdata("login_id"))
            redirect(base_url() . "account");
        //date_default_timezone_set("Asia/Karachi"); 
        //echo getTimeSummary(mktime(15,7,12,11,14,2013));

        $data["companies"] = $this->company_model->getCompanies();
        //print_r($data["companies"][0]);
        $data["title"] = "SAB | Add New Contact";
        $data["container"] = "contact/new";
        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }

    public function contacts() {
        //header("content-type: application/json");

        echo json_encode($this->accounts_model->getContacts());
    }

    public function managers() {
        header("content-type: application/json");

        echo json_encode($this->accounts_model->getManagerProjects());
    }

    public function messages() {
        header("content-type: application.json");
        echo json_encode($this->accounts_model->getMessages());
    }

    public function newMessage() {
        header("content-type: application.json");
        echo json_encode($this->accounts_model->getNewMessage());
    }

    public function add() {
        $data["title"] = "SAB | Add New Contact";
        $data["container"] = "contact/";
        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }

    public function login() {

        echo $this->accounts_model->getLogin($this->input->post('email'), $this->input->post('passwor'));
    }

    public function logout() {

        $this->session->sess_destroy();
        redirect(base_url() . "account");
    }

    public function prj_load() {
        header("content-type: application/json");
        // echo '[{ label: "social networks",  data: 38.7, color: "#68BC31"},
        // 	{ label: "search engines",  data: 24.5, color: "#2091CF"},
        // 	{ label: "ad campaings",  data: 8.2, color: "#AF4E96"},
        // 	{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
        // 	{ label: "other",  data: 10, color: "#FEE074"}]';


        echo json_encode($this->accounts_model->getProjectLoad());
    }

    public function profile($contactid = "") {

        if (empty($contactid)) {

            $data["container"] = "contact/myprofile";
            $data['profile'] = $this->accounts_model->getProfile(md5($this->session->userdata('login_id')));
        } else {

            $data["container"] = "contact/profile";
            $data['profile'] = $this->accounts_model->getProfile($contactid);
        }

        $data["title"] = "SAB | Profile | " . $data["profile"][0]->firstName . " " . $data["profile"][0]->lastName;
        $data["companies"] = json_encode($this->company_model->getCompanies());



        $data['menu'] = $this->accounts_model->loadMenu(1);
        $this->load->view("layout/template", $data);
    }

    public function update() {
        $this->accounts_model->update($this->session->userdata('login_id'), $this->input->post());
    }

    public function projects() {
        header("content-type: application/json");

        echo json_encode($this->accounts_model->getProjects($this->session->userdata('login_id')));
    }

    public function tasks() {
        header("content-type: application/json");

        echo json_encode($this->accounts_model->getTasks($this->session->userdata('login_id')));
    }
    
     public function members() {
        header("content-type: application/json");
        $rsdata = $this->accounts_model->getMembers($this->session->userdata('login_id'));
        //$dataArray = array();
//        foreach ($rsdata as $value) {
//            $name = $value->firstName." ".$value->lastName;
//            $email = $value->email;
//            $taskassing = 1;
//            $dataArray[] = array($name, $email, $taskassing);
//        }
         
       // echo json_encode(array("aaData" => $dataArray));
    }

}
