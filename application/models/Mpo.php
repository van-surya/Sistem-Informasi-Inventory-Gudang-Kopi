 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpo extends CI_Model
    {

        function tampil_po()
        {
            $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
            $this->db->join('barang', 'barang.id_barang = permintaan_pembelian.id_barang', 'left');
            $this->db->join('user_petugas', 'user_petugas.id_user = po.id_user', 'left');
            $ambil = $this->db->get('po');
            return $ambil->result_array();
        }

        function kode_po()
        {
            $this->db->select('RIGHT(po.kode_po,3) as kode_po', FALSE);
            $this->db->order_by('kode_po', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('po');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_po) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "PO" . $batas;
            return $kodetampil;
        }


        function simpan_po($inputan)
        {
            $status = $inputan['status_po'];
            $id_permintaanpembelian = $inputan['id_permintaanpembelian'];
            $jumlah_po = $inputan['jumlah_po'];

            if ($status == 'Mengirim') {
                // Jalankan fungsi simpan inputan ke po
                $this->db->insert('po', $inputan);
                // Jalankan fungsi update status_permintaanpembelian 
                $this->db->query("UPDATE permintaan_pembelian SET status_permintaanpembelian = 'Setuju' WHERE id_permintaanpembelian=$id_permintaanpembelian");
            } elseif ($status == 'Ditolak') {
                //jalankan fungsi simpan inputan ke po
                $this->db->insert('po', $inputan);
                // jalankan fungsi update permintaan pembelian 
                $this->db->query("UPDATE permintaan_pembelian SET status_permintaanpembelian = 'Ditolak' WHERE id_permintaanpembelian=$id_permintaanpembelian");
            }
        }

        function hapus_po($id_po)
        {
            $this->db->where('id_po', $id_po);
            $this->db->delete('po');
        }
    }
