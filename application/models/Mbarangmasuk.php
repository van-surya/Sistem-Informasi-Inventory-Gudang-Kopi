 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mbarangmasuk extends CI_Model
    {

        function tampil_barangmasuk()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_masuk.id_user', 'left');
            $this->db->join('po', 'po.id_po = barang_masuk.id_po', 'left');
            $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_pembelian.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
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

        function simpan_barangmasuk($inputan)
        {
            $status = $inputan['status_barangmasuk'];
            $id_po = $inputan['id_po'];
            $jumlah_barangmasuk = $inputan['jumlah_barangmasuk'];


            if ($status == 'Diterima') {
                $this->db->insert('barang_masuk', $inputan);
                $this->db->query("UPDATE po SET status_po = 'Diterima' WHERE id_po=$id_po");
                $this->db->query("UPDATE barang LEFT JOIN permintaan_pembelian ON permintaan_pembelian.id_barang=barang.id_barang
                LEFT JOIN po ON po.id_permintaanpembelian =permintaan_pembelian.id_permintaanpembelian SET stock_gudang = stock_gudang+$jumlah_barangmasuk WHERE id_po=$id_po");

                return "sukses";
            } else {
                return "gagal";
            }
        }

        function detail_barangmasuk($id_barangmasuk)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = barang_masuk.id_user', 'left');
            $this->db->join('po', 'po.id_po = barang_masuk.id_po', 'left');
            $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_pembelian.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');

            $this->db->where('id_barangmasuk', $id_barangmasuk);
            $ambil = $this->db->get('barang_masuk');
            return $ambil->row_array();
        }

        function hapus_barangmasuk($id_barangmasuk)
        {
            $this->db->where('id_barangmasuk', $id_barangmasuk);
            $this->db->delete('barang_masuk');
        }

        function hitung_barangmasuk()
        {
            $this->db->select('id_barangmasuk');
            $this->db->from('barang_masuk');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
    }
