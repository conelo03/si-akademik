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
}
