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
        
        //insert ke tabel penilaian
        $progress = $this->Rapor_Model->count_rows($request['nisn']);
        if ($progress == 0){
            $request2 = [
                'nisn' => $request['nisn'],
                'semester' => $request['semester'],
                'progress' => $progress++,
                'isComplete' => FALSE
            ];
            $this->Master_Model->add($request2,'penilaian');
        }
        
        //UPDATE isComplete
        if($progress == 6){
            $this->Master_Model->update('nisn','penilaian',['isComplete'=>TRUE],$request['nisn']);
        }
        $this->Master_Model->update('nisn','penilaian',['progress'=>$progress++],$request['nisn']);

        //Validate duplikat nilai pengembangan
        $isDuplicate = $this->Rapor_Model->isDuplicate($request['nisn'],$request['id_pengembangan']);
        if($isDuplicate == 0){
            //insert ke tabel raport
            $this->Master_Model->add($request,'raport');
            $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil Input Nilai!</div>');
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Nilai Sudah diinput!</div>');
        }
        return redirect('Guru/raporSiswa');
    }

}