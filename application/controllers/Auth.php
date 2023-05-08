<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
        $role = $this->session->userdata('role');
        if($role == NULL){
            return $this->load->view('login');
        }else{
            return redirect('Auth/dashboard_users/'.$role);
        }
	}
    
    public function login(){
        $request = [
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password')
        ];
        $validate = $this->Auth_Model->login($request['username']);
        if($validate){
            if($request['password'] === $validate['password']){
                $this->session->set_userdata([
                    'id' => $validate['id'],
                    'role' => $validate['role']
                ]);
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
                'role' => $role,
                'count_siswa' => $this->Master_Model->count('master_siswa'),
                'count_lk' => $this->Master_Model->countBy('master_siswa','jk','L'),
                'count_pr' => $this->Master_Model->countBy('master_siswa','jk','P')
            ];
        }else if($role == 2){
            $data = [
                'title' => 'Dashboard Guru',
                'content' => 'guru/dashboard',
                'role' => $role,
                'count_siswa' => $this->Master_Model->count('master_siswa'),
                'count_lk' => $this->Master_Model->countBy('master_siswa','jk','L'),
                'count_pr' => $this->Master_Model->countBy('master_siswa','jk','P')
            ];
        }else{
            $data = [
                'title' => 'Dashboard Ortu',
                'content' => 'ortu/dashboard',
                'role' => $role,
                'count_siswa' => $this->Master_Model->count('master_siswa'),
                'count_lk' => $this->Master_Model->countBy('master_siswa','jk','L'),
                'count_pr' => $this->Master_Model->countBy('master_siswa','jk','P')
            ];
        }
        $this->load->view('dashboard_template/main',$data);
    }

    public function user_profile($role){
        $data = [
            'title' => 'Profil User',
            'role' => $role,
            'content' => 'profil_user',
            'profile' => $this->Master_Model->getBy('users','id',$this->session->userdata('id'))
        ];
        // var_dump($data['profile']);die;
        $this->load->view('dashboard_template/main',$data);
    }

    public function update_profile($id,$role){
        $req=[
            'username' => $this->input->post('username'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'no_hp' => $this->input->post('no_hp')
        ];
        $this->Master_Model->update('id','users',$req,$id);
        $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah profil!</div>');
        return redirect('Auth/user_profile/'.$role);
    }

    public function logout(){
        $role = $this->session->userdata('role');
        if($role == NULL){
            return $this->load->view('login');
        }else{
            return redirect('Auth/dashboard_users/'.$role);
        }
    }

    public function validate($action){
        if($action === 'logout'){
            $this->session->unset_userdata('role');
        }
        return redirect('Auth/logout');
    }
}
