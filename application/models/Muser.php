 <?php

    defined('BASEPATH') or exit('No direct script access allowed');

    class Muser extends CI_Model
    {

        public function login($inputan)
        {
            $email = $inputan['email'];
            $password = $inputan['password'];
            $password = sha1($password);

            //cek ke tb user_petugas ada atau tdk data  dgn email dan password tsb.
            $this->db->where('email', $email);
            $this->db->where('password', $password);
            $ambil = $this->db->get('user_petugas');

            //cek dlm bentuk array
            $petugas = $ambil->row_array();

            // jika petugas tidak kosong 
            if (!empty($petugas)) {
                if ($petugas['level'] == 'admin') {
                    $this->session->set_userdata("admin", $petugas);
                    return "admin";
                } elseif ($petugas['level'] == 'store') {
                    $this->session->set_userdata("store", $petugas);
                    return "store";
                } elseif ($petugas['level'] == 'purchasing') {
                    $this->session->set_userdata("purchasing", $petugas);
                    return "purchasing";
                } elseif ($petugas['level'] == 'gudang') {
                    $this->session->set_userdata("gudang", $petugas);
                    return "gudang";
                } else {
                    return "gagal";
                }
            }
        }

        function tampil_user()
        {
            $ambil = $this->db->get('user_petugas');
            return $ambil->result_array();
        }


        function simpan_user($inputan)
        {
            //config library upload
            $config['upload_path'] = './assets/img/user/';
            $config['allowed_types'] = 'png|jpg|jpeg|JPEG|JPG|PNG';
            $this->upload->initialize($config);

            // ambil pass dari inputan
            $pass_inputan = $inputan['password'];

            // enkripsi pakai SHA1
            $pass_enkrip = sha1($pass_inputan);

            // masukan pass yg sudah di enkrip ke dalam array inputan index password
            $inputan['password'] = $pass_enkrip;

            //proses upload
            $this->upload->do_upload("foto_user");

            //mendapatkan nama foto yg diupload
            $inputan["foto_user"] = $this->upload->data("file_name");

            //query insert ke tabel guru
            $this->db->insert('user_petugas', $inputan);
        }

 
        function detail_user($id_user)
        {
            $this->db->where('id_user', $id_user);
            $ambil = $this->db->get('user_petugas');
            return $ambil->row_array();
        }

        function ubah_user($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            // cek apakah ada file yang di upload
            // kalau tidak kosong, jalankan proses upload foto/ubah foto
            if (!empty($_FILES['foto_user']['name'])) {

                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'png|jpg|jpeg|JPEG|JPG|PNG';
                $this->upload->initialize($config);

                //proses upload
                $ngupload = $this->upload->do_upload("foto_user");

                //mendapatkan nama foto yg diupload
                if ($ngupload) {
                    $inputan["foto_user"] = $this->upload->data("file_name");

                    // cari file lampiran lama 
                    $user_petugas = $this->detail_user($id_user);
                    $foto_user_lama = $user_petugas['foto_user'];

                    // lokasi file lama 
                    $lokasi = FCPATH . "assets/img/user/$foto_user_lama";
                    if (file_exists($lokasi) and !empty($foto_user_lama)) {
                        unlink($lokasi);
                    }
                }
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);
            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata('user_petugas', $user_petugas);
        }


        function ubah_profilgudang($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            // cek apakah ada file yang di upload
            // kalau tidak kosong, jalankan proses upload foto/ubah foto
            if (!empty($_FILES['foto_user']['name'])) {

                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->upload->initialize($config);

                //proses upload
                $ngupload = $this->upload->do_upload("foto_user");

                //mendapatkan nama foto yg diupload
                if ($ngupload) {
                    $inputan["foto_user"] = $this->upload->data("file_name");

                    // cari file lampiran lama 
                    $user_petugas = $this->detail_user($id_user);
                    $foto_user_lama = $user_petugas['foto_user'];

                    // lokasi file lama 
                    $lokasi = FCPATH . "assets/img/user/$foto_user_lama";
                    // cek apakah ada file lama di folder trstb
                    if (file_exists($lokasi) and !empty($foto_user_lama)) {
                        // kalau ada filenya
                        // hapus file lama dari folder assets/img/user
                        unlink($lokasi);
                    }
                }
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);

            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata("gudang", $user_petugas);
        }

        function ubah_profilstore($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            // cek apakah ada file yang di upload
            // kalau tidak kosong, jalankan proses upload foto/ubah foto
            if (!empty($_FILES['foto_user']['name'])) {

                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->upload->initialize($config);

                //proses upload
                $ngupload = $this->upload->do_upload("foto_user");

                //mendapatkan nama foto yg diupload
                if ($ngupload) {
                    $inputan["foto_user"] = $this->upload->data("file_name");

                    // cari file lampiran lama 
                    $user_petugas = $this->detail_user($id_user);
                    $foto_user_lama = $user_petugas['foto_user'];

                    // lokasi file lama 
                    $lokasi = FCPATH . "assets/img/user/$foto_user_lama";
                    // cek apakah ada file lama di folder trstb
                    if (file_exists($lokasi) and !empty($foto_user_lama)) {
                        // kalau ada filenya
                        // hapus file lama dari folder assets/img/user
                        unlink($lokasi);
                    }
                }
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);

            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata("store", $user_petugas);
        }

        function ubah_profilpurchasing($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            // cek apakah ada file yang di upload
            // kalau tidak kosong, jalankan proses upload foto/ubah foto
            if (!empty($_FILES['foto_user']['name'])) {

                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->upload->initialize($config);

                //proses upload
                $ngupload = $this->upload->do_upload("foto_user");

                //mendapatkan nama foto yg diupload
                if ($ngupload) {
                    $inputan["foto_user"] = $this->upload->data("file_name");

                    // cari file lampiran lama 
                    $user_petugas = $this->detail_user($id_user);
                    $foto_user_lama = $user_petugas['foto_user'];

                    // lokasi file lama 
                    $lokasi = FCPATH . "assets/img/user/$foto_user_lama";
                    // cek apakah ada file lama di folder trstb
                    if (file_exists($lokasi) and !empty($foto_user_lama)) {
                        // kalau ada filenya
                        // hapus file lama dari folder assets/img/user
                        unlink($lokasi);
                    }
                }
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);

            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata("purchasing", $user_petugas);
        }

        function ubah_profiladmin($inputan, $id_user)
        {
            // jika inputan['password'] kosong
            if (empty($inputan['password'])) {
                // buang dari array inputan agar tidak di update
                unset($inputan['password']);
            } else {

                // ambil pass dari inputan
                $pass_inputan = $inputan['password'];

                // enkripsi pakai SHA1
                $pass_enkrip = sha1($pass_inputan);

                // masukan pass yg sudah di enkrip ke dalam array inputan index password
                $inputan['password'] = $pass_enkrip;
            }

            // cek apakah ada file yang di upload
            // kalau tidak kosong, jalankan proses upload foto/ubah foto
            if (!empty($_FILES['foto_user']['name'])) {

                $config['upload_path'] = './assets/img/user/';
                $config['allowed_types'] = 'gif|png|jpg|jpeg';
                $this->upload->initialize($config);

                //proses upload
                $ngupload = $this->upload->do_upload("foto_user");

                //mendapatkan nama foto yg diupload
                if ($ngupload) {
                    $inputan["foto_user"] = $this->upload->data("file_name");

                    // cari file lampiran lama 
                    $user_petugas = $this->detail_user($id_user);
                    $foto_user_lama = $user_petugas['foto_user'];

                    // lokasi file lama 
                    $lokasi = FCPATH . "assets/img/user/$foto_user_lama";
                    // cek apakah ada file lama di folder trstb
                    if (file_exists($lokasi) and !empty($foto_user_lama)) {
                        // kalau ada filenya
                        // hapus file lama dari folder assets/img/user
                        unlink($lokasi);
                    }
                }
            }

            $this->db->where('id_user', $id_user);
            $this->db->update('user_petugas', $inputan);

            // ambil data user_petugas yg sedang barusan di ubah
            $user_petugas = $this->detail_user($id_user);

            // update session user_petugas dengan data user_petugas yang ter update
            $this->session->set_userdata("admin", $user_petugas);
        }


        function hapus_user($id_user)
        {
            //untuk mengapus file photo bth nama file
            //dapatkan dulu data user_petugas berdasarkan id
            $this->db->where('id_user', $id_user);
            $ambil = $this->db->get('user_petugas');
            $user_petugas = $ambil->row_array();

            $nama_foto = $user_petugas['foto_user'];

            //jk file ada, maka dihapus
            if (!empty($nama_foto) && file_exists(FCPATH . "assets/img/user/" . $nama_foto)) {
                unlink(FCPATH . "assets/img/user/" . $nama_foto);
            }

            $this->db->where('id_user', $id_user);
            $this->db->delete('user_petugas');
        }

        function hitung_user()
        {
            $this->db->select('id_user');
            $this->db->from('user_petugaS');
            $query = $this->db->get();
            $total = $query->num_rows();
            return $total;
        }
    }