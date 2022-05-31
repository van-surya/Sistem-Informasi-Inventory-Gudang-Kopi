<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');

        if (!$this->session->userdata("admin")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {

        $data = ['title' => 'Beranda'];
        $data['jumlah_user'] = $this->Muser->hitung_user();
        
        $this->load->view('header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/beranda', $data);
        $this->load->view('footer',);
    }

    public function ubahprofile($id_user)
    {
        //terima inputan dari formulir

        $inputan = $this->input->post();
        // jk submit maka lakukan

        if ($inputan) {
            //mengambil detail dari Model Muser
            $detail = $this->Muser->detail_user($id_user);

            //jika ada inputan ada maka jalankan validasi 
            if ($inputan['email'] == $detail['email']) {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            } else {
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_petugas.email]');
            }
            $this->form_validation->set_rules('nama', 'Nama',
                'required|alpha_numeric_spaces'
            ); 
            $this->form_validation->set_rules('level', 'Level', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                // jalankan method ubah user data dari formulir berdasarkan id pada url  
                $this->Muser->ubah_profiladmin($inputan, $id_user);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('admin/beranda', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["datauser"] = $this->Muser->detail_user($id_user);
        $data['title'] = 'Ubah Profile';

        $this->load->view('header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/ubahprofile', $data);
        $this->load->view('footer',);
    }
}
