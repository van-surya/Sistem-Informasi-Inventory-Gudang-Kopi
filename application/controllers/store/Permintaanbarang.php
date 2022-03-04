<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permintaanbarang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mpermintaanbarang');
        $this->load->model('Mbarang');
        $this->load->model('Muser');
        if (!$this->session->userdata("store")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Permintaan Barang';
        $data['permintaanbarang'] = $this->Mpermintaanbarang->tampil_permintaanbarang();
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/permintaanbarang/dataperbar', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules(
            'kode_permintaanbarang',
            'Kode',
            'required'
        );
        $this->form_validation->set_rules('tgl_permintaanbarang', 'Tanggal', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_permintaanbarang', 'Jumlah Permintaan', 'required|is_natural_no_zero');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpermintaanbarang jalankan fungsi simpan_permintaanbarang($inputan)
            $this->Mpermintaanbarang->simpan_permintaanbarang($inputan);
            //tampilkan store/permintaanbarang/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('store/permintaanbarang', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanbarang pada inputan
        $data['kodepermintaanbarang'] = $this->Mpermintaanbarang->kode_permintaanbarang();
        $data['barang'] = $this->Mbarang->tampil_barang();
        $data['title'] = 'Tambah Permintaan Barang';
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/permintaanbarang/tambahperbar', $data);
        $this->load->view('footer');
    }

    public function detail($id_permintaanbarang)
    {
        $data['permintaanbarang'] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['title'] = 'Detail Permintaan Barang';
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/permintaanbarang/detailperbar', $data);
        $this->load->view('footer');
    }


    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanbarang->hapus_permintaanbarang($idnya);
    }
 

}
