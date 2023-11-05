<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_page extends CI_Controller {

	public function index()
	{
		$data['title'] = 'AthleticXpress | Halaman Register';
		$this->load->view('frontend/layout/head', $data);
    	// $this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/register_page/registerpage');
		// $this->load->view('frontend/layout/footer');
	}
}