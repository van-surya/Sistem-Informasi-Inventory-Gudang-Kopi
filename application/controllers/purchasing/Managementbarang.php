<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Managementbarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mbarang');
        $this->load->model('Mkategori');
        $this->load->model('Msupplier');
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Management Barang';
        $data['barang'] = $this->Mbarang->tampil_barang();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managementbarang/databarang', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mbarang jalankan fungsi simpan_barang($inputan)
            $this->Mbarang->simpan_barang($inputan);
            //tampilkan purchasing/managementbarang/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/managementbarang', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        $data['kodebarang'] = $this->Mbarang->kode_barang();
        $data['kategori'] = $this->Mkategori->tampil_kategori();
        $data['supplier'] = $this->Msupplier->tampil_supplier();

        $data['title'] = 'Tambah Barang';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managementbarang/tambahbarang', $data);
        $this->load->view('footer');
    }

    public function detail($id_barang)
    {
        $data['barang'] = $this->Mbarang->detail_barang($id_barang);
        $data['title'] = 'Detail Barang';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managementbarang/detailbarang', $data);
        $this->load->view('footer');
    }
}
