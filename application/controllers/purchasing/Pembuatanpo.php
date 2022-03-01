<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembuatanpo extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mpo');
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Pembuatan PO';
        $data['po'] = $this->Mpo->tampil_po();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/pembuatanpo/datapo', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('kode_po', 'Kode PO', 'required');
        $this->form_validation->set_rules('tgl_po', 'Tanggal PO', 'required');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpo jalankan fungsi simpan_po($inputan)
            $this->Mpo->simpan_po($inputan);
            //tampilkan purchasing/pembuatanpo/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('purchasing/pembuatanpo', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode PO pada inputan
        $data['title'] = 'Tambah Pembuatan Po';
        $data['kodepo'] = $this->Mpo->kode_po();

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/pembuatanpo/tambahpo', $data);
        $this->load->view('footer');
    }


    public function detail($id_po)
    {
        $data['po'] = $this->Mpo->detail_po($id_po);
        $data['title'] = 'Detail PO';
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/pembuatanpo/detailpo', $data);
        $this->load->view('footer');
    }





    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mpo->hapus_po($idnya);
    }
}
