<?php

class Barang extends CI_Controller {
    public function index()
	{
		$data['title'] = 'AthleticXpress';
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/halaman_utama/halaman_utama', $data);
		$this->load->view('frontend/layout/footer');
	}
}