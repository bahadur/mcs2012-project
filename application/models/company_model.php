<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company_model extends CI_Model {


    public function getCompanies(){
        
        $this->db->select("companyid, name");
        $this->db->from("company");
        $this->db->order_by("name");
        $cmp = array();
        foreach($this->db->get()->result() as $v){
            $cmp[$v->companyid] = $v->name;
        }
        return $cmp;
    }


}