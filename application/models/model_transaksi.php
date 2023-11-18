<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model {

    public function insert_transaksi($data) {
        // Masukkan data ke dalam tabel 'tb_transaksi'
        $this->db->insert('tb_transaksi', $data);
    }
}
