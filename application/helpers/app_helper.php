<?php

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
