<?php

class Dashboard_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role_id') !='1') {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Harap Login Terlebih Dahulu!
          </div>');
            redirect('Auth/login');
        }
    }
    public function index() {
        $data['dataAllBarang'] 	= $this->db->count_all_results('tb_barang');
        $data['datafutsal'] = $this->db->where('olahraga', 'futsal')->count_all_results('tb_barang');
        $data['databola'] = $this->db->where('olahraga', 'sepak bola')->count_all_results('tb_barang');
        $data['databasket'] = $this->db->where('olahraga', 'basket')->count_all_results('tb_barang');
        $data['datalari'] = $this->db->where('olahraga', 'lari')->count_all_results('tb_barang');
        $data['judul'] = 'Dashboard Admin';
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }

    public function setting() {

        $this->form_validation->set_rules('nama_toko','Nama Toko','required', array(
            'required' => '%s wajib di isi!'
        ));
        $this->form_validation->set_rules('kota','Kota','required', array(
            'required' => '%s wajib di isi!'
        ));
        $this->form_validation->set_rules('alamat_toko','Alamat Toko','required', array(
            'required' => '%s wajib di isi!'
        ));
        $this->form_validation->set_rules('no_telpon','No Telepon','required', array(
            'required' => '%s wajib di isi!'
        ));

        if($this->form_validation->run() == false) {
            $data['judul'] = 'Setting';
            $data['setting'] = $this->model_setting->data_setting();
            $this->load->view('template_admin/header', $data);
            $this->load->view('template_admin/sidebar');
            $this->load->view('admin/setting', $data);
            $this->load->view('template_admin/footer');
        }else {
            $data = array(
                'id' => 1,
                'lokasi' => $this->input->post('kota'),
                'nama_toko' => $this->input->post('nama_toko'),
                'alamat_toko' => $this->input->post('alamat_toko'),
                'no_telpon' => $this->input->post('no_telpon'),
            );
            $this->model_setting->edit($data);
            $this->session->set_flashdata('pesan', 'Settingan Berhasil Di ganti!');
            redirect('admin/dashboard_admin/setting');
        }
    }

    public function pesanan_masuk() {
        $data['judul'] = 'Pesanan Masuk';
        $data['pesanan'] = $this->model_pesanan_masuk->pesanan();
        $data['pesanan_diproses'] = $this->model_pesanan_masuk->pesanan_diproses();        
        $data['pesanan_dikirim'] = $this->model_pesanan_masuk->pesanan_dikirim();        
        $data['pesanan_selesai'] = $this->model_pesanan_masuk->pesanan_selesai();        
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/pesanan_masuk', $data);
        $this->load->view('template_admin/footer');
    }

    public function proses($id_transaksi) {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'status_order' => '1',
        );
        $this->model_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Diproses/Dikemas!');
        redirect('admin/dashboard_admin/pesanan_masuk');
    }

    public function kirim($id_transaksi) {
        $data = array(
            'id_transaksi' => $id_transaksi,
            'no_resi' => $this->input->post('no_resi'),
            'status_order' => '2',
        );
        $this->model_pesanan_masuk->update_order($data);
        $this->session->set_flashdata('pesan','Pesanan Berhasil Dikirim!');
        redirect('admin/dashboard_admin/pesanan_masuk');
    }
}