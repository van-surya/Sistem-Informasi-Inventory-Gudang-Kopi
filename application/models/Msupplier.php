 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Msupplier extends CI_Model
    {

        function tampil_supplier()
        {
            $ambil = $this->db->get('supplier');
            return $ambil->result_array();
        }

        function kode_supplier()
        {
            $this->db->select('RIGHT(supplier.kode_supplier,3) as kode_supplier', FALSE);
            $this->db->order_by('kode_supplier', 'DESC');
            $this->db->limit(1);

            $query = $this->db->get('supplier');
            if ($query->num_rows() <> 0) {
                $data = $query->row();
                $kode = intval($data->kode_supplier) + 1;
            } else {
                $kode = 1;
            }

            $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
            $kodetampil = "SP" . $batas;
            return $kodetampil;
        }

        function simpan_supplier($inputan)
        {
            $kode_supplier = $inputan['kode_supplier'];
            $nama_supplier = $inputan['nama_supplier'];
            $alamat_supplier = $inputan['alamat_supplier'];

            $this->db->where('kode_supplier', $kode_supplier);
            $this->db->where('nama_supplier', $nama_supplier); 
            $this->db->where('alamat_supplier', $alamat_supplier);

            $supplier = $this->db->get('supplier')->row_array();
            if (empty($supplier)) {
                $this->db->insert('supplier', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function detail_supplier($id_supplier)
        {
            $this->db->where('id_supplier', $id_supplier);
            $ambil = $this->db->get('supplier');
            return $ambil->row_array();
        }

        function ubah_supplier($inputan, $id_supplier)
        {
            $this->db->where('kode_supplier', $inputan['kode_supplier']);
            $this->db->where('nama_supplier', $inputan['nama_supplier']);
            $this->db->where('alamat_supplier', $inputan['alamat_supplier']);

            $supplier = $this->db->get('supplier')->row_array();
            if (empty($supplier)) {
                $this->db->where('id_supplier', $id_supplier);
                $this->db->update('supplier', $inputan);
                return 'sukses';
            } else {
                return 'gagal';
            }
        }

        function hapus_supplier($id_supplier)
        {
            $this->db->where('id_supplier', $id_supplier);
            $this->db->delete('supplier');
        }

        function hitung_supplier()
        {
            $this->db->select('id_supplier');
            $this->db->from('supplier');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }

    }
