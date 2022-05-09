<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // Cek Session Login Admin
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('user')) {
            redirect('/');
        }
        if (!$this->session->userdata('admin')) {
            redirect('auth_admin/login');
        }
    }

    public function index()
    {
        redirect('admin/dashboard');
    }

    public function dashboard()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Dashboard';
        $data['alternatif'] = $this->Admin_Model->hitungAlternatif();
        $data['kriteria'] = $this->Admin_Model->hitungKriteria();
        $data['keahlian'] = $this->Admin_Model->hitungKeahlian();
        $data['user'] = $this->Admin_Model->hitungUser();
        $this->template->load('template/admin_template', 'admin/dashboard', $data);
    }

    public function user()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Informasi User';
        $data['user'] = $this->Admin_Model->getUser();
        $this->template->load('template/admin_template', 'admin/user/index', $data);
    }

    public function profile()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Profil Admin';

        $this->template->load('template/admin_template', 'admin/profile/index', $data);
    }

    public function ganti_password()
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $admin_id = $data['admin']['id_admin'];
        $admin_password = $data['admin']['password'];
        $this->form_validation->set_rules(
            'old_password',
            'Password',
            'required|trim',
            [
                'required' => 'Password Lama Tidak Boleh Kosong',
            ]
        );

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
        $password = $this->input->post('old_password');
        if ($this->form_validation->run() == false) {
            redirect('admin/profile');
        } else {
            if (password_verify($password, $admin_password)) {
                $this->Admin_Model->update_password($admin_id);
                $this->session->set_flashdata('pesan', 'Update Password');
                redirect('admin/profile');
            } else {
                $this->session->set_flashdata('old_password', 'Password Lama Tidak Sesuai');
                redirect('profil/ganti_password');
            }
        }
    }

    public function detail_user($id_user)
    {
        $data['admin'] = $this->db->get_where('admin', ['username' => $this->session->userdata('admin')])->row_array();
        $data['title'] = 'Informasi User';
        $data['detail'] = $this->Admin_Model->getDetailUser($id_user);
        $data['keahlian'] = $this->Admin_Model->getDetailKeahlianUser($id_user);
        $kriteria = $this->Admin_Model->getKriteriaUser($id_user);
        foreach ($kriteria as $item) {
            if ($item['nama_kriteria'] == 'Pendidikan') {
                $data['userPend'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Pengalaman') {
                $data['userPeng'] = $item['parameter'];
            } elseif ($item['nama_kriteria'] == 'Usia') {
                $data['userUsia'] = $item['parameter'];
            }
        }

        $this->template->load('template/admin_template', 'admin/user/detail_user', $data);
    }
}
