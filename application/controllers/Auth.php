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
            if($request['password'] === $validate['password']){
                redirect('Auth/dashboard_users/'.$validate['role']);
            }else{
                echo 'Password salah!';
            }
        }else{
            echo 'user tidak terdaftar';
        }
    }

    public function dashboard_users($role){
        if($role == 1){
            $data = [
                'title' => 'Dashboard Admin',
                'content' => 'akademik/dashboard',
                'role' => 'Admin',
                'count_guru' => $this->Master_Model->count('master_guru')
            ];
        }else if($role == 2){
            $data = [
                'title' => 'Dashboard Guru',
                'content' => 'guru/dashboard',
                'role' => 'Guru',
                'count_siswa' => $this->Master_Model->count('master_siswa')
            ];
        }else{
            $data = [
                'title' => 'Dashboard Ortu',
                'content' => 'ortu/dashboard',
                'role' => 'Ortu',
                // 'count_guru' => $this->Master_Model->count('master_guru')
            ];
        }
        $this->load->view('dashboard_template/main',$data);
    }

    public function logout(){
        $this->session->sess_destroy();
        return $this->load->view('login');
    }
}
