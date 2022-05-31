<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Managemenuser extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Muser');
        if (!$this->session->userdata("admin")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('', 'refresh');
        }
    }

    public function index()
    {
        $data['title'] = 'Managemen User';
        $data['user_petugas'] = $this->Muser->tampil_user();
        $this->load->view('header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/managemenuser/datauser', $data);
        $this->load->view('footer');
    }

    public function tambah()
    {
        //gunakan lib form_validation untuk me required
        $this->form_validation->set_rules('nama', 'Nama', 'required|alpha_numeric_spaces');
        $this->form_validation->set_rules('phone', 'Phone', 'numeric|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user_petugas.email]');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('level', 'Level', 'required');
        //dapatkan inputan dari formulir

        $inputan = $this->input->post();
        //jk ada inputan dari formulir
        // jk validation benar 
        if ($this->form_validation->run() == TRUE) {
            //Muser jalankan fungsi simpan_user($inputan)
            $this->Muser->simpan_user($inputan);
            //tampilkan admin/managemenuser/index
            $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
            redirect('admin/managemenuser', 'refresh');
        }
        // selain itu gagal  
        else {
            $data['gagal'] = validation_errors();
        }

        $data['title'] = 'Tambah User';
        $this->load->view('header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/managemenuser/tambahuser', $data);
        $this->load->view('footer');
    }

    public function ubah($id_user)
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
            $this->form_validation->set_rules('nama', 'Nama', 'required|alpha_numeric_spaces');
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
            $this->form_validation->set_rules('phone', 'Phone', 'numeric|max_length[15]');
            $this->form_validation->set_rules('level', 'Level', 'required');

            // jalankan validasi jika benar
            if ($this->form_validation->run() == TRUE) {
                //jalankan method ubah user data dari formulir berdasarkan id pada url 
                $this->Muser->ubah_user($inputan, $id_user);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect('admin/managemenuser', 'refresh');
            }
            // jika salah maka 
            $data['gagal'] = validation_errors();
        }

        $data["datauser"] = $this->Muser->detail_user($id_user);
        $data['title'] = 'Ubah Data User';

        $this->load->view('header', $data);
        $this->load->view('admin/navbar', $data);
        $this->load->view('admin/managemenuser/edituser', $data);
        $this->load->view('footer');
    }

    public function hapus()
    {
        $idnya = $this->input->post("id");
        $this->Muser->hapus_user($idnya);
    }
}
