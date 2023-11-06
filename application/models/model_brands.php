<?php

class Model_brands extends CI_Model {
    public function data_adidas() {
        return $this->db->get_where("tb_barang", array('brands' => 'adidas'));
    }

    public function data_nike() {
        return $this->db->get_where("tb_barang", array('brands' => 'nike'));
    }

    public function data_ortuseight() {
        return $this->db->get_where("tb_barang", array('brands' => 'ortuseight'));
    }

    public function data_reebok() {
        return $this->db->get_where("tb_barang", array('brands' => 'reebok'));
    }

    public function data_mizuno() {
        return $this->db->get_where("tb_barang", array('brands' => 'mizuno'));
    }

    public function data_airjordan() {
        return $this->db->get_where("tb_barang", array('brands' => 'airjordan'));
    }
}