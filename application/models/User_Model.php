<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function cari_usia($usia)
    {
        if ($usia >= 32) {
            $nilUsia = 5;
        } else if ($usia <= 31 && $usia >= 29) {
            $nilUsia = 4;
        } else if ($usia <= 28 && $usia >= 26) {
            $nilUsia = 3;
        } else if ($usia <= 25 && $usia >= 23) {
            $nilUsia = 2;
        } else if ($usia <= 22 && $usia >= 18) {
            $nilUsia = 1;
        }

        return $nilUsia;
    }

    public function inputKeahlian($id_user)
    {
        $keahlian = $this->input->post('user_keahlian');
        foreach ($keahlian as $item) {
            $inputKeahlian = [
                'user_id' => $id_user,
                'keahlian_id' => $item
            ];
            $this->db->insert('keahlian_user', $inputKeahlian);
        }
    }

    public function inputAlternatifUser($id_user)
    {
        $this->db->where('nama_kriteria !=', 'Lokasi');
        $this->db->where('nama_kriteria !=', 'Keahlian');
        $kriteria = $this->db->get('kriteria')->result_array();

        foreach ($kriteria as $row) {
            if ($row['nama_kriteria'] == 'Pendidikan') {
                $input = explode('|', $this->input->post('pendidikan_user'));
                $nilaiUser = $input[0];
                $parameter = $input[1];
            } else if ($row['nama_kriteria']  == "Pengalaman") {
                $input = explode('|', $this->input->post('pengalaman_user'));
                $nilaiUser = $input[0];
                $parameter = $input[1];
            } elseif ($row['nama_kriteria'] == 'Usia') {
                $strUsia = $this->input->post('usia_user');
                $usia = (int)$strUsia;
                $parameter = $usia;
                $nilaiUser = $this->cari_usia($usia);
            }

            $nilai = [
                'user_id' => $id_user,
                'kriteria_id' => $row['id_kriteria'],
                'parameter' => $parameter,
                'nilai_user' => $nilaiUser,
            ];
            $this->db->insert('nilai_user', $nilai);
        }
    }

    public function bandingKeahlian($id_user, $id_alternatif)
    {
        $keahlianAlternatif = $this->db->get_where('keahlian_alternatif', ['alternatif_id' => $id_alternatif])->result_array();
        $keahlianUser = $this->db->get_where('keahlian_user', ['user_id' => $id_user])->result_array();
        $arrayKhAltr = [];
        $jumlah = 0;
        $nilaiAlt = 0;
        foreach ($keahlianAlternatif as $ka) {
            $arrayKhAltr[] = $ka['keahlian_id'];
        }
        foreach ($keahlianUser as $ku) {
            if (in_array($ku['keahlian_id'], $arrayKhAltr)) {
                $jumlah = $jumlah + 1;
            }
        }

        $beda = count($arrayKhAltr) - $jumlah;
        if ($jumlah == count($arrayKhAltr)) {
            $nilaiAlt = 5;
        } elseif ($beda == 1) {
            $nilaiAlt = 4;
        } elseif ($beda == 2) {
            $nilaiAlt = 3;
        } elseif ($beda == 3) {
            $nilaiAlt = 2;
        } else {
            $nilaiAlt = 1;
        }

        return $nilaiAlt;
    }

    public function bandingLokasi($id_user, $id_alternatif)
    {
        $LokUser = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        $LokAlt = $this->db->get_where('alternatif', ['id_alternatif' => $id_alternatif])->row_array();

        $kecAlt = $LokAlt['kecamatan_id'];
        $kecUser = $LokUser['kecamatan_id'];

        if ($kecAlt == $kecUser) {
            $nilaiAlt = 1;
        } else {
            $this->db->where('asal_kec', $kecUser);
            $this->db->where('tujuan_kec', $kecAlt);
            $data = $this->db->get('jarak_kecamatan')->row_array();


            if ($data == NULL) {
                $this->db->where('asal_kec', $kecAlt);
                $this->db->where('tujuan_kec', $kecUser);
                $data = $this->db->get('jarak_kecamatan')->row_array();
                $jarak = $data['jarak'];
            } else {
                $jarak = $data['jarak'];
            }

            if ($jarak <= 5) {
                $nilaiAlt = 1;
            } elseif ($jarak >= 50) {
                $nilaiAlt = 10;
            } else {
                $nilaiAlt = ceil($jarak / 5);
            }
        }

        return $nilaiAlt;
    }

    public function bandingUsia($nilaiUser, $nilaiAlternatif)
    {
        $nilaiAlt = 5;
        if ($nilaiAlternatif >= $nilaiUser) {
            $nilaiAlt = $nilaiAlternatif;
        } else {
            $nilaiAlt = 1;
        }

        return $nilaiAlt;
    }

    public function bandingPendPeng($nilaiUser, $nilaiAlternatif)
    {
        $nilaiAlt = 10;
        if ($nilaiUser == $nilaiAlternatif) {
            $nilaiAlt = $nilaiAlt;
        } elseif ($nilaiUser > $nilaiAlternatif) {
            $nilaiAlt = $nilaiAlt - (($nilaiUser - $nilaiAlternatif) * 1);
        } elseif ($nilaiUser < $nilaiAlternatif) {
            $nilaiAlt = $nilaiAlt - (($nilaiAlternatif - $nilaiUser) * 2);
        }
        return $nilaiAlt;
    }


    public function bandingAlternatif($id_user, $id_alternatif, $id_kriteria)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = na.kriteria_id');
        $this->db->where('na.alternatif_id', $id_alternatif);
        $this->db->where('na.kriteria_id', $id_kriteria);
        $alt = $this->db->get('nilai_alternatif na')->row_array();

        // Bandingkan Nilai Alternatif Dengan Nilai User
        $this->db->where('kriteria_id', $id_kriteria);
        $user = $this->db->get_where('nilai_user', ['user_id' => $id_user])->row_array();



        // $nilaiAlt = 0;
        if ($user['kriteria_id'] == $alt['kriteria_id']) {
            if ($alt['nama_kriteria'] == 'Usia') {
                $nilaiAlt = $this->bandingUsia($user['nilai_user'], $alt['nilai_alternatif']);
            } elseif ($alt['nama_kriteria'] == 'Pendidikan') {
                $nilaiAlt = $this->bandingPendPeng($user['nilai_user'], $alt['nilai_alternatif']);
            } elseif ($alt['nama_kriteria'] == 'Pengalaman') {
                $nilaiAlt = $this->bandingPendPeng($user['nilai_user'], $alt['nilai_alternatif']);
            }
        }

        return $nilaiAlt;
    }

    public function inputNilaiRekomendasi($id_user, $kategori)
    {
        $kriteria = $this->db->get('kriteria')->result_array();
        $alternatif = $this->db->get_where('alternatif', ['kategori_id' => $kategori])->result_array();
        foreach ($kriteria as $row) {

            $idKriteria = $row['id_kriteria'];
            $namaKriteria = $row['nama_kriteria'];

            foreach ($alternatif as $alt) {

                // Input Nilai Rekomendasi Kriteria Keahlian
                if ($namaKriteria == 'Keahlian') {
                    $nilaiAlt = $this->bandingKeahlian($id_user, $alt['id_alternatif']);

                    // Input Nilai Rekomendasi Kriteria Lokasi
                } elseif ($namaKriteria == 'Lokasi') {
                    $nilaiAlt = $this->bandingLokasi($id_user, $alt['id_alternatif']);
                }
                // Input Kriteria Pendidikan, Pengalaman dan Usia
                else {
                    $nilaiAlt = $this->bandingAlternatif($id_user, $alt['id_alternatif'], $idKriteria);
                }
                $nilaiRekomendasi = [
                    'alternatif_id' => $alt['id_alternatif'],
                    'kriteria_id' => $idKriteria,
                    'nilai_alternatif' => $nilaiAlt,
                    'user_id' => $id_user
                ];

                $this->db->insert('nilai_rekomendasi', $nilaiRekomendasi);
            }
        }
    }

    public function ambil_kriteria()
    {
        $array = array('nama_kriteria !=' => 'Lokasi', 'nama_kriteria !=' => 'Keahlian', 'nama_kriteria !=' => 'Usia');
        $this->db->where($array);
        return $this->db->get('kriteria')->result_array();
    }

    public function tambah_user()
    {
        // Update Kategori
        $id_user = $this->input->post('id_user');
        $kategori = $this->input->post('kategori_user');
        $data = [
            'kategori_id' => $kategori,
            "gender" => $this->input->post('gender'),
            'kabupaten_id' => $this->input->post('kabupaten'),
            'kecamatan_id' => $this->input->post('kecamatan')
        ];

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        // Input Keahlian
        $this->inputKeahlian($id_user);

        // Input Nilai User
        $this->inputAlternatifUser($id_user);

        // Input Nilai Rekomendasi
        $this->inputNilaiRekomendasi($id_user, $kategori);
    }


    public function getKriteriaUser($id_user)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = nu.kriteria_id');
        return $this->db->get_where('nilai_user nu', ['user_id' => $id_user])->result_array();
    }


    public function UpdateKriteriaUser()
    {
        // Update Kategori
        $id_user = $this->input->post('id_user');
        $kategori = $this->input->post('kategori_user');
        $data = [
            'kategori_id' => $kategori,
            "gender" => $this->input->post('gender'),
            'kabupaten_id' => $this->input->post('kabupaten'),
            'kecamatan_id' => $this->input->post('kecamatan')
        ];

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);

        $this->db->where('user_id', $id_user);
        $this->db->delete('keahlian_user');

        // Input Keahlian
        $this->inputKeahlian($id_user);

        // Update Nilai Alternatif
        $this->updateNilaiAlternatif($id_user);

        // Update Nilai Rekomendasi

        $this->updateNilaiRekomendasi($id_user, $kategori);
    }

    public function updateNilaiAlternatif($id_user)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = nu.kriteria_id');
        $kriteria = $this->db->get_where('nilai_user nu', ['nu.user_id' => $id_user])->result_array();
        foreach ($kriteria as $row) {
            $namaKriteria = $row['nama_kriteria'];
            $idNilUser = $row['id_nil_user'];
            if ($namaKriteria == 'Pendidikan') {
                $input = explode('|', $this->input->post('pendidikan_user'));
                $nilaiUser = $input[0];
                $parameter = $input[1];
            } else if ($namaKriteria == "Pengalaman") {
                $input = explode('|', $this->input->post('pengalaman_user'));
                $nilaiUser = $input[0];
                $parameter = $input[1];
            } else if ($namaKriteria  == "Usia") {
                $strUsia = $this->input->post('usia_user');
                $usia = (int)$strUsia;
                $parameter = $usia;
                $nilaiUser = $this->cari_usia($usia);
            }

            $nilai = [
                'kriteria_id' => $row['id_kriteria'],
                'parameter' => $parameter,
                'nilai_user' => $nilaiUser,
            ];
            $this->db->where('id_nil_user', $idNilUser);
            $this->db->update('nilai_user', $nilai);
        }
    }

    public function updateNilaiRekomendasi($id_user, $kategori)
    {
        $kriteria = $this->db->get('kriteria')->result_array();
        $alternatif = $this->db->get_where('alternatif', ['kategori_id' => $kategori])->result_array();
        foreach ($kriteria as $row) {

            $idKriteria = $row['id_kriteria'];
            $namaKriteria = $row['nama_kriteria'];

            foreach ($alternatif as $alt) {

                // Input Nilai Rekomendasi Kriteria Keahlian
                if ($namaKriteria == 'Keahlian') {
                    $nilaiAlt = $this->bandingKeahlian($id_user, $alt['id_alternatif']);

                    // Input Nilai Rekomendasi Kriteria Lokasi
                } elseif ($namaKriteria == 'Lokasi') {
                    $nilaiAlt = $this->bandingLokasi($id_user, $alt['id_alternatif']);
                }
                // Input Kriteria Pendidikan, Pengalaman dan Usia
                else {
                    $nilaiAlt = $this->bandingAlternatif($id_user, $alt['id_alternatif'], $idKriteria);
                }
                $nilaiRekomendasi = [
                    'nilai_alternatif' => $nilaiAlt,
                ];

                $this->db->where('alternatif_id', $alt['id_alternatif']);
                $this->db->where('kriteria_id', $idKriteria);
                $this->db->where('user_id', $id_user);
                $this->db->update('nilai_rekomendasi', $nilaiRekomendasi);
            }
        }
    }


    // PROFILE
    public function updateProfile()
    {
        $id_user = $this->input->post('id_user');
        $data  = [
            'nama_lengkap' => htmlspecialchars(trim($this->input->post('nama_lengkap'))),
            'password' => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT))
        ];

        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
    }
}
