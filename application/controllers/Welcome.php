<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data = [
			'title' => 'Beranda',
			'content' => '/pengunjung/dashboard',
			'active' => true
		];
        $this->load->view('pengunjung/main',$data);
	}
	
	public function daftar(){
		$data = [
			'title' => 'Daftar',
			'content' => '/pengunjung/daftar',
			'active' => true
		];
        $this->load->view('pengunjung/main',$data);
	}

	public function daftar_siswa(){
		$config['upload_path']          = './assets/img/daftar';
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 3000;
		$config['max_width']            = 3000;
		$config['max_height']           = 3000;
		$this->load->library('upload', $config);
		if($this->upload->do_upload('kk') && $this->upload->do_upload('akta')){
			$request = [
				'nisn' => rand(100,500),
				'nama'=> $this->input->post('nama'),
				'jk'=> $this->input->post('jk'),
				'alamat'=> $this->input->post('alamat'),
				'agama'=> $this->input->post('agama'),
				'tempat_lahir'=> $this->input->post('tempat_lahir'),
				'tgl_lahir'=> $this->input->post('tgl_lahir'),
			  'jenis_tinggal'=> $this->input->post('jenis_tinggal'),
			  'alat_transportasi'=> $this->input->post('alat_transportasi'),
			  'tahun_ajaran'=> date("Y")." - ".date("Y")+1,
			  'kk'=> $this->upload->data('file_name'),
			  'akta'=> $this->upload->data('file_name')
			];
		  $this->Master_Model->add($request,'master_siswa');
		  $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mendaftar!</div>');
		}
		return redirect('Welcome/daftar');
	}

	public function kegiatan(){
		$data = [
			'title' => 'Kegiatan Siswa',
			'content' => '/pengunjung/kegiatan',
			'active' => true,
			'kegiatan' => $this->Master_Model->get('jadwal_kegiatan')
		];
        $this->load->view('pengunjung/main',$data);
	}

	public function profil(){
		$data = [
			'title' => 'Profil Kami',
			'content' => '/pengunjung/profil',
			'active' => true,
			'profil' => $this->Master_Model->get('profil_tk')
		];
        $this->load->view('pengunjung/main',$data);
	}
}
