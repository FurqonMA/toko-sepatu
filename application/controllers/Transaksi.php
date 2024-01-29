<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_transaksi');
    }

    public function tambah_data() {
        if (!$this->session->userdata('username')) {
            redirect('auth/login');
        }else {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_penerima','Nama Penerima','required', array(
            'required' => 'Nama Penerima wajib di isi!'
        ));
        $this->form_validation->set_rules('provinsi_penerima','Provinsi Penerima','required', array(
            'required' => 'Provinsi wajib di isi!'
        ));
        $this->form_validation->set_rules('kota_penerima','Kota Penerima','required', array(
            'required' => 'Kabupaten/Kota wajib di isi!'
        ));
        $this->form_validation->set_rules('alamat','Alamat','required', array(
            'required' => 'Alamat wajib di isi!'
        ));
        $this->form_validation->set_rules('kode_pos','Kode Pos','required', array(
            'required' => 'Kode Pos wajib di isi!'
        ));
        $this->form_validation->set_rules('no_telp','No Telp','required', array(
            'required' => 'Nomor Telepon wajib di isi!'
        ));
        $this->form_validation->set_rules('ekspedisi','Ekspedisi','required', array(
            'required' => 'Ekspedisi wajib di isi!'
        ));
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = 'AthleticXpress | Pembayaran';
            $this->load->view('frontend/layout/head', $data);
            $this->load->view('frontend/layout/navbar');
            $this->load->view('frontend/pembayaran', $data);
            $this->load->view('frontend/layout/footer');
        } else{
        $id_user = $this->session->userdata('id_user');
        $tgl_order = date('Y-m-d');
        $angka_random = mt_rand(1000, 9999);
        $no_order = "ORD{$tgl_order}{$angka_random}{$id_user}";
        // Dapatkan data dari formulir
        $data = array(
            'id_user' => $id_user,
            'no_order' => $no_order,
            'tgl_order' => $tgl_order,
            'nama_penerima' => $this->input->post('nama_penerima'),
            'provinsi_penerima' => $this->input->post('provinsi_penerima'),
            'kota_penerima' => $this->input->post('kota_penerima'),
            'alamat' => $this->input->post('alamat'),
            'kode_pos' => $this->input->post('kode_pos'),
            'no_telp' => $this->input->post('no_telp'),
            'ekspedisi' => $this->input->post('ekspedisi'),
            // 'berat' => $this->input->post('berat'),
            // 'jumlah_ongkir' => $this->input->post('jumlah_ongkir'),
            // 'subtotal' => $this->input->post('subtotal'),
            'total_pesanan' => $this->cart->total(),
            'status_bayar' => '0',
            'status_order' => '0',
        );

        // Masukkan data ke dalam database
        $this->model_transaksi->insert_transaksi($data);
        // masukkan data ke tb_rincian
        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $barang_info = $this->model_transaksi->get_barang_info($item['id']);
            $data_rinci = array (
                'no_order' => $no_order,
                'id_barang' => $item['id'],
                'nama_barang' => $item['name'],
                'keterangan' => $barang_info->keterangan,
                'qty' => $item['qty'],
            );
            $this->model_transaksi->simpan_rincian($data_rinci);
        }
        // $this->session->set_flashdata('pesan', 'Pesanan berhasil dibuat!');
         // Hapus semua item keranjang dari database
    $this->model_transaksi->hapus_keranjang($this->session->userdata('id_user'));

    // Hapus semua item dari objek keranjang
    $this->cart->destroy();
        redirect('halaman_utama/proses_pesanan');
        }
    }
        }
        
}
