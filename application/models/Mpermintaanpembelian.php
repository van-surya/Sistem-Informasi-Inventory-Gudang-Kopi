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
            $id_user = $inputan['id_user'];
            $kode_permintaanpembelian = $inputan['kode_permintaanpembelian'];
            $tgl_permintaanpembelian = $inputan['tgl_permintaanpembelian'];
            $status_permintaanpembelian = $inputan['status_permintaanpembelian'];

            $this->db->where('id_user', $id_user);
            $this->db->where('kode_permintaanpembelian', $kode_permintaanpembelian);
            $this->db->where('tgl_permintaanpembelian', $tgl_permintaanpembelian);
            $this->db->where('status_permintaanpembelian', $status_permintaanpembelian);

            $permintaan_pembelian = $this->db->get('permintaan_pembelian')->row_array();
            if (empty($permintaan_pembelian)) {
                $this->db->insert('permintaan_pembelian', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }


        function detail_permintaanpembelian($id_permintaanpembelian)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_pembelian.id_user', 'left');
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $ambil = $this->db->get('permintaan_pembelian');
            return $ambil->row_array();
        }

        function hapus_permintaanpembelian($id_permintaanpembelian)
        {
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $this->db->delete('permintaan_pembelian');
        }

        function tampil_detailpermintaanpembelian($id_permintaanpembelian)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanpembelian.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $ambil = $this->db->get('detail_permintaanpembelian');

            return $ambil->result_array();
        }

        function detail_detailpermintaanpembelian($id_detailpermintaanpembelian)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanpembelian.id_barang', 'left');
            $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = detail_permintaanpembelian.id_permintaanpembelian', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_pembelian.id_user', 'left');
            
            $this->db->where('id_detailpermintaanpembelian', $id_detailpermintaanpembelian);
            $ambil = $this->db->get('detail_permintaanpembelian');
            return $ambil->row_array();
        }

        function simpan_detailpermintaanpembelian($inputan)
        {
            $id_permintaanpembelian = $inputan['id_permintaanpembelian'];
            $id_barang = $inputan['id_barang'];

            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $this->db->where('id_barang', $id_barang);

            $detail_permintaanpembelian = $this->db->get('detail_permintaanpembelian')->row_array();
            if (empty($detail_permintaanpembelian)) {
                $this->db->insert('detail_permintaanpembelian', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_detailpermintaanpembelian($id_detailpermintaanpembelian)
        {
            $this->db->where('id_detailpermintaanpembelian', $id_detailpermintaanpembelian);
            $this->db->delete('detail_permintaanpembelian');
        }


        function ubah_detailpermintaanpembelian($inputan,  $id_detailpermintaanpembelian)
        {
            $jumlah_permintaanpembelian = $inputan['jumlah_permintaanpembelian'];
            $this->db->query("UPDATE detail_permintaanpembelian SET jumlah_permintaanpembelian = $jumlah_permintaanpembelian WHERE detail_permintaanpembelian.id_detailpermintaanpembelian=$id_detailpermintaanpembelian");
        }


        function konfirmasi_permintaanpembelian($inputan, $id_permintaanpembelian)
        {
            $status = $inputan['status_permintaanpembelian'];
            $this->db->query("UPDATE permintaan_pembelian SET status_permintaanpembelian = '$status' WHERE permintaan_pembelian.id_permintaanpembelian = $id_permintaanpembelian");
        }

        function tampil_permintaanpembeliansetuju()
        {
            $ambil = $this->db->query("SELECT * FROM permintaan_pembelian LEFT JOIN user_petugas ON user_petugas.id_user = permintaan_pembelian.id_user
             WHERE status_permintaanpembelian ='Setuju' AND id_permintaanpembelian NOT IN (SELECT id_permintaanpembelian FROM po)");
            return $ambil->result_array();
        }

        function tampil_permintaanpembelianmeminta()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_pembelian.id_user', 'left');
            $this->db->where('status_permintaanpembelian', "Meminta");
            $ambil = $this->db->get('permintaan_pembelian');
            return $ambil->result_array();
        }
    }
