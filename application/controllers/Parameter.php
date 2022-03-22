<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Parameter extends CI_Controller
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
        $data['title'] = 'Data Parameter Rekomendasi';
        $data['parameter'] = $this->Data_Model->ambil_parameter();
        $this->template->load('template/admin_template', 'admin/parameter/index', $data);
    }

    public function tambah_parameter()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Tambah Paratemer Kritera Rekomendasi';
        $data['kriteria'] = $this->db->get_where('kriteria')->result_array();

        $this->form_validation->set_rules('nama_parameter1', 'Nama Parameter', 'trim|required', ['required' => 'Parameter Tidak Boleh Kosong']);


        if ($this->form_validation->run() == false) {
            $this->template->load('template/admin_template', 'admin/parameter/tambah_parameter', $data);
        } else {
            $this->Data_Model->tambah_parameter();
            $this->session->set_flashdata('pesan', 'Tambah Data Parameter');
            redirect('parameter');
        }
    }

    public function cari_parameter()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $data = $this->db->get_where('parameter', ['id_kriteria' => $id_kriteria])->result_array();
        foreach ($data as $item) {
            echo '<option value="' . $item['nilai_parameter'] . '">' . $item['nama_parameter'] . '</option>';
        }
    }
}
