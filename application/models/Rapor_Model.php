<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor_Model extends CI_Model {
    public function isNilai(){
        return $this->db->query("SELECT *FROM master_siswa where nisn not in(
            SELECT nisn FROM raport
        ) ")->result_array();        
    }
}
