<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penggunaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mbarang');
        $this->load->model('Muser');
        if (!$this->session->userdata("store")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Penggunaan Bahan Baku';
        $data['barang'] = $this->Mbarang->tampil_barang();
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/datapenggunaan', $data);
        $this->load->view('footer');
    }

    public function pengurangan($id_barang)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mbarang
            $detail = $this->Mbarang->detail_barang($id_barang);

            //jika ada inputan ada maka jalankan validasi  
            $this->form_validation->set_rules('stock_toko', 'Jumlah', 'required|greater_than[-1]');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                //jalankan method ubah user data dari formulir berdasarkan id pada url 
                $this->Mbarang->pengurangan_bahanbaku($inputan, $id_barang);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('store/penggunaan', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["databarang"] = $this->Mbarang->detail_barang($id_barang);
        $data['title'] = 'Pengurangan Bahan Baku';

        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/penggunaanbahan', $data);
        $this->load->view('footer');
    }
}
