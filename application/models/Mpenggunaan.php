 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpenggunaan extends CI_Model
    {

        function tampil_penggunaan()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = penggunaan_bahanbaku.id_user', 'left');
            $this->db->join('barang', 'barang.id_barang = penggunaan_bahanbaku.id_barang', 'left');
            $ambil = $this->db->get('penggunaan_bahanbaku');
            return $ambil->result_array();
        }

        function kode_penggunaan()
        {
            $this->db->select('RIGHT(penggunaan_bahanbaku.kode_penggunaan,3) as kode_penggunaan', FALSE);
            $this->db->order_by('kode_penggunaan', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('penggunaan_bahanbaku');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_penggunaan) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "PBK" . $batas;
            return $kodetampil;
        }


        function penggurangan($inputan)
        {

            $id_user = $inputan['id_user'];
            $id_barang = $inputan['id_barang'];
            $kode_penggunaan = $inputan['kode_penggunaan'];
            $tgl_pembuatan = $inputan['tgl_pembuatan'];
            $jumlah_penggunaan = $inputan['jumlah_penggunaan'];

            $this->db->where('kode_penggunaan', $kode_penggunaan);

            $penggunaan_bahanbaku = $this->db->get('penggunaan_bahanbaku')->row_array();


            if (empty($penggunaan_bahanbaku)) {
                $this->db->query("INSERT INTO `penggunaan_bahanbaku` (`id_penggunaanbahanbaku`, `id_user`, `id_barang`, `kode_penggunaan`, `tgl_pembuatan`, `jumlah_penggunaan`) VALUES (NULL, '$id_user', '$id_barang', '$kode_penggunaan', '$tgl_pembuatan', '$jumlah_penggunaan');");
                $this->db->query("UPDATE barang  SET stock_toko = stock_toko - $jumlah_penggunaan  WHERE id_barang = $id_barang");
                return 'sukses';
            } else {
                return 'gagal';
            }
        }
    }
