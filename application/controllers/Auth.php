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

    public function daftar(){
        return $this->load->view('daftar');
    }

    public function do_daftar(){
        $req=[
            'id_daftar_siswa' => $this->input->post('id_daftar'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'nama_depan' => $this->input->post('nama_depan'),
            'nama_belakang' => $this->input->post('nama_belakang'),
            'no_hp' => $this->input->post('no_hp'),
            'role' => 3
        ];
        $validate = $this->db->get_where('master_siswa',['nisn'=> $req['id_daftar_siswa']])->row_array();
        if($validate !== NULL){
            $count_id_daftar = $this->db->get_where('users',['id_daftar_siswa'=> $req['id_daftar_siswa']])->num_rows();
            if($count_id_daftar == 1){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Akun dengan ID Pendaftaran '.$req['id_daftar_siswa'].' sudah terdaftar!</div>');
            }else{
                $this->Master_Model->add($req,'users');
                $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil daftar! Silahkan login terlebih dahulu</div>');
            }
        }else{
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal daftar! ID Pendaftaran tidak ditemukan</div>');
        }
        return redirect('Auth');
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
                    'role' => $validate['role'],
                    'foto' => $validate['foto'],
                    'id_daftar' => $validate['id_daftar_siswa']
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
        $this->load->view('dashboard_template/main',$data);
    }

    public function update_profile($id,$role){
        $config['upload_path']          = './assets/img/profil';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 3000;
        $config['max_width']            = 2000;
        $config['max_height']           = 2000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('foto')){
          $req=[
              'username' => $this->input->post('username'),
              'nama_depan' => $this->input->post('nama_depan'),
              'nama_belakang' => $this->input->post('nama_belakang'),
              'no_hp' => $this->input->post('no_hp'),
              'foto' => $this->upload->data('file_name')
          ];
          $this->Master_Model->update('id','users',$req,$id);
          $this->session->set_flashdata('message','<div class="alert alert-info" role="alert">Berhasil mengubah profil!</div>');
        }
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
