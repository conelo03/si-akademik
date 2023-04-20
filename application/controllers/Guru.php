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

    public function raporSiswa(){
        $data = [
            'title' => 'Rapor Siswa',
            'content' => 'guru/rapor',
            'role' => 2,
            'bidang' => $this->Master_Model->get('pengembangan'),
            'rapor' => $this->Master_Model->join('master_siswa','raport','pengembangan','nisn','id_pengembangan'),
            'isNilai' => $this->Rapor_Model->isNilai()
        ];
        $this->load->view('dashboard_template/main',$data);
    }

    public function inputNilai(){
        $request = [
            'nisn' => $this->input->post('nisn'),
            'id_pengembangan' => $this->input->post('bidang'),
            'semester' => $this->input->post('semester'),
            'tahun_ajaran' => $this->input->post('tahun'),
            'keterampilan' => $this->input->post('nilai_keterampilan'),
            'sikap' => $this->input->post('nilai_sikap'),
            'pengetahuan' => $this->input->post('nilai_pengetahuan'),
            'deskripsi_keterampilan' => $this->input->post('deskripsi_keterampilan'),
            'deskripsi_sikap' => $this->input->post('deskripsi_sikap'),
            'deskripsi_pengetahuan' => $this->input->post('deskripsi_pengetahuan')
        ];
        $this->Master_Model->add($request,'raport');
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil Input Nilai!</div>');
        return redirect('Guru/raporSiswa');
    }

}