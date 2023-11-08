<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Halaman_utama extends CI_Controller
{
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
	
	public function pembayaran()
	{
		$data['title'] = 'AthleticXpress | Pembayaran';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/pembayaran');
	}
	
	public function proses_pesanan()
{
    $is_processed = false;
    $message = "";
	$berhasil = "";

    $nama = $this->input->post('nama');
    $alamat = $this->input->post('alamat');
    $no_telp = $this->input->post('no_telp');
    $jasa_pengiriman = $this->input->post('jasa_pengiriman');
    $bank = $this->input->post('bank');

    if (!empty($nama) && !empty($alamat) && !empty($no_telp) && !empty($jasa_pengiriman) && !empty($bank)) {
        $is_processed = $this->model_invoice->index();
        if ($is_processed) {
            $berhasil = "Selamat, pesanan Anda telah berhasil diproses. Untuk info lebih lanjut silahkan hubungi penjual pada nomor yang tertera pada customer service.";
			$this->cart->destroy();
        } else {
            $message = "Maaf, terjadi kesalahan saat memproses pesanan.";
        }
    } else {
        $message = "Maaf, formulir belum lengkap. Silakan isi semua form dengan benar sebelum melanjutkan.";
    }

    $data['message'] = $message;
	$data['berhasil'] = $berhasil;
	$data['is_processed'] = $is_processed;
    $data['title'] = 'AthleticXpress | Proses pesanan';
    $this->load->view('frontend/layout/head', $data);
    $this->load->view('frontend/layout/navbar');
    $this->load->view('frontend/proses_pesanan', $data);
    $this->load->view('frontend/layout/footer');
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
}
