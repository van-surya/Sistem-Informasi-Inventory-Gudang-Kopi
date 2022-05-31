<?php

/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2019, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (https://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2019, British Columbia Institute of Technology (https://bcit.ca/)
 * @license	https://opensource.org/licenses/MIT	MIT License
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') or exit('No direct script access allowed');

$lang['form_validation_required']        = '{field} wajib diisi.';
$lang['form_validation_isset']            = '{field} harus memiliki nilai.';
$lang['form_validation_valid_email']        = '{field} harus berisi alamat email yang valid.';
$lang['form_validation_valid_emails']        = '{field} harus berisi semua alamat email yang valid.';
$lang['form_validation_valid_url']        = '{field} harus berisi URL yang valid.';
$lang['form_validation_valid_ip']        = '{field} harus berisi IP yang valid.';
$lang['form_validation_valid_base64']        = '{field} harus berisi string Base64 yang valid.';
$lang['form_validation_min_length']        = '{field} harus memiliki panjang setidaknya {param} karakter.';
$lang['form_validation_max_length']        = '{field} tidak boleh melebihi {param} karakter.';
$lang['form_validation_exact_length']        = 'Panjang bidang {field} harus tepat {param} karakter.';
$lang['form_validation_alpha']            = '{field} hanya boleh berisi karakter alfabet.';
$lang['form_validation_alpha_numeric']        = '{field} hanya boleh berisi karakter alfanumerik.';
$lang['form_validation_alpha_numeric_spaces']    = '{field} hanya boleh berisi karakter alfanumerik dan spasi.';
$lang['form_validation_alpha_dash']        = '{field} hanya boleh berisi karakter alfanumerik, garis bawah, dan tanda hubung.';
$lang['form_validation_numeric']        = '{field} hanya boleh berisi angka.';
$lang['form_validation_is_numeric']        = '{field} hanya boleh berisi karakter numerik.';
$lang['form_validation_integer']        = '{field} harus berisi bilangan bulat.';
$lang['form_validation_regex_match']        = '{field} tidak dalam format yang benar.';
$lang['form_validation_matches']        = '{field} tidak cocok dengan bidang {param}.';
$lang['form_validation_differs']        = '{field} harus berbeda dari bidang {param}.';
$lang['form_validation_is_unique']         = '{field} Sudah ada.';
$lang['form_validation_is_natural']        = '{field} hanya boleh berisi angka.';
$lang['form_validation_is_natural_no_zero']    = '{field} hanya boleh berisi angka dan harus lebih besar dari nol.';
$lang['form_validation_decimal']        = '{field} harus berisi angka desimal.';
$lang['form_validation_less_than']        = '{field} harus berisi angka yang kurang dari {param}.';
$lang['form_validation_less_than_equal_to']    = '{field} harus berisi angka yang kurang dari atau sama dengan {param}.';
$lang['form_validation_greater_than']        = '{field} harus berisi angka yang lebih besar dari {param}.';
$lang['form_validation_greater_than_equal_to']    = 'Bidang {field} harus berisi angka yang lebih besar dari atau sama dengan {param}.';
$lang['form_validation_error_message_not_set']    = 'Tidak dapat mengakses pesan kesalahan yang sesuai dengan nama bidang Anda {bidang}.';
$lang['form_validation_in_list']        = 'Bidang {field} harus salah satu dari: {param}.';
