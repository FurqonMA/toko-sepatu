<?php

class Brands extends CI_Controller {
    // KATEGORI BERDASARKAN BRANDS
    public function adidas() {
        $data['adidas'] = $this->model_brands->data_adidas()->result();
        $data['title'] = 'AthleticXpress | Adidas';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/adidas', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function nike() {
        $data['nike'] = $this->model_brands->data_nike()->result();
        $data['title'] = 'AthleticXpress | Nike';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/nike', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function ortuseight() {
        $data['ortuseight'] = $this->model_brands->data_ortuseight()->result();
        $data['title'] = 'AthleticXpress | Ortuseight';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/ortuseight', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function reebok() {
        $data['reebok'] = $this->model_brands->data_reebok()->result();
        $data['title'] = 'AthleticXpress | Reebok';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/reebok', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function mizuno() {
        $data['mizuno'] = $this->model_brands->data_mizuno()->result();
        $data['title'] = 'AthleticXpress | Mizuno';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/mizuno', $data);
		$this->load->view('frontend/layout/footer');
    }

    public function airjordan() {
        $data['airjordan'] = $this->model_brands->data_airjordan()->result();
        $data['title'] = 'AthleticXpress | airjordan';
		$this->load->view('frontend/layout/head', $data);
		$this->load->view('frontend/layout/navbar');
		$this->load->view('frontend/brands/airjordan', $data);
		$this->load->view('frontend/layout/footer');
    }
}