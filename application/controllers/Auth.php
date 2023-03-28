<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
	}
    
    public function login(){
        $request = [
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        ];
        $validate = $this->Auth_Model->login($request['username']);
        if($validate){
            if($validate['role'] == 1){
                redirect('Auth/dashboard_users');
            }else if($validate['role'] == 2){
                echo 'Selamat Datang Guru';
            }else{
                echo 'Selamat Datang Siswa';
            }
        }else{
            echo 'user tidak terdaftar';
        }
    }

    public function dashboard_users(){
        $data = [
            'title' => 'Dashboard Akademik',
            'content' => 'akademik/dashboard',
            'role' => 'Akademik'
        ];
        $this->load->view('dashboard_template/main',$data);
    }
}
