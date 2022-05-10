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

    public function post_loker()
    {
        $data['title'] = 'Post Lowongan Kerja';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['kriteria'] = $this->db->get_where('kriteria', ['nama_kriteria !=' => 'Keahlian', 'nama_kriteria !=' => 'Lokasi'])->result_array();
        $data['kecamatan'] = NULL;

        if ($this->input->post('kabupaten') != NULL) {
            $data['kecamatan'] = $this->db->get_where('kecamatan', ['id_kabupaten' => $this->input->post('kabupaten')])->result_array();
            if ($this->input->post('kecamatan')) {
                $this->session->set_userdata('kecamatan', $this->input->post('kecamatan'));
            }
        }
        foreach ($data['kriteria'] as $item) {
            if ($item['nama_kriteria'] == 'Pendidikan') {
                $data['pendidikan'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
            } elseif ($item['nama_kriteria'] == 'Pengalaman') {
                $data['pengalaman'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
            }
        }

        $kategori = $this->input->post('kategori');
        if ($kategori) {
            $this->session->set_userdata('kategori', $kategori);
            $data['keahlian'] = $this->db->get_where('keahlian', ['kategori_id' => $kategori])->result_array();
            $data['selected'] = $this->input->post('keahlian');
        }
        // FORM VALIDATION
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim', ['required' => 'Alternatif Tidak Boleh Kosong']);
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required', ['required' => 'Nama Usaha Harus Diisi']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Email Harus Diisi',
            'valid_email' => 'Email Tidak Valid'
        ]);
        $this->form_validation->set_rules('batas_lamaran', 'Batas Lamaran', 'trim|required', ['required' => 'Tanggal Batas Lamaran Harus Diisi']);
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required', ['required' => 'Gender Harus Diisi']);
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', ['required' => 'Kategori Harus Diisi']);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required', ['required' => 'Kabupaten Harus Diisi']);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan Harus Diisi']);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Tidak Boleh Kosong']);
        $this->form_validation->set_rules('usia', 'Usia', 'required|numeric|greater_than_equal_to[18]|less_than_equal_to[35]', [
            'required' => 'Maksimal Usia Tidak Boleh Kosong',
            'numeric' => 'Form Usia Hanya Menerima Inputan Angka!',
            'greater_than_equal_to' => 'Minimal Usia 18 Tahun',
            'less_than_equal_to' => 'Maksimal Usia 35 Tahun',
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', ['required' => 'Minimal Status Pendidikan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required', ['required' => 'Minimal Pengalaman Tidak Boleh Kosong']);
        // ENDFORM VALIDATON

        if ($this->form_validation->run() == false) {
            $this->template->load('template/user_template', 'job/post_lowongan', $data);
        } else {
            $this->session->unset_userdata('kecamatan');

            // Cek Foto
            $foto = $_FILES['foto']['name'];
            // Jika Foto Ada
            if ($foto) {
                // Ambil Foto
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/foto_loker';
                $this->load->library('upload', $config);

                // Jika Foto Bukan Allowed Types
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('foto_gagal', 'Input File Hanya Menerima Gambar dengan Max Size 2 MB');
                    redirect('alternatif/tambah_alternatif');
                } else {
                    // Jika Bukan, Ambil Nama Foto
                    $foto = $this->upload->data('file_name');
                }
            } else {
                $foto = "Default.png";
            }
            $this->Alternatif_Model->tambah_alternatif($foto);
            $this->session->unset_userdata('kategori');
            $this->session->set_flashdata('pesan', 'Tambah Lowongan Kerja');
            redirect('loker');
        }
    }
}
