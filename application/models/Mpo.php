 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Mpo extends CI_Model
    {

        function tampil_po()
        {
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
            $kodetampil = "P" . $batas;
            return $kodetampil;
        }

        function simpan_po($inputan)
        {
            $kode_po = $inputan['kode_po'];
            $id_user = $inputan['id_user'];
            $tgl_po = $inputan['tgl_po'];

            $this->db->where('kode_po', $kode_po);
            $this->db->where('id_user', $id_user);
            $this->db->where('tgl_po', $tgl_po);

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


        function hapus_po($id_po)
        {
            $this->db->where('id_po', $id_po);
            $this->db->delete('po');
        }
    }
