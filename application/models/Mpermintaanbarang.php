 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpermintaanbarang extends CI_Model
    {

        function tampil_permintaanbarang()
        {
            $this->db->join('barang', 'barang.id_barang = permintaan_barang.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
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
            $id_user = $inputan['id_user'];
            $kode_permintaanbarang = $inputan['kode_permintaanbarang'];
            $tgl_permintaanbarang = $inputan['tgl_permintaanbarang'];
            $id_barang = $inputan['id_barang'];
            $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];
            $status_permintaanbarang = $inputan['status_permintaanbarang'];

            $this->db->where('id_user', $id_user);
            $this->db->where('kode_permintaanbarang', $kode_permintaanbarang);
            $this->db->where('tgl_permintaanbarang', $tgl_permintaanbarang);
            $this->db->where('id_barang', $id_barang);
            $this->db->where('jumlah_permintaanbarang', $jumlah_permintaanbarang);
            $this->db->where('status_permintaanbarang', $status_permintaanbarang);

            $permintaan_barang = $this->db->get('permintaan_barang')->row_array();
            if (empty($permintaan_barang)) {
                $this->db->insert('permintaan_barang', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_permintaanbarang($id_permintaanbarang)
        {
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $this->db->delete('permintaan_barang');
        }

        function tampil_permintaanbarangsetuju()
        {

            $ambil = $this->db->query("SELECT *
            FROM permintaan_barang LEFT JOIN barang ON barang.id_barang = permintaan_barang.id_barang 
            WHERE id_permintaanbarang NOT IN (SELECT id_permintaanbarang FROM barang_keluar) AND status_permintaanbarang = 'Setuju' ");
            return $ambil->result_array();
        }

        function detail_permintaanbarang($id_permintaanbarang)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_barang.id_barang', 'left');
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $ambil = $this->db->get('permintaan_barang');
            return $ambil->row_array();
        }

        function konfirmasi_permintaanbarang($inputan, $id_permintaanbarang)
        {
            $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];
            $status_permintaanbarang = $inputan['status_permintaanbarang'];

            $this->db->query("UPDATE permintaan_barang SET jumlah_permintaanbarang = $jumlah_permintaanbarang,
            status_permintaanbarang ='$status_permintaanbarang' WHERE permintaan_barang.id_permintaanbarang = $id_permintaanbarang ");

        }

        function hitung_permintaanbarang()
        {
            $this->db->select('id_permintaanbarang');
            $this->db->from('permintaan_barang');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
    }
