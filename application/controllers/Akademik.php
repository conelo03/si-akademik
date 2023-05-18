<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

    public function master_guru($role){
      $data = [
        'title' => 'Data Guru',
        'role' => $role,
        'content' => 'akademik/guru',
        'guru' => $this->Master_Model->get('master_guru')
    ];
    $this->load->view('dashboard_template/main',$data);
    }

    public function addGuru(){
      $request = [
          'nuptk'=> $this->input->post('nuptk'),
          'nama'=> $this->input->post('nama'),
          'jk'=> $this->input->post('jk'),
          'tempat_lahir'=> $this->input->post('tempat'),
          'tgl_lahir'=> $this->input->post('tgl_lahir'),
          'jabatan'=> $this->input->post('jabatan'),
          'pendidikan_terakhir'=> $this->input->post('pendidikan'),
          'telp'=> $this->input->post('telp')
      ];
      $this->Master_Model->add($request,'master_guru');
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah data guru!</div>');
    return redirect('Akademik/master_guru/1');
  }

  public function updateGuru($id){
    $request = [
      'nuptk'=> $this->input->post('nuptk'),
      'nama'=> $this->input->post('nama'),
      'jk'=> $this->input->post('jk'),
      'tempat_lahir'=> $this->input->post('tempat'),
      'tgl_lahir'=> $this->input->post('tgl_lahir'),
      'jabatan'=> $this->input->post('jabatan'),
      'pendidikan_terakhir'=> $this->input->post('pendidikan'),
      'telp'=> $this->input->post('telp')
    ];
    $this->Master_Model->update(['nuptk'=>$id],'master_guru',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah data guru!</div>');
  return redirect('Akademik/master_guru/1');
}

  public function deleteGuru($id){ 
    $this->Master_Model->delete('nuptk','master_guru',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data guru!</div>');
    return redirect('Akademik/master_guru/1');
  }

  public function master_siswa($role){
    if($this->session->userdata('role') == 3){
      $data_siswa = $this->db->get_where('master_siswa',['nisn' => $this->session->userdata('id_daftar')])->result_array();
    }else{
      $data_siswa = $this->Master_Model->get('master_siswa');
    }
    $data = [
      'title' => 'Data Siswa',
      'role' => $role,
      'content' => 'akademik/siswa',
      'siswa' => $data_siswa
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
    return redirect('Akademik/master_siswa/1');
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
    return redirect('Akademik/master_siswa/1');
  }

  public function deleteSiswa($id){ 
    $this->Master_Model->delete('nisn','master_siswa',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data siswa!</div>');
    return redirect('Akademik/master_siswa/1');
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
    $config['upload_path']          = './assets/img/kegiatan';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 2000;
    $config['max_height']           = 2000;

    $this->load->library('upload', $config);
    if($this->upload->do_upload('foto')){
      $request = [
          'nama_kegiatan'=> $this->input->post('nama'),
          'foto_kegiatan'=> $this->upload->data('file_name'),
          'deskripsi'=> $this->input->post('deskripsi'),
      ];
      $this->Master_Model->add($request,'jadwal_kegiatan');
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah kegiatan!</div>');
    }else{
      $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan upload foto kegiatan!</div>');
    }
    return redirect('Akademik/kegiatan/1');
  }

public function updateKegiatan($id){
  $config['upload_path']          = './assets/img/kegiatan';
  $config['allowed_types']        = 'gif|jpg|png';
  $config['max_size']             = 3000;
  $config['max_width']            = 2000;
  $config['max_height']           = 2000;

  $this->load->library('upload', $config);
    if($this->upload->do_upload('foto')){
      $request = [
          'nama_kegiatan'=> $this->input->post('nama'),
          'foto_kegiatan'=> $this->upload->data('file_name'),
          'deskripsi'=> $this->input->post('deskripsi'),
      ];
    }else{
      $request = [
        'nama_kegiatan'=> $this->input->post('nama'),
        'deskripsi'=> $this->input->post('deskripsi')
      ];
    }
    $this->Master_Model->update('id_kegiatan','jadwal_kegiatan',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah kegiatan!</div>');
    return redirect('Akademik/kegiatan/1');
  }

  public function deleteKegiatan($id){ 
    $this->Master_Model->delete('id_kegiatan','jadwal_kegiatan',$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus kegiatan!</div>');
    return redirect('Akademik/kegiatan/1');
  }

  public function profil($role){
    $data = [
      'title' => 'Profil TK',
      'role' => $role,
      'content' => 'akademik/profil',
      'profil' => $this->Master_Model->get('profil_tk')
  ];
  $this->load->view('dashboard_template/main',$data);
  }


  public function addProfil(){
    $config['upload_path']          = './assets/img/organisasi';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;

    $this->load->library('upload', $config);
    if($this->upload->do_upload('foto')){
      $request = [
          'sejarah'=> $this->input->post('sejarah'),
          'visi_misi'=> $this->input->post('visi_misi'),
          'struktur_organisasi'=> $this->upload->data('file_name')
      ];
      $this->Master_Model->add($request,'profil_tk');
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil input profil!</div>');
    }else{
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Silahkan upload struktur organisasi!</div>');
    }
    return redirect('Akademik/profil/1');
  }

  public function updateProfil($id){
    $config['upload_path']          = './assets/img/organisasi';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 3000;
    $config['max_width']            = 3000;
    $config['max_height']           = 3000;

    $this->load->library('upload', $config);
    if($this->upload->do_upload('foto')){
      $request = [
          'sejarah'=> $this->input->post('sejarah'),
          'visi_misi'=> $this->input->post('visi_misi'),
          'struktur_organisasi'=> $this->upload->data('file_name')
      ];
      $this->Master_Model->update('id','profil_tk',$request,$id);
    }else{
      $request = [
        'sejarah'=> $this->input->post('sejarah'),
        'visi_misi'=> $this->input->post('visi_misi')
      ];
      $this->Master_Model->update('id','profil_tk',$request,$id);
    }
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah profil!</div>');
    return redirect('Akademik/profil/1');
  }
  
    // public function deleteProfil($id){ 
    //   $this->Master_Model->delete('id','profil_tk',$id);
    //   $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus profil!</div>');
    //   return redirect('Akademik/profil');
    // }



}
