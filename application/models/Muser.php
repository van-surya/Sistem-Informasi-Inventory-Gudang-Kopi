 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Muser extends CI_Model
    {

        public function login($inputan)
        {
            $email = $inputan['email'];
            $password = $inputan['password'];
            $password = sha1($password);

            //cek ke tb user_petugas ada atau tdk data  dgn email dan password tsb.
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $ambil = $this->db->get('user_petugas');

            //cek dlm bentuk array
            $petugas = $ambil->row_array();

            // jika petugas tidak kosong 
            if (!empty($petugas)) {
                if ($petugas['level'] == 'admin') {
                    $this->session->set_userdata("admin", $petugas);
                    return "admin";
                } elseif ($petugas['level'] == 'store') {
                    $this->session->set_userdata("store", $petugas);
                    return "store";
                } elseif ($petugas['level'] == 'purchasing') {
                    $this->session->set_userdata("purchasing", $petugas);
                    return "purchasing";
                } elseif ($petugas['level'] == 'gudang') {
                    $this->session->set_userdata("gudang", $petugas);
                    return "gudang";
                } else {
                    return "gagal";
                }
            }
        }
    }
