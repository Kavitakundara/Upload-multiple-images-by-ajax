<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chekdata extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function auth($usermail, $userpass){
        $this->db->where('email',$usermail);
        $this->db->where('password', md5($userpass));
        $query= $this->db->get('emp');
        if($query->num_rows()>0){
            return $query->row();
        } 
    }
public function user_model(){
    
}

  
}