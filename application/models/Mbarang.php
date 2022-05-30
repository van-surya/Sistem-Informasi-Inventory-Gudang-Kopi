 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mbarang extends CI_Model
    {

        function tampil_barang()
        {
            $this->db->join('supplier', 'supplier.id_supplier = barang.id_supplier', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $ambil = $this->db->get('barang');
            return $ambil->result_array();
        }
 
        function kode_barang()
        {
            $this->db->select('RIGHT(barang.kode_barang,3) as kode_barang', FALSE);
            $this->db->order_by('kode_barang', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('barang');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_barang) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "BR" . $batas;
            return $kodetampil;
        }

        function simpan_barang($inputan)
        {
            $id_kategori = $inputan['id_kategori'];
            $id_supplier = $inputan['id_supplier'];
            $kode_barang = $inputan['kode_barang'];
            $nama_barang = $inputan['nama_barang'];
            $stock_toko = $inputan['stock_toko'];
            $stock_gudang = $inputan['stock_gudang'];
            $satuan = $inputan['satuan'];

            $this->db->where('id_kategori', $id_kategori);
            $this->db->where('id_supplier', $id_supplier);
            $this->db->where('kode_barang', $kode_barang);
            $this->db->where('nama_barang', $nama_barang);
            $this->db->where('stock_toko', $stock_toko);
            $this->db->where('stock_gudang', $stock_gudang);
            $this->db->where('satuan', $satuan);

            $barang = $this->db->get('barang')->row_array();
            if (empty($barang)) {
                $this->db->insert('barang', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_barang($id_barang)
        {
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->join('supplier', 'supplier.id_supplier = barang.id_supplier', 'left');
            $this->db->where('id_barang', $id_barang);
            $ambil = $this->db->get('barang');
            return $ambil->row_array();
        }

        function ubah_barang($inputan, $id_barang)
        {
            $this->db->where('kode_barang', $inputan['kode_barang']);
            $this->db->where('id_kategori', $inputan['id_kategori']);
            $this->db->where('id_supplier', $inputan['id_supplier']);
            $this->db->where('stock_toko', $inputan['stock_toko']);
            $this->db->where('stock_gudang', $inputan['stock_gudang']);
            $this->db->where('satuan', $inputan['satuan']);

            $barang = $this->db->get('barang')->row_array();
            if (empty($barang)) {
                $this->db->where('id_barang', $id_barang);
                $this->db->update('barang', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_barang($id_barang)
        {
            $this->db->where('id_barang', $id_barang);
            $this->db->delete('barang');
        }

        function hitung_barang()
        {
            $this->db->select('id_barang');
            $this->db->from('barang');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
 
    }
