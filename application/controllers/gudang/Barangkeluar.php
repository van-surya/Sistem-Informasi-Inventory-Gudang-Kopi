<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Barangkeluar extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mbarangkeluar');
        $this->load->model('Mpermintaanbarang');
        $this->load->model('Muser');
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Barang Keluar';
        $data['barangkeluar'] = $this->Mbarangkeluar->tampil_barangkeluar();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/barangkeluar/databarkel', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('id_permintaanbarang', 'Barang', 'required');
        $this->form_validation->set_rules('kode_barangkeluar', 'Kode Barang Keluar', 'required');
        $this->form_validation->set_rules('tgl_barangkeluar', 'Tanggal', 'required'); 

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mbarangkeluar jalankan fungsi simpan_barangkeluar($inputan)
            $this->Mbarangkeluar->simpan_barangkeluar($inputan);
            //tampilkan gudang/barangkeluar/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('gudang/barangkeluar', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode_barangkeluar pada inputan
        $data['kode_barangkeluar'] = $this->Mbarangkeluar->kode_barangkeluar();
        $data['permintaanbarang'] = $this->Mbarangkeluar->tampilbarangkeluarbaru();
        $data['title'] = 'Tambah Barang Keluar';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/barangkeluar/tambahbarkel', $data);
        $this->load->view('footer');
    }


    public function detail($id_barangkeluar, $id_permintaanbarang)
    {
        $data['barangkeluar'] = $this->Mbarangkeluar->detail_barangkeluar($id_barangkeluar);
        $data['detailpermintaanbarang'] = $this->Mpermintaanbarang->tampil_detailpermintaanbarang($id_permintaanbarang);

        $data['title'] = 'Detail Barang Keluar';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/barangkeluar/detailbarkel', $data);
        $this->load->view('footer');
    }

    public function cetak($id_barangkeluar, $id_permintaanbarang)
    {
        $data['barangkeluar'] = $this->Mbarangkeluar->detail_barangkeluar($id_barangkeluar);
        $data['detailpermintaanbarang'] = $this->Mpermintaanbarang->tampil_detailpermintaanbarang($id_permintaanbarang);

        $data['title'] = 'Cetak Barang Keluar';

        $this->load->view('gudang/barangkeluar/cetakbarkel', $data);
    }


}
