<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Loker extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Cari Loker';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['total'] = $this->db->get('alternatif')->num_rows();

        if ($this->session->userdata('search') != NULL) {
            $this->session->unset_userdata('search');
        }

        $this->load->library('pagination');
        // Hitung Banyak Loker
        $jumlah =  $this->Home_Model->hitung_loker();
        $config['total_rows'] = $jumlah;
        $config['base_url'] =  base_url() . 'loker/index';
        // Jumlah Item Tampil Per Halaman
        $config['per_page'] = 7;
        $config['num_links'] = $jumlah;
        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI
        $data['start'] = $this->uri->segment(3);

        if ($this->session->userdata('search') != NULL) {
            $this->session->unset_userdata('search');
        }

        $data['loker'] = $this->Home_Model->ambil_loker($config['per_page'], $data['start']);
        //Membuat link
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        $this->template->load('template/user_template', 'job/loker', $data);
    }

    public function detail_loker($id_alternatif)
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Detail Loker';
        $data['loker'] = $this->Home_Model->getDetailLoker($id_alternatif);
        $data['keahlian'] = $this->Home_Model->getDetailKeahlianLoker($id_alternatif);
        $data['kriteria'] = $this->Home_Model->getKriteriaLoker($id_alternatif);
        foreach ($data['kriteria'] as $item) {
            if ($item['nama_kriteria'] == 'Pendidikan') {
                $data['pendidikan'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
                $data['altPend'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Pengalaman') {
                $data['pengalaman'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
                $data['altPeng'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Usia') {
                $data['altUsia'] = $item['parameter'];
            }
        }

        $this->template->load('template/user_template', 'job/detail', $data);
    }


    public function cari_kategori()
    {
        if ($this->input->post('kategori')) {
            if ($this->input->post('kategori') == 'all') {
                $this->session->unset_userdata('kategori');
            } {
                $data['pilihKategori'] = $this->input->post('kategori');
                $this->session->set_userdata('kategori', $data['pilihKategori']);
            }
        }

        redirect('loker');
    }

    public function cari_kabupaten()
    {
        if ($this->input->post('kabupaten')) {
            if ($this->input->post('kabupaten') == 'all') {
                $this->session->unset_userdata('kabupaten');
            } {
                $data['pilihKabupaten'] = $this->input->post('kabupaten');
                $this->session->set_userdata('kabupaten', $data['pilihKabupaten']);
            }
        }
        redirect('loker');
    }


    public function search()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = "Search";
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['total'] = $this->db->get('alternatif')->num_rows();
        $like = '';
        if ($this->input->post('key')) {
            $like = htmlspecialchars(trim($this->input->post('key')));
            $this->session->set_userdata('search', $like);
        } else {
            $like = $this->session->userdata('search');
        }

        // Load Pagination CI
        $this->load->library('pagination');
        // Hitung Banyak Produk
        $jumlah =  $this->Home_Model->hitung_search($like);
        $config['total_rows'] = $jumlah;
        $config['base_url'] =  base_url() . 'loker/search';
        // Jumlah Item Tampil Per Halaman
        $config['per_page'] = 7;
        $config['num_links'] = $jumlah;
        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI
        $data['start'] = $this->uri->segment(3);


        $data['loker'] = $this->Home_Model->ambil_search($config['per_page'], $data['start'], $like);
        //Membuat link
        $str_links = $this->pagination->create_links();
        $data["links"] = explode('&nbsp;', $str_links);

        $this->template->load('template/user_template', 'job/loker', $data);
    }
}
