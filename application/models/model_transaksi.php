<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_transaksi extends CI_Model {
    public function insert_keranjang($data)
    {
        $this->db->insert('tb_keranjang', $data);
    }

    public function load_cart_items($id_user)
    {
        return $this->db->where('id_user', $id_user)->get('tb_keranjang')->result();
    }

    public function hapus_keranjang($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('tb_keranjang');
    }

    public function hapus_item_keranjang_by_barang($id_barang) {
    $this->db->where('id', $id_barang);
    $this->db->delete('tb_keranjang');
}


    

    public function update_keranjang_qty($id_user, $id_barang, $qty)
    {
        $data = array('qty' => $qty);
        $this->db->where('id_user', $id_user);
        $this->db->where('id', $id_barang);
        $this->db->update('tb_keranjang', $data);
    }

    public function load_cart_item($id_user, $id_barang)
    {
        return $this->db->where('id_user', $id_user)
                        ->where('id', $id_barang)
                        ->get('tb_keranjang')
                        ->row();
    }

    public function hapus_item_keranjang($id_user, $id_barang)
{
    $this->db->where('id_user', $id_user);
    $this->db->where('id', $id_barang);
    $this->db->delete('tb_keranjang');
}









    public function insert_transaksi($data) {
        // Masukkan data ke dalam tabel 'tb_transaksi'
        $this->db->insert('tb_transaksi', $data);
        $id_transaksi = $this->db->insert_id();
    }

    public function get_barang_info($id_barang) {
        $this->db->select('*');
        $this->db->from('tb_barang');
        $this->db->where('id_barang', $id_barang);
        $query = $this->db->get();
        return $query->row(); // Mengembalikan satu baris hasil query
    }
    public function get_rincian_info($no_order) {
        $this->db->select('*');
        $this->db->from('tb_rincian');
        $this->db->where('no_order', $no_order);
        $query = $this->db->get();
        return $query->result(); // Mengembalikan hasil query dalam bentuk array
    }

    public function simpan_rincian($data_rinci) {
        $this->db->insert('tb_rincian', $data_rinci);
    }

    public function belum_bayar() {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=0');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();

    }
    public function diproses() {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=1');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }
    public function dikirim() {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=2');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function selesai() {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_user', $this->session->userdata('id_user'));
        $this->db->where('status_order=3');
        $this->db->order_by('id_transaksi', 'desc');
        return $this->db->get()->result();
    }

    public function detail_pesanan($id_transaksi) {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        return $this->db->get()->row();
    }

    public function rekening() {
        $this->db->select('*');
        $this->db->from('tb_rekening');
        return $this->db->get()->result();
    }

    public function upload_bukti($id_transaksi, $data) {
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->update('tb_transaksi', $data);
    }
    
}
