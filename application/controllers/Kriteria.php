<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
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
        $data['title'] = 'Data Kriteria Rekomendasi';
        $data['kriteria'] = $this->Data_Model->ambil_Kriteria();
        $this->template->load('template/admin_template', 'admin/kriteria/index', $data);
    }

    public function tambah_kriteria()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Tambah Data Kriteria Rekomendasi';

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required', ['required' => 'Nama Kriteria Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required', ['required' => 'Alias Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required', ['required' => 'Jenis Kriteria Tidak Boleh Kosong']);
        $this->form_validation->set_rules('bobot_kriteria', 'Bobot Kriteria', 'trim|required', ['required' => 'Bobot Kriteria Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/admin_template', 'admin/kriteria/tambah_kriteria', $data);
        } else {
            $this->Data_Model->tambah_kriteria();
            $this->session->set_flashdata('pesan', 'Tambah Data Kriteria');
            redirect('kriteria');
        }
    }

    public function update_kriteria($id_kriteria)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Tambah Data Kriteria Rekomendasi';
        $data['kriteria'] = $this->db->get_where('kriteria', ['id_kriteria' => $id_kriteria])->row_array();

        $this->form_validation->set_rules('nama_kriteria', 'Nama Kriteria', 'trim|required', ['required' => 'Nama Kriteria Tidak Boleh Kosong']);
        $this->form_validation->set_rules('alias', 'Alias', 'trim|required', ['required' => 'Alias Tidak Boleh Kosong']);
        $this->form_validation->set_rules('jenis_kriteria', 'Jenis Kriteria', 'trim|required', ['required' => 'Jenis Kriteria Tidak Boleh Kosong']);
        $this->form_validation->set_rules('bobot_kriteria', 'Bobot Kriteria', 'trim|required', ['required' => 'Bobot Kriteria Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/admin_template', 'admin/kriteria/update_kriteria', $data);
        } else {
            $this->Data_Model->update_kriteria();
            $this->session->set_flashdata('pesan', 'Tambah Data Kriteria');
            redirect('kriteria');
        }
    }


    public function hapus_kriteria()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->hapus_kriteria();
        $this->session->set_flashdata('pesan', 'Hapus Kriteria');
        redirect('kriteria');
    }
}
