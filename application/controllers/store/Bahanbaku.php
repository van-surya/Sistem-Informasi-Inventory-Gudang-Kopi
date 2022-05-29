<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Bahanbaku extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mbarang');
        $this->load->model('Muser');
        if (!$this->session->userdata("store")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Bahan Baku';
        $data['barang'] = $this->Mbarang->tampil_barang();
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/bahanbaku/databahanbaku', $data);
        $this->load->view('footer');
    }
 
}
