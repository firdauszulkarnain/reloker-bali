<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori extends CI_Controller
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
        $data['title'] = 'Data Kategori';
        $data['kategori'] = $this->Data_Model->ambil_kategori();
        $this->template->load('template/admin_template', 'admin/kategori/index', $data);
    }

    public function tambah_kategori()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->tambah_kategori();
        $this->session->set_flashdata('pesan', 'Tambah Kategori');
        redirect('kategori');
    }

    public function update_kategori()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->update_kategori();
        $this->session->set_flashdata('pesan', 'Update Kategori');
        redirect('kategori');
    }

    public function hapus_kategori()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $this->Data_Model->hapus_kategori();
        $this->session->set_flashdata('pesan', 'Hapus Kategori');
        redirect('kategori');
    }
}
