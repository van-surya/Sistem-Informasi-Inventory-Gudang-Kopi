 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpermintaanbarang extends CI_Model
    {

        function tampil_permintaanbarang()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $ambil = $this->db->get('permintaan_barang');
            return $ambil->result_array();
        }

        function kode_permintaanbarang()
        {
            $this->db->select('RIGHT(permintaan_barang.kode_permintaanbarang,3) as kode_permintaanbarang', FALSE);
            $this->db->order_by('kode_permintaanbarang', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('permintaan_barang');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_permintaanbarang) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "PB" . $batas;
            return $kodetampil;
        }

        function simpan_permintaanbarang($inputan)
        {
            $kode_permintaanbarang = $inputan['kode_permintaanbarang'];
            $id_user = $inputan['id_user'];
            $tgl_permintaanbarang = $inputan['tgl_permintaanbarang'];

            $this->db->where('kode_permintaanbarang', $kode_permintaanbarang);
            $this->db->where('id_user', $id_user);
            $this->db->where('tgl_permintaanbarang', $tgl_permintaanbarang);

            $permintaan_barang = $this->db->get('permintaan_barang')->row_array();
            if (empty($permintaan_barang)) {
                $this->db->insert('permintaan_barang', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_permintaanbarang($id_permintaanbarang)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $ambil = $this->db->get('permintaan_barang');
            return $ambil->row_array();
        }
    }
