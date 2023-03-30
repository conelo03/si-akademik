<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends CI_Controller {

	public function pendaftaran()
	{
        $data = [
            'title' => 'Pendaftaran',
            'role' => 'Akademik',
            'content' => 'akademik/pendaftaran',
            'pendaftar' => $this->Register_Model->get()
        ];
        $this->load->view('dashboard_template/main',$data);
	}

    public function add(){
        $request = [
            'nisn'=> $this->input->post('nisn'),
            'nama'=> $this->input->post('nama'),
            'jk'=> $this->input->post('jk'),
            'tempat_lahir'=> $this->input->post('tempat'),
            'tanggal_lahir'=> $this->input->post('tgl_lahir'),
            'agama'=> $this->input->post('agama'),
            'no_telp'=> $this->input->post('no_telp'),
            'email'=> $this->input->post('email')
        ];
        $this->Register_Model->add($request);
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah data pendaftar!</div>');
      return redirect('Akademik/pendaftaran');
    }

    public function update($id){
        $request = [
            'nisn'=> $this->input->post('nisn'),
            'nama'=> $this->input->post('nama'),
            'jk'=> $this->input->post('jk'),
            'tempat_lahir'=> $this->input->post('tempat'),
            'tanggal_lahir'=> $this->input->post('tgl_lahir'),
            'agama'=> $this->input->post('agama'),
            'no_telp'=> $this->input->post('no_telp'),
            'email'=> $this->input->post('email')
        ];
        $this->Register_Model->update($request,$id);
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah data pendaftar!</div>');
      return redirect('Akademik/pendaftaran');
    }

    public function delete($id){ 
      $this->Register_Model->delete($id);
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data pendaftar!</div>');
      return redirect('Akademik/pendaftaran');
    }

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

  public function master_siswa(){
    $data = [
      'title' => 'Data Siswa',
      'role' => 'Akademik',
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
        'kelurahan'=> $this->input->post('kelurahan'),
        'kecamatan'=> $this->input->post('kecamatan'),
        'kota_kab'=> $this->input->post('kota_kab'),
        'provinsi'=> $this->input->post('provinsi'),
        'kode_pos'=> $this->input->post('kode_pos'),
        'ayah'=> $this->input->post('ayah'),
        'pekerjaan_ayah'=> $this->input->post('pekerjaan_ayah'),
        'ibu'=> $this->input->post('ibu'),
        'pekerjaan_ibu'=> $this->input->post('pekerjaan_ibu'),
        'wali'=> $this->input->post('wali'),
        'pekerjaan_wali'=> $this->input->post('pekerjaan_wali'),
        'telp_ayah'=> $this->input->post('telp_ayah'),
        'telp_ibu'=> $this->input->post('telp_ibu'),
        'telp_wali'=> $this->input->post('telp_wali'),
        'telp_siswa'=> $this->input->post('telp_siswa'),
        'tanggal masuk'=> $this->input->post('tanggal masuk'),
        'status'=> $this->input->post('status'),
        'foto'=> $this->input->post('foto')
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
      'kelurahan'=> $this->input->post('kelurahan'),
      'kecamatan'=> $this->input->post('kecamatan'),
      'kota_kab'=> $this->input->post('kota_kab'),
      'provinsi'=> $this->input->post('provinsi'),
      'kode_pos'=> $this->input->post('kode_pos'),
      'ayah'=> $this->input->post('ayah'),
      'pekerjaan_ayah'=> $this->input->post('pekerjaan_ayah'),
      'ibu'=> $this->input->post('ibu'),
      'pekerjaan_ibu'=> $this->input->post('pekerjaan_ibu'),
      'wali'=> $this->input->post('wali'),
      'pekerjaan_wali'=> $this->input->post('pekerjaan_wali'),
      'telp_ayah'=> $this->input->post('telp_ayah'),
      'telp_ibu'=> $this->input->post('telp_ibu'),
      'telp_wali'=> $this->input->post('telp_wali'),
      'telp_siswa'=> $this->input->post('telp_siswa'),
      'tanggal masuk'=> $this->input->post('tanggal masuk'),
      'status'=> $this->input->post('status'),
      'foto'=> $this->input->post('foto')
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


}
