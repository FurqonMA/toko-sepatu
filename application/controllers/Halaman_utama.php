<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_utama extends CI_Controller
{
	private $api_key = '2daf305564e641cd5e6ed878aeb4649e';

	public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') !='2') {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Harap Login Terlebih Dahulu!
          </div>');
            redirect('Auth/login');
        }
    }

	public function tambah_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

		$data = array(
			'id'      => $barang->id_barang,
			'qty'     => 1,
			'price'   => $barang->harga,
			'name'    => $barang->nama_barang,
			'gambar'  => $barang->gambar,
		);

		$this->cart->insert($data);
		redirect('welcome');
	}

	public function detail_keranjang()
	{
		$data['title'] = 'AthleticXpress | Keranjang Anda';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/keranjang');
		$this->load->view('frontend/layout/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('welcome');
	}

	public function hapus_item_keranjang($rowid)
	{
		$data = [
			'rowid' => $rowid,
			'qty' => 0
		];

		$this->cart->update($data);
		redirect('halaman_utama/detail_keranjang');
	}
	

	public function search() {
		$keyword = $this->input->post('keyword');
		$data['title'] = 'AthleticXpress | Cari Produk';
		$data['barang'] = $this->model_barang->get_keyword($keyword);
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/halaman_utama/halaman_utama', $data);
		$this->load->view('frontend/layout/footer');
	}

	public function pembayaran()
	{
	
		$data['title'] = 'AthleticXpress | Pembayaran';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/pembayaran', $data);
		$this->load->view('frontend/layout/footer');
	}

	public function proses_pesanan() {
	$this->session->set_flashdata('pesan', 'Pesanan Berhasil Dibuat!');
	$data['title'] = 'AthleticXpress | Pesanan Saya';
    $this->load->view('frontend/layout/head', $data);
    $this->load->view('frontend/layout/navbar');
    $this->load->view('frontend/pesanan_saya');
    $this->load->view('frontend/layout/footer');
	}
}
