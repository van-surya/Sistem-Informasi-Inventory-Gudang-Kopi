<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Penggunaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mpenggunaan');
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
        $data['penggunaan'] = $this->Mpenggunaan->tampil_penggunaan();
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/datapenggunaan', $data);
        $this->load->view('footer');
    }

    public function pengurangan()
    {

        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('tgl_pembuatan', 'Tanggal Pembuatan', 'required');
        $this->form_validation->set_rules('jumlah_penggunaan', 'Jumlah Permintaan', 'required|is_natural_no_zero');
        $this->form_validation->set_rules(
            'hasil',
            'Jumlah Penggunaan',
            'greater_than_equal_to[0]',
            array('greater_than_equal_to' => 'Kurangi Penggunaan')
        );

        $inputan = $this->input->post();
        //jk ada inputan dari formulir

        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpenggunaan jalankan fungsi penggurangan($inputan)
            $query = $this->Mpenggunaan->penggurangan($inputan);
            //tampilkan store/penggurangan/pengurangan
            if ($query == "sukses") {
                $this->session->set_flashdata('pesan', 'Data berhasil dikurangi!');
                redirect('store/penggunaan/', 'refresh');
            } elseif ($query == "gagal") {
                $this->session->set_flashdata('gagal', 'Gagal!');
                redirect('store/penggunaan/pengurangan/', 'refresh');
            }
        } else {
            $data['gagal'] = validation_errors();
        }

        $data['kode_penggunaan'] = $this->Mpenggunaan->kode_penggunaan();
        $data['barang'] = $this->Mbarang->tampil_barang();
        $data['title'] = 'Pengurangan Bahan Baku';

        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/penggunaanbahan', $data);
        $this->load->view('footer');
    }
}
