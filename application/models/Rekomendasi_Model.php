<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi_Model extends CI_Model
{
    public function hitung_metode($id_user, $kategori)
    {
        // Cek Nilai Rekomendasi User
        $rekUser = $this->db->get_where('nilai_rekomendasi', ['user_id' => $id_user])->result_array();
        if ($rekUser == NULL) {
            return NULL;
        }

        $kriteria = $this->db->get('kriteria')->result_array();
        $alternatif = $this->db->get_where('alternatif', ['kategori_id' => $kategori])->result_array();

        // Normalisasi Matriks X (SAW)
        $matriks_X = [];
        $list_kriteria = array();
        foreach ($kriteria as $kt) {
            $list_kriteria[$kt['id_kriteria']] = $kt;
            foreach ($alternatif as $alt) {

                $idAlternatif = $alt['id_alternatif'];
                $idKriteria = $kt['id_kriteria'];

                $this->db->select('nilai_alternatif');
                $this->db->where('alternatif_id', $idAlternatif);
                $this->db->where('kriteria_id', $idKriteria);
                $tmp = $this->db->get_where('nilai_rekomendasi', ['user_id' => $id_user])->row_array();
                $matriks_X[$idKriteria][$idAlternatif] = $tmp['nilai_alternatif'];
            }
        }


        // Normalisasi Matriks Terbobot Y
        $matriks_R = [];

        foreach ($matriks_X as $id_kriteria => $nilai_alternatif) :

            $tipe = $list_kriteria[$id_kriteria]['jenis_kriteria'];
            foreach ($nilai_alternatif as $id_alternatif => $nilai) {
                if ($tipe == 'benefit') {
                    $nilai_normal = $nilai / max($nilai_alternatif);
                } elseif ($tipe == 'cost') {
                    $nilai_normal = min($nilai_alternatif) / $nilai;
                }

                $matriks_R[$id_kriteria][$id_alternatif] = $nilai_normal;
            }

        endforeach;


        $this->db->select_sum('bobot_kriteria');
        $this->db->from('kriteria');
        $sumBobot = $this->db->get()->row_array();
        $matriks_Y = array();
        foreach ($kriteria as $kt) :
            foreach ($alternatif as $alt) :

                $bobot = $kt['bobot_kriteria'] / $sumBobot['bobot_kriteria'];
                $idAlternatif = $alt['id_alternatif'];
                $idKriteria = $kt['id_kriteria'];

                $nilai_r = $matriks_R[$idKriteria][$idAlternatif];
                $matriks_Y[$idKriteria][$idAlternatif] =  $bobot * $nilai_r;

            endforeach;
        endforeach;


        // SOLUSI IDEAL POSITIF - NEGATIF
        $solusi_ideal_positif = array();
        $solusi_ideal_negatif = array();
        foreach ($kriteria as $kt) :

            $id_kriteria = $kt['id_kriteria'];
            $nilai_max = max($matriks_Y[$id_kriteria]);
            $nilai_min = min($matriks_Y[$id_kriteria]);

            $s_i_p = $nilai_max;
            $s_i_n = $nilai_min;

            $solusi_ideal_positif[$id_kriteria] = $s_i_p;
            $solusi_ideal_negatif[$id_kriteria] = $s_i_n;

        endforeach;


        // Mencari Jarak Solusi Ideal Positif dan Negatif
        $jarak_ideal_positif = array();
        $jarak_ideal_negatif = array();
        foreach ($alternatif as $alt) :

            $idAlternatif = $alt['id_alternatif'];
            $jumlah_kuadrat_jip = 0;
            $jumlah_kuadrat_jin = 0;

            // Mencari penjumlahan kuadrat
            foreach ($matriks_Y as $id_kriteria => $nilai_alternatif) :

                $hsl_pengurangan_jip = $nilai_alternatif[$idAlternatif] - $solusi_ideal_positif[$id_kriteria];
                $hsl_pengurangan_jin = $nilai_alternatif[$idAlternatif] - $solusi_ideal_negatif[$id_kriteria];

                $jumlah_kuadrat_jip += pow($hsl_pengurangan_jip, 2);
                $jumlah_kuadrat_jin += pow($hsl_pengurangan_jin, 2);

            endforeach;

            // Mengakarkan hasil penjumlahan kuadrat
            $akar_kuadrat_jip = sqrt($jumlah_kuadrat_jip);
            $akar_kuadrat_jin = sqrt($jumlah_kuadrat_jin);
            // Memasukkan ke array matriks jip & jin
            $jarak_ideal_positif[$idAlternatif] = $akar_kuadrat_jip;
            $jarak_ideal_negatif[$idAlternatif] = $akar_kuadrat_jin;

        endforeach;


        // URUTKAN
        $ranks = array();
        foreach ($alternatif as $alt) :

            $s_negatif = $jarak_ideal_negatif[$alt['id_alternatif']];
            $s_positif = $jarak_ideal_positif[$alt['id_alternatif']];

            $nilai_v = $s_negatif / ($s_positif + $s_negatif);

            $ranks[$alt['id_alternatif']]['id_alternatif'] = $alt['id_alternatif'];
            $ranks[$alt['id_alternatif']]['nilai_alternatif'] = $nilai_v;

        endforeach;



        $sorted_ranks = $ranks;

        usort($sorted_ranks, function ($a, $b) {
            return $a['nilai_alternatif'] <=> $b['nilai_alternatif'];
        });
        $preserved = array_reverse($sorted_ranks);

        // var_dump($preserved);
        // die;
        return $preserved;
    }

    // Ambil Informasi Lowongan Kerja
    public function ambil_rekomendasi($preserved)
    {
        $result = [];
        foreach ($preserved as $row) {
            $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
            $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
            $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
            $this->db->where('alt.id_alternatif', $row['id_alternatif']);
            $getAlt = $this->db->get('alternatif alt')->row_array();
            $result[] = $getAlt;

            if (count($result) == 3) {
                break;
            }
        }

        return $result;
    }
}
