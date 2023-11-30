<?php

class Model_brands extends CI_Model {
    public function data_adidas() {
        return $this->db->get_where("tb_barang", array('brands' => 'Adidas'));
    }

    public function data_nike() {
        return $this->db->get_where("tb_barang", array('brands' => 'Nike'));
    }

    public function data_ortuseight() {
        return $this->db->get_where("tb_barang", array('brands' => 'Ortuseight'));
    }

    public function data_reebok() {
        return $this->db->get_where("tb_barang", array('brands' => 'Reebok'));
    }

    public function data_mizuno() {
        return $this->db->get_where("tb_barang", array('brands' => 'Mizuno'));
    }

    public function data_airjordan() {
        return $this->db->get_where("tb_barang", array('brands' => 'Air Jordan'));
    }
}