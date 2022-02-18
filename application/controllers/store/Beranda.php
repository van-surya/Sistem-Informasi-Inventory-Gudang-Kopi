<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{


    function __construct()
    {
        parent::__construct();
        $this->load->model('Muser');

        if (!$this->session->userdata("store")) {
            $this->session->set_flashdata('pesan', 'Anda harus login');
            redirect('login', 'refresh');
        }
    }

    public function index()
    {
        $data = ['title' => 'Beranda'];
        $this->load->view('header', $data);
        $this->load->view('store/navbar', $data);
        $this->load->view('store/beranda', $data);
        $this->load->view('footer',);
    }
}
