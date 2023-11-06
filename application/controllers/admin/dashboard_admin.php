<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_admin extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        if (!$this->model_auth->is_logged_in()) {
            $this->session->set_flashdata('error', '<div class="alert alert-danger" role="alert">
            Harap Login Terlebih Dahulu!
          </div>');
            redirect('Auth/login');
        }
    }
    public function index() {
        $role_id = $this->session->userdata('role_id');
    
        if ($role_id != 1) {
            // Jika role ID bukan 1 (admin), arahkan ke halaman lain
            redirect('halaman_utama'); // Atau arahkan ke halaman lain yang sesuai
        }
        $data['dataAllBarang'] 	= $this->db->count_all_results('tb_barang');
        $data['datafutsal'] = $this->db->where('olahraga', 'futsal')->count_all_results('tb_barang');
        $data['databola'] = $this->db->where('olahraga', 'sepak bola')->count_all_results('tb_barang');
        $data['databasket'] = $this->db->where('olahraga', 'basket')->count_all_results('tb_barang');
        $data['datalari'] = $this->db->where('olahraga', 'lari')->count_all_results('tb_barang');
        $data['dataAllInvoice'] 	= $this->db->count_all_results('tb_invoice');
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/dashboard', $data);
        $this->load->view('template_admin/footer');
    }
}