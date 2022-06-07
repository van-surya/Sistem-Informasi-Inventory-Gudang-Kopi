<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penggunaan extends CI_Controller
{


    function __construct()
    {
        parent::__construct();

        $this->load->model('Mpenggunaan');
        $this->load->model('Muser');
        if (!$this->session->userdata("management")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = ['title' => 'Penggunaan Bahan Baku'];
        $data['penggunaan'] = $this->Mpenggunaan->tampil_penggunaan_tanggal();
        $this->load->view('header', $data);
        $this->load->view('management/navbar', $data);
        $this->load->view('management/penggunaan/datapenggunaan', $data);
        $this->load->view('footer',);
    }

    public function detail($tgl_penggunaan)
    {
        $data['detailpenggunaan'] = $this->Mpenggunaan->tampil_detailpenggunaantanggal($tgl_penggunaan);
        $data['tgl'] = $tgl_penggunaan;
        $data['title'] = 'Detail Penggunaan Bahan Baku';
        $this->load->view('header', $data);
        $this->load->view('management/navbar', $data);
        $this->load->view('management/penggunaan/detailpenggunaan', $data);
        $this->load->view('footer');
    }

    public function cetak($tgl_penggunaan)
    {
        $data['detailpenggunaan'] = $this->Mpenggunaan->tampil_detailpenggunaantanggal($tgl_penggunaan);
        $data['title'] = 'Laporan Penggunaan Bahan Baku';
        $data['tgl'] = $tgl_penggunaan;

        $this->load->view('management/penggunaan/cetakpenggunaan', $data);
    }

    
}
