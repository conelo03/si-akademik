<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_Model extends CI_Model {
    
    public function add($request){
        return $this->db->insert('pendaftar',$request);       
    }

    public function get(){
        return $this->db->get('pendaftar')->result_array();
    }

    public function update($request,$id){
        $this->db->where('nisn',$id);
        return $this->db->update('pendaftar',$request);
    }

    public function delete($id){
        return $this->db->delete('pendaftar',['nisn'=> $id]);
    }
}
