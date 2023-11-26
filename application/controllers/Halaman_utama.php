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
		$this->load->model('model_transaksi');
		$this->load->model('model_pesanan_masuk');
		$this->load_cart_items();
    }

	public function tambah_keranjang($id)
{
    if (!$this->session->userdata('id_user')) {
        redirect('auth/login');
    } else {
        $barang = $this->model_barang->find($id);
        $id_user = $this->session->userdata('id_user');
        $rowid = md5($id);

        $data = array(
            'id_user' => $id_user,
            'id'      => $barang->id_barang,
            'qty'     => 1,
            'price'   => $barang->harga,
            'name'    => $barang->nama_barang,
            'gambar'  => $barang->gambar,
            'rowid'   => $rowid,
        );
		$this->model_transaksi->insert_keranjang($data);
        $this->cart->insert($data);

        redirect('welcome');
    }
}

	private function load_cart_items()
{
    $id_user = $this->session->userdata('id_user');

    // Hapus semua item keranjang yang sudah ada
    $this->cart->destroy();

    if ($id_user) {
        $cart_items = $this->model_transaksi->load_cart_items($id_user);

        foreach ($cart_items as $item) {
            $rowid = md5($item->id);  // Ubah ini sesuai dengan kebutuhan Anda

            $data = array(
                'id_user' => $item->id_user,
                'id'      => $item->id,
                'qty'     => $item->qty,
                'price'   => $item->price,
                'name'    => $item->name,
                'gambar'  => $item->gambar,
                'rowid'   => $rowid, // Atur nilai rowid sesuai dengan kebutuhan Anda
            );
            $this->cart->insert($data);
        }
    }
}


// Tambahkan ini pada controller (halaman_utama.php)
public function get_cart_count()
{
    $cart_count = $this->cart->total_items();

    // Anda juga dapat menyimpan hitungan keranjang dalam sesi jika diperlukan
    $this->session->set_userdata('cart_count', $cart_count);

    // Kembalikan hitungan keranjang sebagai JSON
    echo json_encode(['cart_count' => $cart_count]);
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
    // Hapus semua item keranjang dari database
    $this->model_transaksi->hapus_keranjang($this->session->userdata('id_user'));

    // Hapus semua item dari objek keranjang
    $this->cart->destroy();
    
    redirect('welcome');
}

public function hapus_item_keranjang($rowid)
{
    $this->model_transaksi->hapus_item_keranjang($rowid);
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
        $data['belum_bayar'] = $this->model_transaksi->belum_bayar();
        $data['diproses'] = $this->model_transaksi->diproses();
        $data['dikirim'] = $this->model_transaksi->dikirim();
        $data['selesai'] = $this->model_transaksi->selesai();
        $this->load->view('frontend/layout/head', $data);
        $this->load->view('frontend/layout/navbar');
        $this->load->view('frontend/pesanan_saya', $data);
        $this->load->view('frontend/layout/footer');
        }

        public function bayar($id_transaksi) {

            $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required');
        
            if ($this->form_validation->run() == FALSE) {
                // Validasi gagal, tampilkan halaman dengan pesan error
                $data['title'] = 'AthleticXpress | Pembayaran';
                $data['pesanan'] = $this->model_transaksi->detail_pesanan($id_transaksi);
                $data['rekening'] = $this->model_transaksi->rekening();
                $this->load->view('frontend/layout/head', $data);
                $this->load->view('frontend/layout/navbar');
                $this->load->view('frontend/bayar', $data);
                $this->load->view('frontend/layout/footer');
            } else {
                // Validasi berhasil, lanjutkan dengan proses upload
                $config['upload_path'] = './assets/bukti_bayar/';
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size'] = '2048';
                $this->load->library('upload', $config);
        
                if (!$this->upload->do_upload('bukti_bayar')) {
                    // Upload gagal, tampilkan halaman dengan pesan error
                    $data['title'] = 'AthleticXpress | Pembayaran';
                    $data['pesanan'] = $this->model_transaksi->detail_pesanan($id_transaksi);
                    $data['rekening'] = $this->model_transaksi->rekening();
                    $data['upload_error'] = $this->upload->display_errors();
                    $this->load->view('frontend/layout/head', $data);
                    $this->load->view('frontend/layout/navbar');
                    $this->load->view('frontend/bayar', $data);
                    $this->load->view('frontend/layout/footer');
                } else {
                    // Upload berhasil, lanjutkan dengan pemrosesan data
                    $upload_data = $this->upload->data();
                    $data_transaksi = array(
                        'id_transaksi' => $id_transaksi,
                        'atas_nama'    => $this->input->post('atas_nama'),
                        'nama_bank'    => $this->input->post('nama_bank'),
                        'no_rek'       => $this->input->post('no_rek'),
                        'status_bayar' => '1',
                        'bukti_bayar'  => $upload_data['file_name'],
                    );
        
                    // Update data transaksi dengan bukti pembayaran
                    $this->model_transaksi->upload_bukti($id_transaksi, $data_transaksi);
                    $this->session->set_flashdata('pesan', 'Bukti Berhasil Di Upload!');
                    redirect('halaman_utama/proses_pesanan');
                }
                
            }
            // $data['title'] = 'AthleticXpress | Pembayaran';
            //     $data['pesanan'] = $this->model_transaksi->detail_pesanan($id_transaksi);
            //     $data['rekening'] = $this->model_transaksi->rekening();
            //     $this->load->view('frontend/layout/head', $data);
            //     $this->load->view('frontend/layout/navbar');
            //     $this->load->view('frontend/bayar', $data);
            //     $this->load->view('frontend/layout/footer');
        }

        public function diterima($id_transaksi) {
            $data = array(
                'id_transaksi' => $id_transaksi,
                'status_order' => '3',
            );
            $this->model_pesanan_masuk->update_order($data);
            $this->session->set_flashdata('pesan','Pesanan Telah Diterima!');
            redirect('halaman_utama/proses_pesanan');
        }
        
}
