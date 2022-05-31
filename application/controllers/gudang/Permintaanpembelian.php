<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Permintaanpembelian extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Mbarang');
        $this->load->model('Mpermintaanpembelian');
        $this->load->model('Muser');
        if (!$this->session->userdata("gudang")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Permintaan Pembelian';
        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->tampil_permintaanpembelian();
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/dataperpem', $data);
        $this->load->view('footer');
    }


    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_user', 'Pembuat', 'required');
        $this->form_validation->set_rules('kode_permintaanpembelian', 'Kode', 'required');
        $this->form_validation->set_rules('tgl_permintaanpembelian', 'Tanggal', 'required');
        $this->form_validation->set_rules('status_permintaanpembelian', 'Status', 'required');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpermintaanpembelian jalankan fungsi simpan_permintaanpembelian($inputan)
            $this->Mpermintaanpembelian->simpan_permintaanpembelian($inputan);
            //tampilkan gudang/permintaanpembelian/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('gudang/permintaanpembelian', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }
        //tampilkan kode permintaanpembelian pada inputan
        $data['kodepermintaanpembelian'] = $this->Mpermintaanpembelian->kode_permintaanpembelian();
        $data['title'] = 'Tambah Permintaan Barang';
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/tambahperpem', $data);
        $this->load->view('footer');
    }


    public function detail($id_permintaanpembelian)
    {
        $data['permintaanpembelian'] = $this->Mpermintaanpembelian->detail_permintaanpembelian($id_permintaanpembelian);
        $data['detailpermintaanpembelian'] = $this->Mpermintaanpembelian->tampil_detailpermintaanpembelian($id_permintaanpembelian);

        $data['title'] = 'Detail Permintaan Pembelian';
        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/detailperpem', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanpembelian->hapus_permintaanpembelian($idnya);
    }


    public function tambahdetail($id_permintaanpembelian)
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('id_permintaanpembelian', 'permintaan_barang', 'required');
        $this->form_validation->set_rules('id_barang', 'Barang', 'required');
        $this->form_validation->set_rules('jumlah_permintaanpembelian', 'Jumlah Permintaan', 'required|is_natural_no_zero');

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Mpermintaanpembelian jalankan fungsi simpan_detailpermintaanpembelian($inputan)
            $query = $this->Mpermintaanpembelian->simpan_detailpermintaanpembelian($inputan);
            //tampilkan gudang/permintaanpembelian/detail
            if ($query == "sukses") {
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            } elseif ($query == "gagal") {
                $this->session->set_flashdata('gagal', 'Barang sudah ada!');
                redirect('gudang/permintaanpembelian/detail/' . $id_permintaanpembelian, 'refresh');
            }
        } else {
            $data['gagal'] = validation_errors();
        }

        $data['title'] = 'Tambah Detail Permintaan Barang';
        $data['id_permintaanpembelian'] = $id_permintaanpembelian;
        $data['barang'] = $this->Mbarang->tampil_barang();

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanpembelian/tambahdetail', $data);
        $this->load->view('footer');
    }

    public function hapusdetail()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanpembelian->hapus_detailpermintaanpembelian($idnya);
    }


 
}
