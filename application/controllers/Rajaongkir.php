<?php

class Rajaongkir extends CI_Controller {

    private $api_key = '2daf305564e641cd5e6ed878aeb4649e';

    public function provinsi() {
        
        $curl = curl_init();
    
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // Kembalikan respons sebagai JSON
            header('Content-Type: application/json');

            echo $response;
        }
    }

    public function kota() {
        $id_provinsi_terpilih = $this->input->post('id_provinsi');
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=". $id_provinsi_terpilih,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "key: $this->api_key"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // Kembalikan respons sebagai JSON
            header('Content-Type: application/json');
            echo $response;
        }
    }

    public function ongkir() {
        $origin = $this->input->post('kota'); // Sesuaikan dengan nama input dari form
    $destination = $this->input->post('kota_penerima'); // Sesuaikan dengan nama input dari form
    $weight = $this->input->post('berat'); // Sesuaikan dengan nama input dari form
    $courier = $this->input->post('ekspedisi'); // Sesuaikan dengan nama input dari form

    // Lakukan permintaan ke RajaOngkir untuk mendapatkan ongkir
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin={$origin}&destination={$destination}&weight={$weight}&courier={$courier}",
        CURLOPT_HTTPHEADER => array(
            "content-type: application/x-www-form-urlencoded",
            "key: 2daf305564e641cd5e6ed878aeb4649e" // Ganti dengan API key RajaOngkir Anda
        ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        // Kembalikan respons sebagai JSON
        header('Content-Type: application/json');
        echo $response;
    }
    }

}