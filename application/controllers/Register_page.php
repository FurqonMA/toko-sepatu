<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_page extends CI_Controller {
			
	public function index()
	{
		$this->form_validation->set_rules('nama','Nama','required', array (
			'requierd' => 'Nama wajib diisi!'
		));
		$this->form_validation->set_rules('username','Username','required', array(
			'required' => 'Username wajib diisi!'
		));
		$this->form_validation->set_rules('password_1','Password','required|matches[password_2]', array(
			'required' => 'Password wajib diisi!',
			'matches' => 'Password tidak cocok'
		));
		$this->form_validation->set_rules('password_2','Password','required|matches[password_1]', array(
			'required' => 'Password wajib diisi!',
			'matches' => 'Password tidak cocok'
		));


		if($this->form_validation->run() == false) {
			$data['title'] = 'AthleticXpress | Halaman Register';
			$this->load->view('frontend/layout/head', $data);
			// $this->load->view('frontend/layout/navbar');
			$this->load->view('frontend/register_page/registerpage');
			// $this->load->view('frontend/layout/footer');
		}else {
			$data = array (
				'id'		=> '',
				'nama'		=> $this->input->post('nama'),
				'username'	=> $this->input->post('username'),
				'password'	=> $this->input->post('password_1'),
				'role_id'	=> 2,
			);
			$this->session->set_flashdata('daftar','<div class="alert alert-success" role="alert">
                Anda berhasil daftar, silahkan Login.
              </div>');
			$this->db->insert('tb_user', $data);
			redirect('Auth/login');
		}
	}
}