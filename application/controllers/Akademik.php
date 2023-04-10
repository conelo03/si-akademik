<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function master_guru(){
      $data = [
        'title' => 'Data Guru',
        'role' => 'Akademik',
        'content' => 'akademik/guru',
        'guru' => $this->Master_Model->get('master_guru')
    ];
    $this->load->view('dashboard_template/main',$data);
    }

    public function addGuru(){
      $request = [
          'nuptk'=> $this->input->post('nuptk'),
          'nik'=> $this->input->post('nik'),
          'nama'=> $this->input->post('nama'),
          'jk'=> $this->input->post('jk'),
          'tempat_lahir'=> $this->input->post('tempat'),
          'tgl_lahir'=> $this->input->post('tgl_lahir'),
          'jabatan'=> $this->input->post('jabatan'),
          'masa_kerja'=> $this->input->post('masa_kerja'),
          'pendidikan_terakhir'=> $this->input->post('pendidikan'),
          'telp'=> $this->input->post('telp')
      ];
      $this->Master_Model->add($request,'master_guru');
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah data guru!</div>');
    return redirect('Akademik/master_guru');
  }

  public function updateGuru($id){
    $request = [
      'nuptk'=> $this->input->post('nuptk'),
      'nik'=> $this->input->post('nik'),
      'nama'=> $this->input->post('nama'),
      'jk'=> $this->input->post('jk'),
      'tempat_lahir'=> $this->input->post('tempat'),
      'tgl_lahir'=> $this->input->post('tgl_lahir'),
      'jabatan'=> $this->input->post('jabatan'),
      'masa_kerja'=> $this->input->post('masa_kerja'),
      'pendidikan_terakhir'=> $this->input->post('pendidikan'),
      'telp'=> $this->input->post('telp')
    ];
    $this->Master_Model->update(['nuptk'=>$id],'master_guru',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah data guru!</div>');
  return redirect('Akademik/master_guru');
}

  public function deleteGuru($id){ 
    $this->Master_Model->delete('nuptk','master_guru',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data guru!</div>');
    return redirect('Akademik/master_guru');
  }

  public function master_siswa($role){
    $data = [
      'title' => 'Data Siswa',
      'role' => $role,
      'content' => 'akademik/siswa',
      'siswa' => $this->Master_Model->get('master_siswa')
  ];
  $this->load->view('dashboard_template/main',$data);
  }

  public function addSiswa(){
    $request = [
        'nisn'=> $this->input->post('nisn'),
        'nama'=> $this->input->post('nama'),
        'alamat'=> $this->input->post('alamat'),
        'jk'=> $this->input->post('jk'),
        'agama'=> $this->input->post('agama'),
        'tempat_lahir'=> $this->input->post('tempat'),
        'tgl_lahir'=> $this->input->post('tgl_lahir'),
        'tahun_ajaran'=> $this->input->post('tahun_ajaran'),
        'alat_transportasi'=> $this->input->post('alat_transportasi'),
        'jenis_tinggal'=> $this->input->post('jenis_tinggal')
    ];
    $this->Master_Model->add($request,'master_siswa');
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah data siswa!</div>');
  return redirect('Akademik/master_siswa');
}

public function updateSiswa($id){
  $request = [
    'nisn'=> $this->input->post('nisn'),
    'nama'=> $this->input->post('nama'),
    'alamat'=> $this->input->post('alamat'),
    'jk'=> $this->input->post('jk'),
    'agama'=> $this->input->post('agama'),
    'tempat_lahir'=> $this->input->post('tempat'),
    'tgl_lahir'=> $this->input->post('tgl_lahir'),
    'tahun_ajaran'=> $this->input->post('tahun_ajaran'),
    'alat_transportasi'=> $this->input->post('alat_transportasi'),
    'jenis_tinggal'=> $this->input->post('jenis_tinggal')
];
    $this->Master_Model->update('nisn','master_siswa',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah data siswa!</div>');
    return redirect('Akademik/master_siswa');
  }

  public function deleteSiswa($id){ 
    $this->Master_Model->delete('nisn','master_siswa',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data siswa!</div>');
    return redirect('Akademik/master_siswa');
  }

  public function kegiatan($role){
    $data = [
      'title' => 'Kegiatan',
      'role' => $role,
      'content' => 'akademik/kegiatan',
      'kegiatan' => $this->Master_Model->get('jadwal_kegiatan')
  ];
  $this->load->view('dashboard_template/main',$data);
  }

  public function addKegiatan(){
    $request = [
        'jadwal'=> $this->input->post('jadwal'),
        'harian'=> $this->input->post('harian'),
        'materi_kegiatan'=> $this->input->post('materi'),
        'keterangan'=> $this->input->post('keterangan'),
    ];
    $this->Master_Model->add($request,'jadwal_kegiatan');
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah kegiatan!</div>');
  return redirect('Akademik/kegiatan');
}

public function updateKegiatan($id){
  $request = [
    'jadwal'=> $this->input->post('jadwal'),
    'harian'=> $this->input->post('harian'),
    'materi_kegiatan'=> $this->input->post('materi'),
    'keterangan'=> $this->input->post('keterangan'),
];
    $this->Master_Model->update('id_jadwal','jadwal_kegiatan',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah kegiatan!</div>');
    return redirect('Akademik/kegiatan');
  }

  public function deleteKegiatan($id){ 
    $this->Master_Model->delete('id_jadwal','jadwal_kegiatan',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus kegiatan!</div>');
    return redirect('Akademik/kegiatan');
  }



}
