<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function index() {
        
        $data['judul'] = 'Laporan Penjualan';
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/laporan');
        $this->load->view('template_admin/footer');
    }

    public function harian() {
        
        $tanggal    = $this->input->post('tanggal');
        $bulan      = $this->input->post('bulan');
        $tahun      = $this->input->post('tahun');

        $data['judul']      = 'Laporan Penjualan Harian';
        $data['tanggal']    = $tanggal;
        $data['bulan']      = $bulan;
        $data['tahun']      = $tahun;
        $data['laporan']    = $this->model_laporan->lap_harian($tanggal, $bulan, $tahun);

        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/lap_harian');
        $this->load->view('template_admin/footer');
    }
}