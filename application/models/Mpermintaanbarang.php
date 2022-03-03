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


        function tampil_detail_permintaanbarang($id_permintaanbarang)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanbarang.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $ambil = $this->db->get('detail_permintaanbarang');
            return $ambil->result_array();
        }

        function simpan_detailpermintaanbarang($inputan)
        {
            $this->db->insert('detail_permintaanbarang', $inputan);
        }

        function tampil_barangtidakterpilih($id_permintaanbarang)
        {
            $query = $this->db->query("SELECT id_barang,nama_barang, stock_toko, satuan FROM barang
                    LEFT JOIN kategori ON kategori.id_kategori = barang.id_kategori
                    WHERE id_barang NOT IN (SELECT id_barang FROM detail_permintaanbarang WHERE id_permintaanbarang = '$id_permintaanbarang')");
            return $query->result_array();
        }

        function hapus_detailpermintaanbarang($id_barang)
        {
            $this->db->where('id_barang', $id_barang);
            $this->db->delete('detail_permintaanbarang');
        }
    }
