<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Admin extends CI_Controller
{
    public function login()
    {
        // Cek Udah Login Adminn
        $data['title'] = 'Login Admin';
        if ($this->session->userdata('admin')) {
            redirect('admin/dashboard');
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username Tidak Boleh Kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Tidak Boleh Kosong']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['username' => $username])->row_array();
        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $data = [
                    'admin' => $admin['username']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Login Aplikasi');
                redirect('admin/dashboard');
            } else {
                $this->session->set_flashdata('error', 'Username atau Password Salah');
                redirect('auth_admin/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Username Tidak Ditemukan');
            redirect('auth_admin/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('admin');
        $this->session->set_flashdata('pesan', 'Logout Aplikasi');
        redirect('auth_admin/login');
    }
}
