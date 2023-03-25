<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_Model extends CI_Model {
    
    public function login($username){
        return $this->db->get_where('users',['username'=>$username])->row_array();        
    }
}
