<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_Model extends CI_Model
{
    public function hitung_loker()
    {
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('alt.kategori_id', $this->session->userdata('kategori'));
            }
        }
        if ($this->session->userdata('kabupaten')) {
            if ($this->session->userdata('kabupaten') != 'all') {
                $this->db->where('alt.kabupaten_id', $this->session->userdata('kabupaten'));
            }
        }
        return $this->db->get('alternatif alt')->num_rows();
    }

    public function ambil_loker($limit, $start)
    {
        if (!$start) {
            $start = 0;
        }
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('alt.kategori_id', $this->session->userdata('kategori'));
            }
        }
        if ($this->session->userdata('kabupaten')) {
            if ($this->session->userdata('kabupaten') != 'all') {
                $this->db->where('alt.kabupaten_id', $this->session->userdata('kabupaten'));
            }
        }
        return $this->db->get('alternatif alt', $limit, $start)->result_array();
    }

    public function hitung_search($like)
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('alt.kategori_id', $this->session->userdata('kategori'));
            }
        }
        if ($this->session->userdata('kabupaten')) {
            if ($this->session->userdata('kabupaten') != 'all') {
                $this->db->where('alt.kabupaten_id', $this->session->userdata('kabupaten'));
            }
        }
        $this->db->like('nama_alternatif', $like);
        $this->db->or_like('nama_usaha', $like);
        return $this->db->get('alternatif alt')->num_rows();
    }

    public function ambil_search($limit, $start, $like)
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        if ($this->session->userdata('kategori')) {
            if ($this->session->userdata('kategori') != 'all') {
                $this->db->where('alt.kategori_id', $this->session->userdata('kategori'));
            }
        }
        if ($this->session->userdata('kabupaten')) {
            if ($this->session->userdata('kabupaten') != 'all') {
                $this->db->where('alt.kabupaten_id', $this->session->userdata('kabupaten'));
            }
        }
        $this->db->like('nama_alternatif', $like);
        $this->db->or_like('nama_usaha', $like);
        return $this->db->get('alternatif alt', $limit, $start)->result_array();
    }

    public function getDetailLoker($id_alternatif)
    {
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        return $this->db->get_where('alternatif alt', ['alt.id_alternatif' => $id_alternatif])->row_array();
    }

    public function getKriteriaLoker($id_alternatif)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = na.kriteria_id');
        return $this->db->get_where('nilai_alternatif na', ['na.alternatif_id' => $id_alternatif])->result_array();
    }

    public function getDetailKeahlianLoker($id_alternatif)
    {
        $this->db->join('keahlian kh', 'kh.id_keahlian = ka.keahlian_id');
        return $this->db->get_where('keahlian_alternatif ka', ['alternatif_id' => $id_alternatif])->result_array();
    }

    public function home_loker()
    {
        $this->db->join('kabupaten kb', 'kb.id_kab = alt.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = alt.kecamatan_id');
        $this->db->join('kategori kt', 'kt.id_kategori = alt.kategori_id');
        $this->db->order_by('alt.id_alternatif', 'desc');
        $this->db->limit('5');
        return $this->db->get('alternatif alt')->result_array();
    }

    public function kategori()
    {
        $this->db->where('nama_kategori !=', 'Umum');
        return $this->db->get('kategori')->result_array();
    }
}
