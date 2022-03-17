 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpo extends CI_Model
    {

        function tampil_po()
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = po.id_user', 'left');
            $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
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
            $id_permintaanpembelian = $inputan['id_permintaanpembelian'];
            $this->db->where('id_permintaanpembelian', $id_permintaanpembelian);
            $po = $this->db->get('po')->row_array();

            if (empty($po)) {
                $this->db->insert('po', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_po($id_po)
        {
            $this->db->join('user_petugas', 'user_petugas.id_user = po.id_user', 'left');
            $this->db->where('id_po', $id_po);
            $ambil = $this->db->get('po');
            return $ambil->row_array();
        }

        function tampil_detailpo($id_po)
        {

            // $this->db->join('permintaan_pembelian', 'permintaan_pembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
            $this->db->join('detail_permintaanpembelian', 'detail_permintaanpembelian.id_permintaanpembelian = po.id_permintaanpembelian', 'left');
            $this->db->join('barang', 'barang.id_barang = detail_permintaanpembelian.id_barang', 'left');
            $this->db->join('kategori', 'kategori.id_kategori = barang.id_kategori', 'left');
            $this->db->join('supplier', 'supplier.id_supplier = barang.id_supplier', 'left');
            $this->db->where('id_po', $id_po);
            $ambil = $this->db->get('po');
            return $ambil->result_array();
        } 
    }
