<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alternatif extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('admin')) {
            redirect('auth_admin/login');
        }
    }

    public function index()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Data Lowongan Kerja';
        $data['alternatif'] = $this->Alternatif_Model->ambil_alternatif();
        $this->template->load('template/admin_template', 'admin/alternatif/index', $data);
    }

    public function tambah_alternatif()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Tambah Lowongan Kerja';
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
            'less_than_equal_to' => 'Maksimal Usia 18 Tahun',
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', ['required' => 'Minimal Status Pendidikan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required', ['required' => 'Minimal Pengalaman Tidak Boleh Kosong']);
        // ENDFORM VALIDATON

        if ($this->form_validation->run() == false) {
            $this->template->load('template/admin_template', 'admin/alternatif/tambah_alternatif', $data);
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
            $this->session->set_flashdata('pesan', 'Tambah Alternatif Lowongan Kerja');
            redirect('alternatif');
        }
    }

    public function hapus_alternatif()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Alternatif_Model->hapus_alternatif();
        $this->session->set_flashdata('pesan', 'Hapus Alternatif');
        redirect('alternatif');
    }

    // Update Alternatif
    public function update_alternatif($idAlternatif)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Update Lowongan';
        $data['alternatif'] = $this->Alternatif_Model->getAlternatif($idAlternatif);
        $kategori = $data['alternatif']['kategori_id'];
        $idKab = $data['alternatif']['kabupaten_id'];

        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        $data['kecamatan'] = $this->db->get_where('kecamatan', ['id_kabupaten' => $idKab])->result_array();

        $data['kriteria'] = $this->Alternatif_Model->getKriteriaAlternatif($idAlternatif);
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


        $keahlianAlt = $this->db->get_where('keahlian_alternatif', ['alternatif_id' => $idAlternatif])->result_array();
        $data['keahlian'] = $this->db->get_where('keahlian', ['kategori_id' => $kategori])->result_array();
        $selected = [];
        foreach ($keahlianAlt as $row) {
            $selected[] = (int)$row['keahlian_id'];
        }
        $data['selected'] = $selected;;


        // FORM VALIDATION
        $this->form_validation->set_rules('nama_alternatif', 'Nama Alternatif', 'required|trim', ['required' => 'Alternatif Tidak Boleh Kosong']);
        $this->form_validation->set_rules('nama_usaha', 'Nama Usaha', 'trim|required', ['required' => 'Nama Usaha Harus Diisi']);
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', [
            'required' => 'Email Harus Diisi',
            'valid_email' => 'Email Tidak Valid'
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'trim|required', ['required' => 'Gender Harus Diisi']);
        $this->form_validation->set_rules('kategori', 'Kategori', 'trim|required', ['required' => 'Kategori Harus Diisi']);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'trim|required', ['required' => 'Kabupaten Harus Diisi']);
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'trim|required', ['required' => 'Kecamatan Harus Diisi']);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required', ['required' => 'Deskripsi Tidak Boleh Kosong']);
        $this->form_validation->set_rules('usia', 'Usia', 'required|numeric|greater_than_equal_to[18]|less_than_equal_to[35]', [
            'required' => 'Maksimal Usia Tidak Boleh Kosong',
            'numeric' => 'Form Usia Hanya Menerima Inputan Angka!',
            'greater_than_equal_to' => 'Minimal Usia 18 Tahun',
            'less_than_equal_to' => 'Maksimal Usia 18 Tahun',
        ]);
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required', ['required' => 'Minimal Status Pendidikan Tidak Boleh Kosong']);
        $this->form_validation->set_rules('pengalaman', 'Pengalaman', 'required', ['required' => 'Minimal Pengalaman Tidak Boleh Kosong']);
        // END FORM VALIDATION

        if ($this->form_validation->run() == false) {
            $this->template->load('template/admin_template', 'admin/alternatif/update_alternatif', $data);
        } else {
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
                // Jika Tidak Ada Foto
            } else {
                $foto = "Default.png";
            }
            $this->Alternatif_Model->update_alternatif($foto, $idAlternatif);
            $this->session->set_flashdata('pesan', 'Update Alternatif Lowongan Kerja');
            redirect('alternatif');
        }
    }

    public function cari_keahlian()
    {
        $id_kategori = $this->input->post('id_kategori');
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
}
