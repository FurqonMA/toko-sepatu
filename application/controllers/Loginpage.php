<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loginpage extends CI_Controller {

	public function index()
	{
		$data['title'] = 'AthleticXpress | Halaman Login';
		$this->load->view('frontend/layout/head', $data);
    	// $this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/loginpage/loginpage');
		// $this->load->view('frontend/layout/footer');
	}
}