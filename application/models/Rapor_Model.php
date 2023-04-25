<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor_Model extends CI_Model {
    public function isNilai(){
        return $this->db->query("SELECT * FROM master_siswa")->result_array();        
    }

    public function count_rows($nisn){
        $query = $this->db->query("SELECT *FROM raport where nisn =".$nisn."");
        return $query->num_rows();
    }
}
