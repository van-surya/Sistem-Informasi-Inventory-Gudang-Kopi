<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Managemenbarang extends CI_Controller
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
        $data['title'] = 'Managemen Barang';
        $data['barang'] = $this->Mbarang->tampil_barang();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managemenbarang/databarang', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|is_unique[barang.nama_barang]');
        $this->form_validation->set_rules('satuan', 'Satuan', 'required');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mbarang jalankan fungsi simpan_barang($inputan)
            $this->Mbarang->simpan_barang($inputan);
            //tampilkan purchasing/managemenbarang/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/managemenbarang', 'refresh');
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
        $this->load->view('purchasing/managemenbarang/tambahbarang', $data);
        $this->load->view('footer');
    }

    public function detail($id_barang)
    {
        $data['barang'] = $this->Mbarang->detail_barang($id_barang);
        $data['title'] = 'Detail Barang';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managemenbarang/detailbarang', $data);
        $this->load->view('footer');
    }


    public function ubah($id_barang)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mbarang
            $detail = $this->Mbarang->detail_barang($id_barang);

            //jika ada inputan ada maka jalankan validasi 
            if ($inputan['nama_barang'] == $detail['nama_barang']) {
                $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required');
            } else {
                $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'required|is_unique[barang.nama_barang]');
            }
            //jika ada inputan ada maka jalankan validasi 
            $this->form_validation->set_rules('kode_barang', 'Kode Barang', 'required');
            $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
            $this->form_validation->set_rules('id_supplier', 'Supplier', 'required');
            $this->form_validation->set_rules('satuan', 'Satuan', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                //jalankan method ubah user data dari formulir berdasarkan id pada url 
                $this->Mbarang->ubah_barang($inputan, $id_barang);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('purchasing/managemenbarang', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["databarang"] = $this->Mbarang->detail_barang($id_barang);
        $data["kategori"] = $this->Mkategori->tampil_kategori();
        $data["supplier"] = $this->Msupplier->tampil_supplier();
        $data['title'] = 'Ubah Barang';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/managemenbarang/editbarang', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mbarang->hapus_barang($idnya);
    }
}
