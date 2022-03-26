<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif_Model extends CI_Model
{
    // Alternatif Start
    public function ambil_alternatif()
    {
        $this->db->join('kategori kt', 'kt.id_kategori = al.kategori_id');
        return $this->db->get('alternatif al')->result_array();
    }

    public function getAlternatif($idAlternatif)
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        return $this->db->get_where('alternatif alt', ['alt.id_alternatif' => $idAlternatif])->row_array();
    }

    public function getKriteriaAlternatif($idAlternatif)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = na.kriteria_id');
        return $this->db->get_where('nilai_alternatif na', ['na.alternatif_id' => $idAlternatif])->result_array();
    }

    // Function Nilai Alternatif
    public function cari_usia($usia)
    {
        if ($usia >= 32) {
            $nilaiAlt = 5;
        } else if ($usia <= 31 && $usia >= 29) {
            $nilaiAlt = 4;
        } else if ($usia <= 28 && $usia >= 26) {
            $nilaiAlt = 3;
        } else if ($usia <= 25 && $usia >= 23) {
            $nilaiAlt = 2;
        } else if ($usia <= 22 && $usia >= 18) {
            $nilaiAlt = 1;
        }

        return $nilaiAlt;
    }

    public function inputKeahlian($id_alternatif)
    {
        $keahlian = $this->input->post('keahlian');
        foreach ($keahlian as $item) {
            $inputKeahlian = [
                'alternatif_id' => $id_alternatif,
                'keahlian_id' => $item
            ];
            $this->db->insert('keahlian_alternatif', $inputKeahlian);
        }
    }

    // Nilai Alternatif
    public function inputNilaiAlternatif($id_alternatif)
    {
        $this->db->where('nama_kriteria !=', 'Lokasi');
        $this->db->where('nama_kriteria !=', 'Keahlian');
        $kriteria = $this->db->get('kriteria')->result_array();
        foreach ($kriteria as $row) {
            if ($row['nama_kriteria'] == "Pendidikan") {
                $input = explode('|', $this->input->post('pendidikan'));
                $nilaiAlt = $input[0];
                $parameter = $input[1];
            } else if ($row['nama_kriteria'] == "Pengalaman") {
                $input = explode('|', $this->input->post('pengalaman'));
                $nilaiAlt = $input[0];
                $parameter = $input[1];
            } else if ($row['nama_kriteria'] == "Usia") {
                $input = $this->input->post('usia');
                $usia = (int)$input;
                $parameter = $usia;
                $nilaiAlt = $this->cari_usia($usia);
            }
            $dataNilAlt = [
                'alternatif_id' => $id_alternatif,
                'kriteria_id' => $row['id_kriteria'],
                'parameter' => $parameter,
                'nilai_alternatif' => $nilaiAlt
            ];
            $this->db->insert('nilai_alternatif', $dataNilAlt);
        }
    }

    public function updateNilaiAlternatif($id_alternatif)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = na.kriteria_id');
        $kriteria = $this->db->get_where('nilai_alternatif na', ['na.alternatif_id' => $id_alternatif])->result_array();
        foreach ($kriteria as $row) {
            $namaKriteria = $row['nama_kriteria'];
            $idNilAlt = $row['id_nilai_alternatif'];
            if ($namaKriteria == "Pendidikan") {
                $input = explode('|', $this->input->post('pendidikan'));
                $nilaiAlt = $input[0];
                $parameter = $input[1];
            } else if ($namaKriteria == "Pengalaman") {
                $input = explode('|', $this->input->post('pengalaman'));
                $nilaiAlt = $input[0];
                $parameter = $input[1];
            } elseif ($namaKriteria == "Usia") {
                $strUsia = $this->input->post('usia');
                $usia = (int)$strUsia;
                $parameter = $usia;
                $nilaiAlt = $this->cari_usia($usia);
            }

            $nilai = [
                'kriteria_id' => $row['id_kriteria'],
                'parameter' => $parameter,
                'nilai_alternatif' => $nilaiAlt
            ];
            $this->db->where('id_nilai_alternatif', $idNilAlt);
            $this->db->update('nilai_alternatif', $nilai);
        }
    }
    // End Nilai Alternatif

    // Function Nilai Rekomendasi
    public function bandingKeahlian($id_alternatif, $id_user)
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

        if ($jumlah == count($arrayKhAltr)) {
            $nilaiAlt = 5;
        } elseif ($jumlah == 0) {
            $nilaiAlt = 1;
        } else {
            $beda = count($arrayKhAltr) - $jumlah;
            if ($beda == 1) {
                $nilaiAlt = 4;
            } elseif ($beda == 2) {
                $nilaiAlt = 3;
            } elseif ($beda == 3) {
                $nilaiAlt = 2;
            } else {
                $nilaiAlt = 1;
            }
        }

        return $nilaiAlt;
    }

    // public function bandingLokasi($id_alternatif, $id_user)
    // {
    //     $LokUser = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
    //     $LokAlt = $this->db->get_where('alternatif', ['id_alternatif' => $id_alternatif])->row_array();
    //     if ($LokUser['kecamatan_id'] == $LokAlt['kecamatan_id']) {
    //         $nilaiAlt = 5;
    //     } elseif ($LokUser['kecamatan_id'] != $LokAlt['kecamatan_id'] && $LokUser['kabupaten_id'] == $LokAlt['kabupaten_id']) {
    //         $nilaiAlt = 3;
    //     } else {
    //         $nilaiAlt = 1;
    //     }

    //     return $nilaiAlt;
    // }

    public function bandingLokasi($id_user, $id_alternatif)
    {
        $LokUser = $this->db->get_where('user', ['id_user' => $id_user])->row_array();
        $LokAlt = $this->db->get_where('alternatif', ['id_alternatif' => $id_alternatif])->row_array();

        $kecAlt = $LokAlt['kecamatan_id'];
        $kecUser = $LokUser['kecamatan_id'];

        if ($kecAlt == $kecUser) {
            $nilaiAlt = 5;
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

            if ($jarak > 0 && $jarak <= 5) {
                $nilaiAlt = 10;
            } elseif ($jarak > 5 && $jarak <= 10) {
                $nilaiAlt = 9;
            } elseif ($jarak > 10 && $jarak <= 15) {
                $nilaiAlt = 8;
            } elseif ($jarak > 15 && $jarak <= 20) {
                $nilaiAlt = 7;
            } elseif ($jarak > 20 && $jarak <= 30) {
                $nilaiAlt = 6;
            } elseif ($jarak > 30 && $jarak <= 35) {
                $nilaiAlt = 5;
            } elseif ($jarak > 35 && $jarak <= 40) {
                $nilaiAlt = 4;
            } elseif ($jarak > 40 && $jarak <= 45) {
                $nilaiAlt = 3;
            } elseif ($jarak > 45 && $jarak <= 50) {
                $nilaiAlt = 2;
            } else {
                $nilaiAlt = 1;
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

    public function bandingAlternatif($id_alternatif, $id_user, $id_kriteria)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = na.kriteria_id');
        $this->db->where('na.alternatif_id', $id_alternatif);
        $this->db->where('na.kriteria_id', $id_kriteria);
        $alt = $this->db->get('nilai_alternatif na')->row_array();

        // Bandingkan Nilai User Dengan Nilai Alternatif
        $this->db->where('kriteria_id', $id_kriteria);
        $user = $this->db->get_where('nilai_user', ['user_id' => $id_user])->row_array();


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

    public function inputNilaiRekomendasi($id_alternatif, $kategori)
    {
        $kriteria = $this->db->get('kriteria')->result_array();
        $user = $this->db->get_where('user', ['kategori_id' => $kategori])->result_array();
        foreach ($kriteria as $row) {

            $idKriteria = $row['id_kriteria'];
            $namaKriteria = $row['nama_kriteria'];

            foreach ($user as $usr) {
                // Bandingkan Kriteria Keahlian
                if ($namaKriteria == 'Keahlian') {
                    $nilaiAlt = $this->bandingKeahlian($id_alternatif, $usr['id_user']);
                }

                // Bandingkan Kriteria Lokasi
                elseif ($namaKriteria == 'Lokasi') {
                    $nilaiAlt = $this->bandingLokasi($id_alternatif, $usr['id_user']);
                }
                // Bandingkan Kriteria Usia, Pendidikan dan Pengalaman
                else {
                    $nilaiAlt = $this->bandingAlternatif($id_alternatif, $usr['id_user'], $idKriteria);
                }

                $nilaiRekomendasi = [
                    'alternatif_id' => $id_alternatif,
                    'kriteria_id' => $idKriteria,
                    'nilai_alternatif' => $nilaiAlt,
                    'user_id' => $usr['id_user']
                ];

                $this->db->insert('nilai_rekomendasi', $nilaiRekomendasi);
            }
        }
    }

    public function updateNilaiRekomendasi($id_alternatif, $kategori)
    {
        $kriteria = $this->db->get('kriteria')->result_array();
        $user = $this->db->get_where('user', ['kategori_id' => $kategori])->result_array();
        foreach ($kriteria as $row) {

            $idKriteria = $row['id_kriteria'];
            $namaKriteria = $row['nama_kriteria'];

            foreach ($user as $usr) {
                // Bandingkan Kriteria Keahlian
                if ($namaKriteria == 'Keahlian') {
                    $nilaiAlt = $this->bandingKeahlian($id_alternatif, $usr['id_user']);
                }

                // Bandingkan Kriteria Lokasi
                elseif ($namaKriteria == 'Lokasi') {
                    $nilaiAlt = $this->bandingLokasi($id_alternatif, $usr['id_user']);
                }
                // Bandingkan Kriteria Usia, Pendidikan dan Pengalaman
                else {
                    $nilaiAlt = $this->bandingAlternatif($id_alternatif, $usr['id_user'], $idKriteria);
                }

                $nilaiRekomendasi = [
                    'nilai_alternatif' => $nilaiAlt,
                ];

                $this->db->where('alternatif_id', $id_alternatif);
                $this->db->where('kriteria_id', $idKriteria);
                $this->db->where('user_id', $usr['id_user']);
                $this->db->update('nilai_rekomendasi', $nilaiRekomendasi);
            }
        }
    }
    // END FUNCTION NILAI REKOMENDASI

    // Tambah Alternatif
    public function tambah_alternatif($foto)
    {
        $tanggal = $this->input->post('batas_lamaran');
        $tglDB = date("Y:m:d", strtotime($tanggal));
        // Insert Data Alternatif
        $katAlt = $this->input->post('kategori');
        $data = [
            'nama_alternatif' => htmlspecialchars(trim($this->input->post('nama_alternatif'))),
            'nama_usaha' => htmlspecialchars(trim($this->input->post('nama_usaha'))),
            'email_usaha' => htmlspecialchars(trim($this->input->post('email'))),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kabupaten_id' => $this->input->post('kabupaten'),
            'kecamatan_id' => $this->input->post('kecamatan'),
            'alamat' => htmlspecialchars(trim($this->input->post('alamat'))),
            'gender' => $this->input->post('gender'),
            'tgl_post' => date('Y-m-d'),
            'batas_lamar' => $tglDB,
            'foto' => $foto
        ];

        $this->db->insert('alternatif', $data);
        $idAlt = $this->db->insert_id();

        // Insert Keahlian Alternatif
        $this->inputKeahlian($idAlt);
        // Insert Nilai alternatif
        $this->inputNilaiAlternatif($idAlt);

        $nilAlt = $this->db->get_where('nilai_rekomendasi', ['alternatif_id' => $idAlt])->result_array();
        if ($nilAlt == NULL) {
            $this->inputNilaiRekomendasi($idAlt, $katAlt);
        }
    }

    public function hapus_alternatif()
    {
        $id_alternatif = $this->input->post('id_alternatif');

        $this->db->where('alternatif_id', $id_alternatif);
        $this->db->delete('nilai_rekomendasi');

        $this->db->where('alternatif_id', $id_alternatif);
        $this->db->delete('nilai_alternatif');

        $this->db->where('alternatif_id', $id_alternatif);
        $this->db->delete('keahlian_alternatif');

        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->delete('alternatif');
    }

    // Update Alternatif
    public function update_alternatif($foto, $id_alternatif)
    {
        // Update Data Alternatif
        $tanggal = $this->input->post('batas_lamaran');
        $tglDB = date("Y:m:d", strtotime($tanggal));
        $kategori = $this->input->post('kategori');
        $data = [
            'nama_alternatif' => htmlspecialchars(trim($this->input->post('nama_alternatif'))),
            'nama_usaha' => htmlspecialchars(trim($this->input->post('nama_usaha'))),
            'email_usaha' => htmlspecialchars(trim($this->input->post('email'))),
            'kategori_id' => $this->input->post('kategori'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kabupaten_id' => $this->input->post('kabupaten'),
            'kecamatan_id' => $this->input->post('kecamatan'),
            'alamat' => htmlspecialchars(trim($this->input->post('alamat'))),
            'gender' => $this->input->post('gender'),
            'tgl_post' => date('Y-m-d'),
            'batas_lamar' => $tglDB,
            'foto' => $foto
        ];

        $this->db->where('id_alternatif', $id_alternatif);
        $this->db->update('alternatif', $data);

        $this->db->where('alternatif_id', $id_alternatif);
        $this->db->delete('keahlian_alternatif');

        // Input Keahlian Baru
        $this->inputKeahlian($id_alternatif);
        // Update Nilai alternatif
        $this->updateNilaiAlternatif($id_alternatif);
        // Input Nilai Rekomendasi
        $this->updateNilaiRekomendasi($id_alternatif, $kategori);
    }
}
