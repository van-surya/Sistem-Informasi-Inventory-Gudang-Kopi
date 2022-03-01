 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpermintaanpembelian extends CI_Model
    {

        function tampil_permintaanpembelian()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_pembelian.id_user', 'left');
            $ambil = $this->db->get('permintaan_pembelian');
            return $ambil->result_array();
        }

        function kode_permintaanpembelian()
        {
            $this->db->select('RIGHT(permintaan_pembelian.kode_permintaanpembelian,3) as kode_permintaanpembelian', FALSE);
            $this->db->order_by('kode_permintaanpembelian', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('permintaan_pembelian');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_permintaanpembelian) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "PP" . $batas;
            return $kodetampil;
        }

        function simpan_permintaanpembelian($inputan)
        {
            $kode_permintaanpembelian = $inputan['kode_permintaanpembelian'];
            $id_user = $inputan['id_user'];
            $tgl_permintaanpembelian = $inputan['tgl_permintaanpembelian'];

            $this->db->where('kode_permintaanpembelian', $kode_permintaanpembelian);
            $this->db->where('id_user', $id_user);
            $this->db->where('tgl_permintaanpembelian', $tgl_permintaanpembelian);

            $permintaan_pembelian = $this->db->get('permintaan_pembelian')->row_array();
            if (empty($permintaan_pembelian)) {
                $this->db->insert('permintaan_pembelian', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }






        function hapus_permintaanpembelian($id_permintaanpembelian)
        {
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $this->db->delete('permintaan_pembelian');
        }
    }
