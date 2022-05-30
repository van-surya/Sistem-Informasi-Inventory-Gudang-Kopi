<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Msupplier');
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Data Supplier';
        $data['supplier'] = $this->Msupplier->tampil_supplier();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/supplier/datasupplier', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_supplier', 'Kode Supplier', 'required');
        $this->form_validation->set_rules('nama_supplier', 'Nama', 'required|is_unique[supplier.nama_supplier]');
        $this->form_validation->set_rules('alamat_supplier', 'Alamat', 'required|max_length[200]');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Msupplier jalankan fungsi simpan_supplier($inputan)
            $this->Msupplier->simpan_supplier($inputan);
            //tampilkan purchasing/supplier/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/supplier', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode supplier pada inputan
        $data['kodesupplier'] = $this->Msupplier->kode_supplier();
        $data['title'] = 'Tambah Supplier';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/supplier/tambahsupplier', $data);
        $this->load->view('footer');
    }


    public function detail($id_supplier)
    {
        $data['supplier'] = $this->Msupplier->detail_supplier($id_supplier);
        $data['title'] = 'Detail Supplier';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/supplier/detailsupplier', $data);
        $this->load->view('footer');
    }


    public function ubah($id_supplier)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Msupplier
            $detail = $this->Msupplier->detail_supplier($id_supplier);

            //jika ada inputan ada maka jalankan validasi 
            if ($inputan['nama_supplier'] == $detail['nama_supplier']) {
                $this->form_validation->set_rules('nama_supplier', 'Nama ', 'required');
            } else {
                $this->form_validation->set_rules('nama_supplier', 'Nama ', 'required|is_unique[supplier.nama_supplier]');
            }
            //jika ada inputan ada maka jalankan validasi 
            $this->form_validation->set_rules('alamat_supplier', 'Alamat', 'required|max_length[200]');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                //jalankan method ubah supplier data dari formulir berdasarkan id pada url 
                $this->Msupplier->ubah_supplier($inputan, $id_supplier);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('purchasing/supplier', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["datasupplier"] = $this->Msupplier->detail_supplier($id_supplier);
        $data['title'] = 'Ubah Data Supplier';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/supplier/editsupplier', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Msupplier->hapus_supplier($idnya);
    }
}
