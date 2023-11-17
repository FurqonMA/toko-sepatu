<?php

class Model_setting extends CI_Model {

    public function data_setting() {
        $this->db->select('*');
        $this->db->from('tb_setting');
        $this->db->where('id', 1);
        return $this->db->get()->row();
    }

    public function edit($data) {
        $this->db->where('id', $data['id']);
        $this->db->update('tb_setting', $data);
    }
}