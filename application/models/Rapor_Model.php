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

    public function isDuplicate($nisn,$id_raport,$semester,$req){
        $query = $this->db->query("SELECT *FROM raport WHERE nisn =".$nisn." AND semester =".$semester." AND id_pengembangan in(".$id_pengembangan.")");
        $count = $query->num_rows();
        $data = $query->row_array();
        var_dump($data);die;
        if($id_pengembangan !== $data['id_pengembangan']){
           $this->db->where(['nisn' => $nisn,'id_pengembangan'=>$id_pengembangan,'semester'=>$semester]);
           return $this->db->update('raport',$req); 
        }else{
            echo 'tidak ada duplikat';
        }
    }

    public function updateNilai($request,$val1,$val2,$val3){
        $this->db->where(['nisn' => $val1,'id_pengembangan'=>$val2,'semester'=>$val3]);
        return $this->db->update('raport',$request);
    }

}
