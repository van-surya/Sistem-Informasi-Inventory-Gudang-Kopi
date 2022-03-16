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
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Permintaan Barang';
        $data['permintaanbarang'] = $this->Mpermintaanbarang->tampil_permintaanbarang();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/dataperbar', $data);
        $this->load->view('footer');
    }


    public function konfirmasi($id_permintaanbarang)
    {
        $inputan = $this->input->post();
        $this->form_validation->set_rules('jumlah_permintaanbarang', 'Jumlah Permintaan Barang', 'required|is_natural_no_zero');
        $this->form_validation->set_rules('status_permintaanbarang', 'Status', 'required');
        $this->form_validation->set_rules(
            'hasilgudang',
            'Stock Gudang',
            'required|is_natural_no_zero',
            array('is_natural_no_zero' => '%s Tidak Mencukupi')
        );

        // jalankan validasi jika benar 
        if ($this->form_validation->run() == TRUE) {
            //jalankan method ubah permintaanbarang dari formulir berdasarkan id pada url 
            $this->Mpermintaanbarang->konfirmasi_permintaanbarang($inputan, $id_permintaanbarang);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
            redirect('gudang/permintaanbarang', 'refresh');
        } else {
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }
        $data["datapermintaanbarang"] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['title'] = 'Konfirmasi Permintaan Barang';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/konfirmasiperbar', $data);
        $this->load->view('footer');
    }

    public function detail($id_permintaanbarang)
    {

        $data["datapermintaanbarang"] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['title'] = 'Detail Permintaan Barang';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/detailperbar', $data);
        $this->load->view('footer');
    }
}
