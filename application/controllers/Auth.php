<?php

class Auth extends CI_Controller {
    public function login() {
        $this->form_validation->set_rules('username','Username','required', array(
            'required' => 'Username wajib di isi!'
        ));
        $this->form_validation->set_rules('password','Password','required', array(
            'required' => 'Password wajib di isi!'
        ));

        if($this->form_validation->run() == false) {
            $data['title'] = 'Halaman Login';
            $this->load->view('frontend/layout/head', $data);
            $this->load->view('frontend/loginpage/loginpage');
        }else {
            $auth = $this->model_auth->cek_login();
            if($auth == false) {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                Username atau Password Anda salah!
              </div>');
              redirect('auth/login');
            }else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                switch($auth->role_id){
                    case 1 : redirect('admin/dashboard_admin');
                        break;
                    case 2 : redirect('halaman_utama');
                        break;
                    default: break;
                }
            }
        }
    }

    public function logout() {
        $this->session->set_userdata('username', FALSE);
        $this->session->sess_destroy();
        redirect('Auth/login');
    }
}