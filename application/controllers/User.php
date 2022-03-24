<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
            redirect('auth/login');
        }
    }

    public function kriteria()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $id_kab = $data['user']['kabupaten_id'];
        $data['title'] = 'Kriteria User';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['kecamatan'] = $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kab])->result_array();
        $data['kriteria'] = $this->User_Model->ambil_kriteria();

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

        $kategori = $this->input->post('kategori_user');
        if ($kategori) {
            $this->session->set_userdata('kategori_user', $kategori);
            $data['keahlian'] = $this->db->get_where('keahlian', ['kategori_id' => $kategori])->result_array();
            $data['selected'] = $this->input->post('user_keahlian');
        }


        $this->form_validation->set_rules('kategori_user', 'Kategori', 'trim|required', ['required' => 'Kategori Harus Diisi']);
        $this->form_validation->set_rules('usia_user', 'Usia', 'required|numeric|greater_than_equal_to[18]|less_than_equal_to[35]', [
            'required' => 'Maksimal Usia Tidak Boleh Kosong',
            'numeric' => 'Form Usia Hanya Menerima Inputan Angka!',
            'greater_than_equal_to' => 'Minimal Usia 18 Tahun',
            'less_than_equal_to' => 'Maksimal Usia 18 Tahun',
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', ['required' => 'Gender Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pendidikan_user', 'Pendidikan', 'required', ['required' => 'Minimal Status Pendidikan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pengalaman_user', 'Pengalaman', 'required', ['required' => 'Minimal Pengalaman Tidak Boleh Kosong']);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required', ['required' => 'Kabupaten Harus Diisi']);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan Harus Diisi']);
        $this->form_validation->set_rules('user_keahlian[]', 'Keahlian', 'required', ['required' => 'Keahlian Harus Diisi']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/user_template', 'job/kriteria_user', $data);
        } else {
            $this->User_Model->tambah_user();
            $this->session->set_flashdata('pesan', 'Simpan Kriteria');
            redirect('rekomendasi');
        }
    }

    public function update_kriteria()
    {
        $this->db->join('kategori kt', 'kt.id_kategori = user.kategori_id');
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Kriteria User';
        $id_user = $data['user']['id_user'];
        $id_kab = $data['user']['kabupaten_id'];
        $kategori = $data['user']['kategori_id'];
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['kecamatan'] = $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kab])->result_array();

        $data['kriteria'] = $this->User_Model->getKriteriaUser($id_user);
        foreach ($data['kriteria'] as $item) {
            if ($item['nama_kriteria'] == 'Pendidikan') {
                $data['pendidikan'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
                $data['userPend'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Pengalaman') {
                $data['pengalaman'] = $this->db->get_where('parameter', ['kriteria_id' => $item['id_kriteria']])->result_array();
                $data['userPeng'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Usia') {
                $data['userUsia'] = $item['parameter'];
            }
        }

        $this->db->join('keahlian kh', 'kh.id_keahlian = ku.keahlian_id');
        $keahlianUser = $this->db->get_where('keahlian_user ku', ['user_id' => $id_user])->result_array();
        $data['keahlian'] = $this->db->get_where('keahlian', ['kategori_id' => $kategori])->result_array();
        $selected = [];
        $pilihKeahlian = [];
        foreach ($keahlianUser as $row) {
            $selected[] = (int)$row['keahlian_id'];
            $pilihKeahlian[] = $row['nama_keahlian'];
        }
        $data['pilihKeahlian'] = $pilihKeahlian;
        $data['selected'] = $selected;


        $this->form_validation->set_rules('kategori_user', 'Kategori', 'trim|required', ['required' => 'Kategori Harus Diisi']);
        $this->form_validation->set_rules('usia_user', 'Usia', 'required|numeric|greater_than_equal_to[18]|less_than_equal_to[35]', [
            'required' => 'Maksimal Usia Tidak Boleh Kosong',
            'numeric' => 'Form Usia Hanya Menerima Inputan Angka!',
            'greater_than_equal_to' => 'Minimal Usia 18 Tahun',
            'less_than_equal_to' => 'Maksimal Usia 18 Tahun',
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', ['required' => 'Gender Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pendidikan_user', 'Pendidikan', 'required', ['required' => 'Minimal Status Pendidikan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pengalaman_user', 'Pengalaman', 'required', ['required' => 'Minimal Pengalaman Tidak Boleh Kosong']);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required', ['required' => 'Kabupaten Harus Diisi']);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan Harus Diisi']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/user_template', 'job/update_kriteria_user', $data);
        } else {
            $this->User_Model->UpdateKriteriaUser();
            $this->session->set_flashdata('pesan', 'Simpan Kriteria');
            redirect('rekomendasi');
        }
    }

    public function cari_keahlian()
    {
        $id_kategori = $this->input->post('id_kat');
        $data = $this->db->get_where('keahlian', ['kategori_id' => $id_kategori])->result_array();
        foreach ($data as $item) {
            echo '<option value="' . $item['id_keahlian'] . '">' . $item['nama_keahlian'] . '</option>';
        }
    }

    public function cari_kecamatan()
    {
        $id_kabupaten = $this->input->post('id_kabupaten');
        $data = $this->db->get_where('kecamatan', ['id_kabupaten' => $id_kabupaten])->result_array();
        foreach ($data as $kecamatan) {
            echo '<option value="' . $kecamatan['id_kecamatan'] . '">' . $kecamatan['nama_kec'] . '</option>';
        }
    }

    public function pilih_keahlian()
    {
        $nilai = $this->input->post('nilai');
        $array = explode(",", $nilai);
        if ($nilai == NULL) {
            echo '<li>Tidak Ada Keahlian Dipilih! </li>';
        } else {
            foreach ($array as $item) {
                $data = $this->db->get_where('keahlian', ['id_keahlian' => $item])->row_array();
                echo  '<li> &#8226; ' . $data['nama_keahlian'] . ' </li>';
            }
        }
    }

    public function profile()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'User Profile';
        $id_user = $data['user']['id_user'];
        $data['kriteriaUser'] = $this->db->get_where('nilai_rekomendasi', ['user_id' => $id_user])->num_rows();

        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required', ['required' => 'Nama Lengkap Tidak Boleh Kosong']);
        if ($this->input->post('old_password') != null) {
            $this->form_validation->set_rules('old_password', 'Password', 'required|trim', ['required' => 'Password Lama Tidak Boleh Kosong']);
            $this->form_validation->set_rules(
                'password1',
                'Password',
                'required|trim|min_length[6]|matches[password2]',
                [
                    'required' => 'Password Baru Tidak Boleh Kosong',
                    'matches' => 'Konfirmasi Password Tidak Sesuai',
                    'min_length' => 'Minimal Password 6 Karakter'
                ]
            );
            $this->form_validation->set_rules('password2', 'Password', 'required|trim');
        }
        if ($this->form_validation->run() == false) {
            $this->template->load('template/user_template', 'job/profile', $data);
        } else {
            $this->User_Model->updateProfile();
            $this->session->set_flashdata('pesan', 'Berhasil Update Profile');
            redirect('user/profile');
        }
    }
}
