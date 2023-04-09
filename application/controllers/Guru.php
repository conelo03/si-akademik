<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {
    public function absenSiswa(){
        $data = [
            'title' => 'Absensi Siswa',
            'content' => 'guru/absen',
            'role' => 2,
            'absensi' => $this->Absen_Model->absen(),
            'count' => $this->Absen_Model->count(),
            'list' => $this->Absen_Model->join('absen_siswa') 
        ];

        $this->load->view('dashboard_template/main',$data);
    }

    public function isiAbsen(){
        $request = [
            'nisn'=>$this->input->post('nisn'),
            'kehadiran'=>$this->input->post('kehadiran'),
            'tanggal'=>date('Y-m-d')
        ];
        $this->Absen_Model->add($request,'absen_siswa');
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil Absen!</div>');
        return redirect('Guru/absenSiswa');
    }

    public function koreksiAbsen($nisn){
        $request = [
            'nisn'=>$nisn,
            'kehadiran'=>$this->input->post('kehadiran'),
            'tanggal'=>date('Y-m-d')
        ];
        $this->Master_Model->update('nisn','absen_siswa',$request,$nisn);
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil koreksi Absen!</div>');
        return redirect('Guru/absenSiswa');
    }

}