<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Po extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mpo');
        $this->load->model('Mpermintaanpembelian'); 
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Purchase Order';
        $data['po'] = $this->Mpo->tampil_po();

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/po/datapo', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('id_permintaanpembelian', 'Permintaan Pembelian', 'required');
        $this->form_validation->set_rules('kode_po', 'Kode', 'required');
        $this->form_validation->set_rules('tgl_po', 'Tanggal', 'required');
        $this->form_validation->set_rules('status_po', 'Status', 'required');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpo jalankan fungsi simpan_po($inputan)
            $this->Mpo->simpan_po($inputan);
            //tampilkan purchasing/po/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/po', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode po pada inputan

        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->tampil_permintaanpembeliansetuju();
        $data['kodepo'] = $this->Mpo->kode_po();
        $data['title'] = 'Buat Purchase Order';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/po/tambahpo', $data);
        $this->load->view('footer');
    }

    public function detail($id_po)
    {
        $data['po'] = $this->Mpo->detail_po($id_po);
        $data['detailpo'] = $this->Mpo->tampil_detailpo($id_po);

        $data['title'] = 'Detail Purchase Order';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/po/detailpo', $data);
        $this->load->view('footer');
    }
    public function cetak($id_po)
    {

        $data['po'] = $this->Mpo->detail_po($id_po);
        $data['detailpo'] = $this->Mpo->tampil_detailpo($id_po);
        $data['title'] = 'Laporan Purchase Order';

        $this->load->view('purchasing/po/cetakpo', $data);
    }
}
