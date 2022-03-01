<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permintaanpembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mpermintaanpembelian');
        $this->load->model('Muser');
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Permintaan Pembelian';
        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->tampil_permintaanpembelian();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/dataperpem', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_permintaanpembelian', 'Kode Permintaan Pembelian', 'required');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpermintaanpembelian jalankan fungsi simpan_permintaanpembelian($inputan)
            $this->Mpermintaanpembelian->simpan_permintaanpembelian($inputan);
            //tampilkan gudang/permintaanpembelian/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('gudang/permintaanpembelian', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        $data['kodepermintaanpembelian'] = $this->Mpermintaanpembelian->kode_permintaanpembelian();
        $data['title'] = 'Tambah Permintaan Pembelian';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/tambahperpem', $data);
        $this->load->view('footer');
    }
}
