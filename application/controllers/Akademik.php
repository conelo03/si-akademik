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
          'nip'=> $this->input->post('nip'),
          'nama'=> $this->input->post('nama'),
          'jk'=> $this->input->post('jk'),
          'tempat_lahir'=> $this->input->post('tempat'),
          'tgl_lahir'=> $this->input->post('tgl_lahir'),
          'alamat'=> $this->input->post('alamat'),
          'gelar'=> $this->input->post('gelar'),
          'pendidikan_terakhir'=> $this->input->post('pendidikan'),
          'telp'=> $this->input->post('telp'),
          'email'=> $this->input->post('email')
      ];
      $this->Master_Model->add($request,'master_guru');
      $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menambah data guru!</div>');
    return redirect('Akademik/master_guru');
  }

  public function updateGuru($id){
    $request = [
      'nip'=> $this->input->post('nip'),
      'nama'=> $this->input->post('nama'),
      'jk'=> $this->input->post('jk'),
      'tempat_lahir'=> $this->input->post('tempat'),
      'tgl_lahir'=> $this->input->post('tgl_lahir'),
      'alamat'=> $this->input->post('alamat'),
      'gelar'=> $this->input->post('gelar'),
      'pendidikan_terakhir'=> $this->input->post('pendidikan'),
      'telp'=> $this->input->post('telp'),
      'email'=> $this->input->post('email')
    ];
    $this->Master_Model->update(['nip'=>$id],'master_guru',$request,$id);
    $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah data guru!</div>');
  return redirect('Akademik/master_guru');
}

public function deleteGuru($id){ 
  $this->Master_Model->delete('nip','master_guru',$id);
  $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil menghapus data guru!</div>');
  return redirect('Akademik/master_guru');
}


}
