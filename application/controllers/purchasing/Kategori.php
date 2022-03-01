<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mkategori');
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Kategori';
        $data['kategori'] = $this->Mkategori->tampil_kategori();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/kategori/datakategori', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('nama_kategori', 'Kategori', 'required|is_unique[kategori.nama_kategori]');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mkategori jalankan fungsi simpan_kategori($inputan)
            $this->Mkategori->simpan_kategori($inputan);
            //tampilkan purchasing/kategori/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/kategori', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }

        $data['title'] = 'Tambah Barang';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/kategori/tambahkategori', $data);
        $this->load->view('footer');
    }
}
