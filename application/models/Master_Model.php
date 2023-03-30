<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_Model extends CI_Model {
    
    public function add($request,$table){
        return $this->db->insert($table,$request);       
    }

    public function get($table){
        return $this->db->get($table)->result_array();
    }

    public function update($key,$table,$request,$id){
        $this->db->where($key,$id);
        return $this->db->update($table,$request);
    }

    public function delete($key,$table,$id){
        return $this->db->delete($table,[$key => $id]);
    }

    public function count($table){
        return $this->db->get($table)->num_rows();
    }
}
