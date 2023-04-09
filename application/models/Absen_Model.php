<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_Model extends CI_Model {
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

    public function count(){
        $query = $this->db->query("SELECT *FROM master_siswa where nisn not in (
            select nisn from absen_siswa   
       )");
        return $query->num_rows();
    }

    public function absen(){
        $query = $this->db->query("SELECT *FROM master_siswa where nisn not in (
            select nisn from absen_siswa   
       )");
        return $query->result_array();
    }

    public function join(){
        $this->db->select('*');
        $this->db->from('master_siswa');
        $this->db->join('absen_siswa', 'master_siswa.nisn = absen_siswa.nisn');
        return $this->db->get()->result_array();
    }
}
