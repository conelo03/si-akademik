<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authorization extends CI_Controller {

	public function index()
	{
		$this->load->view('absensi/login');
	}	

    public function login(){
        if($this->input->post('nid') == '051299'){
            $data = $this->db->get_where('absensi', [
                'jam_masuk'=> null,'no_identitas'=> '051299'
                ])->row_array();
            var_dump($data);die;
            $this->load->view('absensi/absen',$data);
        }else{
            echo 'Nomor Identitas Anda Belum Terdaftar!';
        }
    }
}
