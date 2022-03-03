<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('Mbarangkeluar');
        $this->load->model('Muser');
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Barang Keluar';
        // $data['barangkeluar'] = $this->Mbarangkeluar->tampil_barangkeluar();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/barangkeluar/databarangkeluar', $data);
        $this->load->view('footer');
    }
}
