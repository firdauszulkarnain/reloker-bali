<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rekomendasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth/login');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Rekomendasi';
        $idUser = $data['user']['id_user'];
        $kategori = $data['user']['kategori_id'];
        $data['hitung'] = $this->Rekomendasi_Model->hitung_metode($idUser, $kategori);
        $data['rekomendasi'] = [];
        if ($data['hitung'] != NULL) {
            $hasil = $data['hitung'];
            $data['rekomendasi'] = $this->Rekomendasi_Model->ambil_rekomendasi($hasil);
        }


        $this->template->load('template/user_template', 'job/rekomendasi', $data);
    }
}
