<?php

class Olahraga extends CI_Controller {
    // KATEGORI BERDASARKAN OLAHRAGA
    public function sepak_bola() {
        $data['sepak_bola'] = $this->model_olahraga->data_sepakbola()->result();
        $data['title'] = 'AthleticXpress | Sepak Bola';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/olahraga/sepak_bola', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function futsal() {
        $data['futsal'] = $this->model_olahraga->data_futsal()->result();
        $data['title'] = 'AthleticXpress | Futsal';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/olahraga/futsal', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function basket() {
        $data['basket'] = $this->model_olahraga->data_basket()->result();
        $data['title'] = 'AthleticXpress | Basket';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/olahraga/basket', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function lari() {
        $data['lari'] = $this->model_olahraga->data_lari()->result();
        $data['title'] = 'AthleticXpress | Lari';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/olahraga/lari', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function futbal() {
        $data['futbal'] = $this->model_olahraga->data_futbal()->result();
        $data['title'] = 'AthleticXpress | Sepak Bola dan Futsal';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/olahraga/futbal', $data);
		$this->load->view('frontend/layout/footer');
    }
}