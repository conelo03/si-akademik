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

    public function countBy($table,$by,$val){
        return $this->db->get_where($table,[$by => $val])->num_rows();
    }

    public function join($table1,$table2,$table3,$key,$key2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, ''.$table1.'.'.$key.'='.$table2.'.'.$key.'');
        $this->db->join($table3, ''.$table2.'.'.$key2.'='.$table3.'.'.$key2.'');
        return $this->db->get()->result_array();
    }
}
