<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{

    public function index()
    {
        //menghapus session petugas login
        $this->session->unset_userdata("admin");
        $this->session->sess_destroy();
        redirect('', 'refresh');
    }
}
