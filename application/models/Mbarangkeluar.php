 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mbarangkeluar extends CI_Model
    {

        function tampil_barangkeluar()
        {
            $this->db->join('permintaan_barang', 'permintaan_barang.id_permintaanbarang = barang_keluar.id_permintaanbarang', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_barang.id_barang', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_keluar.id_user', 'left');
            $ambil = $this->db->get('barang_keluar');
            return $ambil->result_array();
        }

        function kode_barangkeluar()
        {
            $this->db->select('RIGHT(barang_keluar.kode_barangkeluar,3) as kode_barangkeluar', FALSE);
            $this->db->order_by('kode_barangkeluar', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('barang_keluar');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_barangkeluar) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "BK" . $batas;
            return $kodetampil;
        }


        function simpan_barangkeluar($inputan)
        {
            $status = $inputan['status_barangkeluar'];
            $id_permintaanbarang = $inputan['id_permintaanbarang'];
            $jumlah_barangkeluar = $inputan['jumlah_barangkeluar'];


            if ($status == 'Setuju') {
                $this->db->insert('barang_keluar', $inputan);
                $this->db->query("UPDATE permintaan_barang SET status_permintaanbarang = 'Setuju' WHERE id_permintaanbarang=$id_permintaanbarang");
                $this->db->query("UPDATE barang LEFT JOIN permintaan_barang ON permintaan_barang.id_barang=barang.id_barang 
                SET stock_toko = stock_toko+$jumlah_barangkeluar, stock_gudang=stock_gudang-$jumlah_barangkeluar 
                WHERE id_permintaanbarang=$id_permintaanbarang ");
            } elseif ($status == 'Ditolak') {
                $this->db->insert('barang_keluar', $inputan);
                $this->db->query("UPDATE permintaan_barang SET status_permintaanbarang = 'Ditolak' WHERE id_permintaanbarang=$id_permintaanbarang");
            }
        }

        function hapus_barangkeluar($id_barangkeluar)
        {
            $this->db->where('id_barangkeluar', $id_barangkeluar);
            $this->db->delete('barang_keluar');
        }

        function detail_barangkeluar($id_barangkeluar)
        {
            $this->db->join('permintaan_barang', 'permintaan_barang.id_permintaanbarang = barang_keluar.id_permintaanbarang', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_barang.id_barang', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_keluar.id_user', 'left');

            $this->db->where('id_barangkeluar', $id_barangkeluar);
            $ambil = $this->db->get('barang_keluar');
            return $ambil->row_array();
        }
        function hitung_barangkeluar()
        {
            $this->db->select('id_barangkeluar');
            $this->db->from('barang_keluar');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
    }
