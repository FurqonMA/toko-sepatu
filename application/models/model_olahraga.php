<?php

class Model_olahraga extends CI_Model {
    public function data_sepakbola() {
        return $this->db->get_where("tb_barang", array('olahraga' => 'sepak bola'));
    }

    public function data_futsal() {
        return $this->db->get_where("tb_barang", array('olahraga' => 'futsal'));
    }

    public function data_basket() {
        return $this->db->get_where("tb_barang", array('olahraga' => 'basket'));
    }

    public function data_lari() {
        return $this->db->get_where("tb_barang", array('olahraga' => 'lari'));
    }

    public function data_futbal() {
        $this->db->where_in('olahraga', array('sepak bola', 'futsal'));
        return $this->db->get("tb_barang");
    }
    
}