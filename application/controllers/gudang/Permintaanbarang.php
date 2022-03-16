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

    public function detail($id_permintaanbarang)
    {
        $data['permintaanbarang'] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['detailpermintaanbarang'] = $this->Mpermintaanbarang->tampil_detailpermintaanbarang($id_permintaanbarang);

        $data['title'] = 'Detail Permintaan Barang';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/detailperbar', $data);
        $this->load->view('footer');
    }


    public function detailubah($id_permintaanbarang, $id_detailpermintaanbarang)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mpermintaanbarang
            $detail = $this->Mpermintaanbarang->detail_detailpermintaanbarang($id_detailpermintaanbarang);

            //jika ada inputan ada maka jalankan validasi   
            $this->form_validation->set_rules('jumlah_permintaanbarang', 'Jumlah Permintaan Barang', 'required|is_natural_no_zero');
            $this->form_validation->set_rules(
                'hasilgudang',
                'Hasil',
                'greater_than_equal_to[0]',
                array('greater_than_equal_to' => 'Stock gudang tidak tersedia silahkan kurangi jumlah permintaan')
            );

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {

                $this->Mpermintaanbarang->ubah_detailpermintaanbarang($inputan, $id_detailpermintaanbarang);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('gudang/permintaanbarang/detail/' . $id_permintaanbarang, 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["detailpermintaanbarang"] = $this->Mpermintaanbarang->detail_detailpermintaanbarang($id_detailpermintaanbarang);
        $data['title'] = 'Ubah Detail Permintaan Barang';
        $data['id_permintaanbarang'] = $id_permintaanbarang;

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/editdetailperbar', $data);
        $this->load->view('footer');
    }

    public function hapusdetail()
    {
        $idnya = $this->input->post("id");
        $this->Mpermintaanbarang->hapus_detailpermintaanbarang($idnya);
    }

    public function konfirmasi($id_permintaanbarang)
    {
        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Mpermintaanbarang
            $detail = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);

            //jika ada inputan ada maka jalankan validasi   
            $this->form_validation->set_rules('status_permintaanbarang', 'Status', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {

                $this->Mpermintaanbarang->konfirmasi_permintaanbarang($inputan, $id_permintaanbarang);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('gudang/permintaanbarang/detail/' . $id_permintaanbarang, 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["permintaanbarang"] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['id_permintaanbarang'] = $id_permintaanbarang;
        $data["detailpermintaanbarang"] = $this->Mpermintaanbarang->tampil_detailpermintaanbarang($id_permintaanbarang);
        $data['title'] = 'Konfirmasi Permintaan Barang';

        $this->load->view('header', $data);
        $this->load->view('gudang/navbar', $data);
        $this->load->view('gudang/permintaanbarang/konfirmasiperbar', $data);
        $this->load->view('footer');
    }

    public function cetak($id_permintaanbarang)
    {
        $data["permintaanbarang"] = $this->Mpermintaanbarang->detail_permintaanbarang($id_permintaanbarang);
        $data['id_permintaanbarang'] = $id_permintaanbarang;
        $data["detailpermintaanbarang"] = $this->Mpermintaanbarang->tampil_detailpermintaanbarang($id_permintaanbarang);
        $data['title'] = 'Laporan Permintaan Barang';

        $this->load->view('gudang/permintaanbarang/cetakperbar', $data);
    }

}
