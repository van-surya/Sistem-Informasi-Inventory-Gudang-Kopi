<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permintaanpembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mpermintaanpembelian');
        $this->load->model('Muser');
        if (!$this->session->userdata("purchasing")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Permintaan Pembelian';
        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->tampil_permintaanpembelian();
        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/permintaanpembelian/dataperpem', $data);
        $this->load->view('footer');
    }

    public function detail($id_permintaanpembelian)
    {
        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->detail_permintaanpembelian($id_permintaanpembelian);
        $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Detail Permintaan Pembelian';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/permintaanpembelian/detailperpem', $data);
        $this->load->view('footer');
    }

    public function detailubah($id_permintaanpembelian, $id_detailpermintaanpembelian)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mpermintaanpembelian
            $detail = $this->Mpermintaanpembelian->detail_detailpermintaanpembelian($id_detailpermintaanpembelian);

            //jika ada inputan ada maka jalankan validasi   
            $this->form_validation->set_rules('jumlah_permintaanpembelian', 'Jumlah Permintaan Barang', 'required|is_natural_no_zero');


            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {

                $this->Mpermintaanpembelian->ubah_detailpermintaanpembelian($inputan, $id_detailpermintaanpembelian);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('purchasing/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["detailpermintaanpembelian"] = $this->Mpermintaanpembelian->detail_detailpermintaanpembelian($id_detailpermintaanpembelian);
        $data['title'] = 'Ubah Detail Permintaan Pembelian';
        $data['id_permintaanpembelian'] = $id_permintaanpembelian;

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/permintaanpembelian/editdetailperpem', $data);
        $this->load->view('footer');
    }

    public function hapusdetail()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanpembelian->hapus_detailpermintaanpembelian($idnya);
    }


    public function konfirmasi($id_permintaanpembelian)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mpermintaanpembelian
            $detail = $this->Mpermintaanpembelian->detail_permintaanpembelian($id_permintaanpembelian);

            //jika ada inputan ada maka jalankan validasi   
            $this->form_validation->set_rules('status_permintaanpembelian', 'Status', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {

                $this->Mpermintaanpembelian->konfirmasi_permintaanpembelian($inputan, $id_permintaanpembelian);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('purchasing/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["permintaanpembelian"] = $this->Mpermintaanpembelian->detail_permintaanpembelian($id_permintaanpembelian);
        $data['id_permintaanpembelian'] = $id_permintaanpembelian;
        $data["detailpermintaanpembelian"] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);
        $data['title'] = 'Konfirmasi Permintaan Pembelian';

        $this->load->view('header', $data);
        $this->load->view('purchasing/navbar', $data);
        $this->load->view('purchasing/permintaanpembelian/konfirmasiperpem', $data);
        $this->load->view('footer');
    }

    public function cetak($id_permintaanpembelian)
    {
        $data["permintaanpembelian"] = $this->Mpermintaanpembelian->detail_permintaanpembelian($id_permintaanpembelian);
        $data['id_permintaanpembelian'] = $id_permintaanpembelian;
        $data["detailpermintaanpembelian"] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);
        $data['title'] = 'Laporan Permintaan Pembelian';

        $this->load->view('purchasing/permintaanpembelian/cetakperpem', $data);
    }
}
