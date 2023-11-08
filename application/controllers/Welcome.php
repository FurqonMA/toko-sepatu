<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	
	 public function index()
	 {
		 $data['title'] = 'AthleticXpress';
		 $data['barang'] = $this->model_barang->tampil_data()->result();
		 $this->load->view('frontend/layout/head', $data);
		 $this->load->view('frontend/layout/navbar');
		 $this->load->view('frontend/halaman_utama/halaman_utama', $data);
		 $this->load->view('frontend/layout/footer');
	 }
	 
	 public function detail($id_barang)
	 {
		 $data['barang'] = $this->model_barang->detail_barang($id_barang);
		 $data['title'] = 'AthleticXpress | Detail Produk';
		 $this->load->view('frontend/layout/head', $data);
		 $this->load->view('frontend/layout/navbar');
		 $this->load->view('frontend/detail_barang', $data);
		 $this->load->view('frontend/layout/footer');
	 } 
}
