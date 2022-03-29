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

        $data['title'] = 'Tambah Katagori';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/kategori/tambahkategori', $data);
        $this->load->view('footer');
    }


    public function ubah($id_kategori)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mkategori
            $detail = $this->Mkategori->detail_kategori($id_kategori);

            //jika ada inputan ada maka jalankan validasi 
            if ($inputan['nama_kategori'] == $detail['nama_kategori']) {
                $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
            } else {
                $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|is_unique[kategori.nama_kategori]');
            }

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                //jalankan method ubah user data dari formulir berdasarkan id pada url 
                $this->Mkategori->ubah_kategori($inputan, $id_kategori);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('purchasing/kategori', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["datakategori"] = $this->Mkategori->detail_kategori($id_kategori);
        $data['title'] = 'Ubah Kategori';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/kategori/editkategori', $data);
        $this->load->view('footer');
    }


    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mkategori->hapus_kategori($idnya);
    }
}
