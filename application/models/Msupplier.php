 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Msupplier extends CI_Model
    {

        function tampil_supplier()
        {
            $ambil = $this->db->get('supplier');
            return $ambil->result_array();
        }

        function simpan_user($inputan)

        {
            // ambil pass dari inputan
            $pass_inputan = $inputan['password'];
            // enkripsi pakai SHA1
            $pass_enkrip = sha1($pass_inputan);

            // masukan pass yg sudah dienkrip ke dalam array inputan index password 
            $inputan['password'] = $pass_enkrip;

            //query insert ke tabel user_petugas
            $this->db->insert('user_petugas', $inputan);
        }

        function detail_user($id_user)
        {
            $this->db->where('id_user', $id_user);
            $ambil = $this->db->get('user_petugas');
            return $ambil->row_array();
        }

        function ubah_user($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);
            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata('user_petugas', $user_petugas);
        }

        function hapus_user($id_user)
        {
            $this->db->where('id_user', $id_user);
            $this->db->delete('user_petugas');
        }

        function hitung_user()
        {
            $this->db->select('id_user');
            $this->db->from('user_petugaS');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
    }
