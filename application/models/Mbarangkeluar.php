 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mbarangkeluar extends CI_Model
    {
         
        function tampil_barangkeluar()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_keluar.id_user', 'left');
            $this->db->join('permintaan_barang', 'permintaan_barang.id_permintaanbarang = barang_keluar.id_permintaanbarang', 'left');
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

        function tampilbarangkeluarbaru()
        {
            $ambil = $this->db->query("SELECT * FROM permintaan_barang LEFT JOIN user_petugas ON user_petugas.id_user
            =permintaan_barang.id_user WHERE status_permintaanbarang='Setuju' 
            AND id_permintaanbarang NOT IN (SELECT id_permintaanbarang FROM barang_keluar)");
            
            return $ambil->result_array();
        }

        function simpan_barangkeluar($inputan)
        {
            $id_user = $inputan['id_user'];
            $id_permintaanbarang = $inputan['id_permintaanbarang'];
            $tgl_barangkeluar = $inputan['tgl_barangkeluar']; 

            $this->db->where('id_user', $id_user);
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $this->db->where('tgl_barangkeluar', $tgl_barangkeluar); 

            $barang_keluar = $this->db->get('barang_keluar')->row_array();
            if (empty($barang_keluar)) {
                $this->db->insert('barang_keluar', $inputan);
                $this->db->query("UPDATE barang LEFT JOIN detail_permintaanbarang ON detail_permintaanbarang.id_detailpermintaanbarang SET stock_toko = stock_toko + jumlah_permintaanbarang , stock_gudang = stock_gudang-jumlah_permintaanbarang WHERE id_permintaanbarang = $id_permintaanbarang");
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_barangkeluar($id_barangkeluar)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_keluar.id_user', 'left');
            $this->db->where('id_barangkeluar', $id_barangkeluar);
            $ambil = $this->db->get('barang_keluar');
            return $ambil->row_array();
        }
 
    }
