<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Stockbarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mbarang');
        $this->load->model('Muser');
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Stock Barang';
        $data['barang'] = $this->Mbarang->tampil_barang();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/stockbarang/databarang', $data);
        $this->load->view('footer');
    }
}
