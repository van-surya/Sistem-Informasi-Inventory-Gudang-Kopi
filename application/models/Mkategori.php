 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mkategori extends CI_Model
    {

        function tampil_kategori()
        {
            $ambil = $this->db->get('kategori');
            return $ambil->result_array();
        }

        function simpan_kategori($inputan)
        {
            $nama_kategori = $inputan['nama_kategori'];
            $this->db->where('nama_kategori', $nama_kategori);

            $kategori = $this->db->get('kategori')->row_array();
            if (empty($kategori)) {
                $this->db->insert('kategori', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_kategori($id_kategori)
        {
            $this->db->where('id_kategori', $id_kategori);
            $ambil = $this->db->get('kategori');
            return $ambil->row_array();
        }


        function ubah_kategori($inputan, $id_kategori)
        {
            $this->db->where('nama_kategori', $inputan['nama_kategori']);

            $kategori = $this->db->get('kategori')->row_array();
            if (empty($kategori)) {
                $this->db->where('id_kategori', $id_kategori);
                $this->db->update('kategori', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_kategori($id_kategori)
        {
            $this->db->where('id_kategori', $id_kategori);
            $this->db->delete('kategori');
        }
    }
