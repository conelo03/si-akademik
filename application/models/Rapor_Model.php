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

    public function updateNilai($request,$val1,$val2,$val3){
        $this->db->where(['nisn' => $val1,'id_pengembangan'=>$val2,'semester'=>$val3]);
        return $this->db->update('raport',$request);
    }

    public function isDuplicate($nisn,$id_pengembangan,$semester,$flag){
        $query = $this->db->query("SELECT *FROM raport WHERE nisn =".$nisn." AND semester =".$semester." AND id_pengembangan in(".$id_pengembangan.")");
        $data = $query->row_array();
        if($flag === 'add'){
            return $query->num_rows();
        }else{
            $req = [
                'semester' => $semester ,
                'tahun_ajaran' => $this->input->post('tahun'),
                'keterampilan' => $this->input->post('nilai_keterampilan'),
                'sikap' => $this->input->post('nilai_sikap'),
                'pengetahuan' => $this->input->post('nilai_pengetahuan'),
                'deskripsi_keterampilan' => $this->input->post('deskripsi_keterampilan'),
                'deskripsi_sikap' => $this->input->post('deskripsi_sikap'),
                'deskripsi_pengetahuan' => $this->input->post('deskripsi_pengetahuan')
            ];
            return $this->updateNilai($req,$nisn,$id_pengembangan,$semester);
        }
    }

    public function join($table1,$table2,$table3,$key,$key2,$key3){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, ''.$table1.'.'.$key.'='.$table2.'.'.$key.'');
        $this->db->join($table3, ''.$table2.'.'.$key2.'='.$table3.'.'.$key2.'');
        $this->db->where([$table1.'.nisn' => $key3]);
        return $this->db->get()->result_array();
    }

    public function join1($table1,$table2,$table3,$key,$key2,$key3){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, ''.$table1.'.'.$key.'='.$table2.'.'.$key.'');
        $this->db->join($table3, ''.$table2.'.'.$key2.'='.$table3.'.'.$key2.'');
        $this->db->where([$table1.'.nisn' => $key3]);
        return $this->db->get()->row_array();
    }


}
