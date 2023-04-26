<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rapor_Model extends CI_Model {
    public function isNilai(){
        return $this->db->query("SELECT * FROM master_siswa where nisn not in (
            SELECT nisn FROM penilaian WHERE isComplete is true
        )")->result_array();        
    }

    public function count_rows($nisn){
        $query = $this->db->query("SELECT *FROM raport where nisn =".$nisn."");
        return $query->num_rows();
    }

    public function isDuplicate($nisn,$id_pengembangan){
        return $this->db->query("SELECT *FROM raport WHERE nisn =".$nisn." AND id_pengembangan in(".$id_pengembangan.")")->num_rows();
    }

}
