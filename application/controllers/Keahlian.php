<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Keahlian extends CI_Controller
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
        $data['title'] = 'Data Keahlian';
        $data['kategori'] = $this->db->get('kategori')->result_array();
        $data['keahlian'] = $this->Data_Model->ambil_keahlian();
        $this->template->load('template/admin_template', 'admin/keahlian/index', $data);
    }

    public function tambah_keahlian()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();

        $kategori = $this->input->post('kategori');
        $keahlian = $this->input->post('nama_keahlian');
        $this->db->where('kategori_id', $kategori);
        $this->db->where('nama_keahlian', $keahlian);
        $cek = $this->db->get('keahlian')->row_array();
        if ($cek == NULL) {
            $this->Data_Model->tambah_keahlian();
            $this->session->set_flashdata('pesan', 'Tambah Keahlian');
        } else {
            $string = 'Keahlian ' . $keahlian . ' Dalam Kategori ' . $kategori . ' Sudah Tersedia';
            $this->session->set_flashdata('error', $string);
        }
        redirect('keahlian');
    }

    public function update_keahlian()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->update_keahlian();
        $this->session->set_flashdata('pesan', 'Update Keahlian');
        redirect('keahlian');
    }

    public function hapus_keahlian()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->hapus_keahlian();
        $this->session->set_flashdata('pesan', 'Hapus Keahlian');
        redirect('keahlian');
    }
}
