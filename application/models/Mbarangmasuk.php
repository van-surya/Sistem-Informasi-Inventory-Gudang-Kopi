 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mbarangmasuk extends CI_Model
    {

        function tampil_barangmasuk()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_masuk.id_user', 'left');
            $ambil = $this->db->get('barang_masuk');
            return $ambil->result_array();
        }

        function kode_barangmasuk()
        {
            $this->db->select('RIGHT(barang_masuk.kode_barangmasuk,3) as kode_barangmasuk', FALSE);
            $this->db->order_by('kode_barangmasuk', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('barang_masuk');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_barangmasuk) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "BM" . $batas;
            return $kodetampil;
        }

        function tampilbarangmasukbaru()
        {
            $ambil = $this->db->query("SELECT nama, po.id_permintaanpembelian, kode_permintaanpembelian, tgl_permintaanpembelian 
            FROM permintaan_pembelian  LEFT JOIN user_petugas ON user_petugas.id_user = permintaan_pembelian.id_user
            LEFT JOIN po ON po.id_permintaanpembelian = permintaan_pembelian.id_permintaanpembelian
            WHERE po.status_po = 'Mengirim' AND po.id_permintaanpembelian 
            NOT IN (SELECT id_permintaanpembelian FROM barang_masuk)");
            return $ambil->result_array();
        }


        function simpan_barangmasuk($inputan)
        {
            $id_user = $inputan['id_user'];
            $id_permintaanpembelian = $inputan['id_permintaanpembelian'];

            $this->db->where('id_user', $id_user);
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);

            $barang_masuk = $this->db->get('barang_masuk')->row_array();
            if (empty($barang_masuk)) {
                $this->db->insert('barang_masuk', $inputan);
                $this->db->query("UPDATE po SET status_po = 'Diterima' WHERE id_permintaanpembelian = $id_permintaanpembelian");
                $this->db->query("UPDATE barang LEFT JOIN detail_permintaanpembelian ON detail_permintaanpembelian.id_barang = barang.id_barang SET stock_gudang = stock_gudang + jumlah_permintaanpembelian WHERE id_permintaanpembelian = $id_permintaanpembelian");
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_barangmasuk($id_barangmasuk)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_masuk.id_user', 'left');
            $this->db->where('id_barangmasuk', $id_barangmasuk);
            $ambil = $this->db->get('barang_masuk');
            return $ambil->row_array();
        } 
    }
