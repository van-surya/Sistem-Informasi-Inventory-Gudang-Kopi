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

    public function tambah()
    {

        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('kode_penggunaan', 'Kode Penggunaan', 'required');
        $this->form_validation->set_rules('tgl_penggunaan', 'Tanggal', 'required');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir

        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpenggunaan jalankan fungsi tambah($inputan)
            $query = $this->Mpenggunaan->tambah($inputan);
            //tampilkan store/tambah/pengurangan
            if ($query == "sukses") {
                $this->session->set_flashdata('pesan', 'Data berhasil dikurangi!');
                redirect('store/penggunaan/', 'refresh');
            } elseif ($query == "gagal") {
                $this->session->set_flashdata('gagal', 'Gagal!');
                redirect('store/penggunaan/', 'refresh');
            }
        } else {
            $data['gagal'] = validation_errors();
        }

        $data['kode_penggunaan'] = $this->Mpenggunaan->kode_penggunaan();
        $data['barang'] = $this->Mbarang->tampil_barang();
        $data['title'] = 'Tambah Penggunaan Bahan Baku';

        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/tambahdata', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mpenggunaan->hapus($idnya);
    }

    public function detail($id_penggunaan)
    {
        $data['penggunaan'] = $this->Mpenggunaan->detail_penggunaan($id_penggunaan);
        $data['detailpenggunaan'] = $this->Mpenggunaan->tampil_detailpenggunaan($id_penggunaan);

        $data['title'] = 'Detail Penggunaan Bahan Baku';
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/detailpenggunaan', $data);
        $this->load->view('footer');
    }

    public function tambahdetail($id_penggunaan)
    {

        // gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_penggunaan', 'Penggunaan', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_penggunaan', 'Jumlah Penggunaan', 'required|is_natural_no_zero');
        $this->form_validation->set_rules(
            'hasil',
            'Jumlah Penggunaan',
            'required|greater_than_equal_to[0]',
            array('greater_than_equal_to' => 'Kurangi Jumlah Penggunaan')
        );

        $inputan = $this->input->post();
        //jk ada inputan dari formulir

        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpenggunaan jalankan fungsi simpan_detailpenggunaan($inputan)
            $query = $this->Mpenggunaan->simpan_detailpenggunaan($inputan);
            //tampilkan store/penggunaan/detail
            if ($query == "sukses") {
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect('store/penggunaan/detail/' . $id_penggunaan, 'refresh');
            } elseif ($query == "gagal") {
                $this->session->set_flashdata('gagal', 'Barang sudah ada!');
                redirect('store/penggunaan/detail/' . $id_penggunaan, 'refresh');
            }
        } else {
            $data['gagal'] = validation_errors();
        }

        $data['title'] = 'Tambah Penggunaan Bahan Baku';
        $data['id_penggunaan'] = $id_penggunaan;
        $data['barang'] = $this->Mbarang->tampil_barang();

        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/penggunaan/tambahdetail', $data);
        $this->load->view('footer');
    }

    public function hapusdetail()
    {
        $idnya = $this->input->post("id");
        $this->Mpenggunaan->hapus_detailpenggunaan($idnya);
    }

    public function cetak($id_penggunaan)
    {
        $data['penggunaan'] = $this->Mpenggunaan->detail_penggunaan($id_penggunaan);
        $data['detailpenggunaan'] = $this->Mpenggunaan->cetakdetail($id_penggunaan);

        $data['title'] = 'Cetak Penggunaan Bahan Baku';

        $this->load->view('store/penggunaan/cetakpenggunaan', $data);
    }


}
