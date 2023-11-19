<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model {

    public function insert_transaksi($data) {
        // Masukkan data ke dalam tabel 'tb_transaksi'
        $this->db->insert('tb_transaksi', $data);
        $id_transaksi = $this->db->insert_id();
    }

    public function simpan_rincian($data_rinci) {
        $this->db->insert('tb_rincian', $data_rinci);
    }

    public function belum_bayar() {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('status_bayar=0');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();

    }
}
