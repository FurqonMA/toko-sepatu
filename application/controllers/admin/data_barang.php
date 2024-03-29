<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_barang extends CI_Controller {
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
        $data['judul'] = 'Data Barang';
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_barang', $data);
        $this->load->view('template_admin/footer');
    }

    public function tambah_aksi() {
        $nama_barang            = $this->input->post('nama_barang');
        $keterangan             = $this->input->post('keterangan');
        $olahraga               = $this->input->post('olahraga');
        $brands                 = $this->input->post('brands');
        $harga                  = $this->input->post('harga');
        $stok                   = $this->input->post('stok');
        $gambar                 = $_FILES['gambar']['name'];
        if ($gambar == ''){
            
        }else {
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')){
                echo "Gambar gagal diupload!";
            }else {
                $gambar = $this->upload->data('file_name');
            }

        }

        $data = array(
            'nama_barang'       => $nama_barang,
            'keterangan'        => $keterangan,
            'olahraga'          => $olahraga,
            'brands'            => $brands,
            'harga'             => $harga,
            'stok'              => $stok,
            'gambar'            => $gambar

        );

        $this->model_barang->tambah_barang($data, 'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function edit($id) {
        $where = array('id_barang' =>$id);
        $data['barang'] = $this->model_barang->edit_barang($where, 'tb_barang')->result();
        $data['judul'] = '  Edit Data Barang';
        $this->load->view('template_admin/header', $data);
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/edit_barang', $data);
        $this->load->view('template_admin/footer');
    }

    public function update() {
        $id                     = $this->input->post('id_barang');
        $nama_barang             = $this->input->post('nama_barang');
        $keterangan              = $this->input->post('keterangan');
        $olahraga                = $this->input->post('olahraga');
        $brands                  = $this->input->post('brands');
        $harga                   = $this->input->post('harga');
        $stok                    = $this->input->post('stok');

        $data = array(
            'nama_barang'       => $nama_barang,
            'keterangan'        => $keterangan,
            'olahraga'          => $olahraga,
            'brands'            => $brands,
            'harga'             => $harga,
            'stok'              => $stok

        );

        $where = array(
            'id_barang' => $id
        );

        $this->model_barang->update_data($where,$data,'tb_barang');
        redirect('admin/data_barang/index');
    }

    public function hapus($id) {
    $where = array('id_barang'=> $id);
    // Hapus terlebih dahulu record terkait dari tb_keranjang
    $this->model_transaksi->hapus_item_keranjang_by_barang($id);


    // Kemudian, hapus record dari tb_barang
    $this->model_barang->hapus_data($where, 'tb_barang');
        
        redirect('admin/data_barang/index');
    }

    public function hapus_semua_data() {
        $this->model_barang->hapus_semua_data();
        redirect('admin/data_barang/index');
    }
}