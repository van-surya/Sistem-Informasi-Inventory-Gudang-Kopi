<?php

function notif_permintaanbarang()
{
    $CI = &get_instance();
    $CI->db->join('user_petugas', 'user_petugas.id_user = permintaan_barang.id_user', 'left');
    $CI->db->where('status_permintaanbarang', "Meminta");
    $CI->db->order_by('id_permintaanbarang', 'ASC');
    $CI->db->limit('3');
    $ambil = $CI->db->get('permintaan_barang');
    return $ambil->result_array();
}

function notif_permintaanpembelian()
{
    $CI = &get_instance();
    $ambil = $CI->db->query("SELECT nama, po.id_permintaanpembelian, kode_permintaanpembelian, tgl_permintaanpembelian 
            FROM permintaan_pembelian  LEFT JOIN user_petugas ON user_petugas.id_user = permintaan_pembelian.id_user
            LEFT JOIN po ON po.id_permintaanpembelian = permintaan_pembelian.id_permintaanpembelian
            WHERE po.status_po = 'Mengirim' AND po.id_permintaanpembelian 
            NOT IN (SELECT id_permintaanpembelian FROM barang_masuk) ORDER BY id_permintaanpembelian ASC LIMIT 3");
    return $ambil->result_array();
}

function notif_purchasing()
{
    $CI = &get_instance();
    $CI->db->join('user_petugas', 'user_petugas.id_user = permintaan_pembelian.id_user', 'left');
    $CI->db->where('status_permintaanpembelian', "Meminta");
    $CI->db->order_by('id_permintaanpembelian', 'ASC');
    $CI->db->limit('3');
    $ambil = $CI->db->get('permintaan_pembelian');
    return $ambil->result_array();
}

function tanggal($string_tanggal)
{
    return date('d/m/Y', strtotime($string_tanggal));
}

function tanggal_waktu($string_tanggal_waktu)
{
    return date('d M Y,H:i', strtotime($string_tanggal_waktu));
}

function jammenit($string_jammenit)
{
    return date('H:i', strtotime($string_jammenit));
}
