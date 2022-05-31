 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpenggunaan extends CI_Model
    {

        function tampil_penggunaan()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = penggunaan.id_user', 'left');
            $ambil = $this->db->get('penggunaan');
            return $ambil->result_array();
        }

        function kode_penggunaan()
        {
            $this->db->select('RIGHT(penggunaan.kode_penggunaan,4) as kode_penggunaan', FALSE);
            $this->db->order_by('kode_penggunaan', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('penggunaan');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_penggunaan) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
            $kodetampil = "PBK" . $batas;
            return $kodetampil;
        }


        function tambah($inputan)
        {
            $id_user = $inputan['id_user'];
            $kode_penggunaan = $inputan['kode_penggunaan'];
            $tgl_penggunaan = $inputan['tgl_penggunaan'];

            $this->db->where('id_user', $id_user);
            $this->db->where('kode_penggunaan', $kode_penggunaan);
            $this->db->where('tgl_penggunaan', $tgl_penggunaan);

            $penggunaan = $this->db->get('penggunaan')->row_array();
            if (empty($penggunaan)) {
                $this->db->insert('penggunaan', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus($id_penggunaan)
        {
            $this->db->where('id_penggunaan', $id_penggunaan);
            $this->db->delete('penggunaan');
        }

        function detail_penggunaan($id_penggunaan)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = penggunaan.id_user', 'left');
            $this->db->where('id_penggunaan', $id_penggunaan);
            $ambil = $this->db->get('penggunaan');
            return $ambil->row_array();
        }


        function tampil_detailpenggunaan($id_penggunaan)
        {
            $this->db->join('barang', 'barang.id_barang = detail_penggunaan.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_penggunaan', $id_penggunaan);
            $ambil = $this->db->get('detail_penggunaan');

            return $ambil->result_array();
        }


        function simpan_detailpenggunaan($inputan)
        {
            $id_penggunaan = $inputan['id_penggunaan'];
            $id_barang = $inputan['id_barang'];
            $jumlah_penggunaan = $inputan['jumlah_penggunaan'];

            $this->db->where('id_penggunaan', $id_penggunaan);
            $this->db->where('id_barang', $id_barang);

            $detail_penggunaan = $this->db->get('detail_penggunaan')->row_array();
            if (empty($detail_penggunaan)) {
                $this->db->query("INSERT INTO `detail_penggunaan` (`id_detailpenggunaan`, `id_penggunaan`, `id_barang`, `jumlah_penggunaan`)
                 VALUES (NULL, '$id_penggunaan', '$id_barang', '$jumlah_penggunaan');");

                $this->db->query("UPDATE barang SET stock_toko = stock_toko - $jumlah_penggunaan WHERE id_barang = $id_barang");
                
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_detailpenggunaan($id_detailpenggunaan)
        {
            $this->db->query("UPDATE detail_penggunaan LEFT JOIN barang ON barang.id_barang = detail_penggunaan.id_barang
                            SET stock_toko = stock_toko + detail_penggunaan.jumlah_penggunaan WHERE detail_penggunaan.id_detailpenggunaan = $id_detailpenggunaan");

            $this->db->where('id_detailpenggunaan', $id_detailpenggunaan);
            $this->db->delete('detail_penggunaan');
        }


        function cetakdetail($id_penggunaan)
        {
            $this->db->join('barang', 'barang.id_barang = detail_penggunaan.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_penggunaan', $id_penggunaan);
            $ambil = $this->db->get('detail_penggunaan');
            return $ambil->result_array();
        }
    }
