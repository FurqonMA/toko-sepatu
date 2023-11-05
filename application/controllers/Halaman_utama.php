<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_utama extends CI_Controller
{

	public function index()
	{
		$data['title'] = 'AthleticXpress';
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/halaman_utama/halaman_utama', $data);
		$this->load->view('frontend/layout/footer');
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
		redirect('halaman_utama');
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
		redirect('halaman_utama/detail_keranjang');
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

	public function pembayaran()
	{
		$data['title'] = 'AthleticXpress | Pembayaran';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/pembayaran');
	}

	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if ($is_processed) {
			$this->cart->destroy();
			$data['title'] = 'AthleticXpress | Proses pesanan';
			$this->load->view('frontend/layout/head', $data);
			$this->load->view('frontend/layout/navbar');
			$this->load->view('frontend/proses_pesanan');
			$this->load->view('frontend/layout/footer');
		} else {
			echo "Maaf Pesanan Anda gagal di proses";
		}
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
