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
            $id_user = $inputan['id_user'];
            $kode_permintaanbarang = $inputan['kode_permintaanbarang'];
            $tgl_permintaanbarang = $inputan['tgl_permintaanbarang']; 
            $status_permintaanbarang = $inputan['status_permintaanbarang'];

            $this->db->where('id_user', $id_user);
            $this->db->where('kode_permintaanbarang', $kode_permintaanbarang);
            $this->db->where('tgl_permintaanbarang', $tgl_permintaanbarang);
            $this->db->where('status_permintaanbarang', $status_permintaanbarang); 

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

        function hapus_permintaanbarang($id_permintaanbarang)
        {
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $this->db->delete('permintaan_barang');
        }

        function tampil_detailpermintaanbarang($id_permintaanbarang)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanbarang.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $ambil = $this->db->get('detail_permintaanbarang');

            return $ambil->result_array();
        }


        function detail_detailpermintaanbarang($id_detailpermintaanbarang)
        {
            $this->db->join('barang', 'barang.id_barang = detail_permintaanbarang.id_barang', 'left');
            $this->db->join('permintaan_barang', 'permintaan_barang.id_permintaanbarang = detail_permintaanbarang.id_permintaanbarang', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');

            $this->db->where('id_detailpermintaanbarang', $id_detailpermintaanbarang);
            $ambil = $this->db->get('detail_permintaanbarang');
            return $ambil->row_array();
        }

        function simpan_detailpermintaanbarang($inputan)
        {
            $id_permintaanbarang = $inputan['id_permintaanbarang'];
            $id_barang = $inputan['id_barang'];
            $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];

            $this->db->where('id_permintaanbarang', $id_permintaanbarang);
            $this->db->where('id_barang', $id_barang);  

            $detail_permintaanbarang = $this->db->get('detail_permintaanbarang')->row_array();
            if (empty($detail_permintaanbarang)) {
                $this->db->query("INSERT INTO `detail_permintaanbarang` (`id_detailpermintaanbarang`, `id_permintaanbarang`, `id_barang`, `jumlah_permintaanbarang`) VALUES (NULL, '$id_permintaanbarang', '$id_barang', '$jumlah_permintaanbarang');");
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_detailpermintaanbarang($id_detailpermintaanbarang)
        {
            $this->db->where('id_detailpermintaanbarang', $id_detailpermintaanbarang);
            $this->db->delete('detail_permintaanbarang');
        }


        function ubah_detailpermintaanbarang($inputan,  $id_detailpermintaanbarang)
        {
            $jumlah_permintaanbarang = $inputan['jumlah_permintaanbarang'];
            $this->db->query("UPDATE detail_permintaanbarang SET jumlah_permintaanbarang = $jumlah_permintaanbarang WHERE detail_permintaanbarang.id_detailpermintaanbarang=$id_detailpermintaanbarang");
        }

        function konfirmasi_permintaanbarang($inputan, $id_permintaanbarang)
        {
            $status = $inputan['status_permintaanbarang'];
            $this->db->query("UPDATE permintaan_barang SET status_permintaanbarang = '$status' WHERE permintaan_barang.id_permintaanbarang = $id_permintaanbarang");
        }

        function tampil_permintaanbarangmeminta()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
            $this->db->where('status_permintaanbarang', "Meminta");
            $ambil = $this->db->get('permintaan_barang');
            return $ambil->result_array();
        }
        
    }
