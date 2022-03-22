<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function login()
    {
        // Cek Login User, Kalo Udah Login, Ga bisa Ke Halaman Login lagi
        if ($this->session->userdata('user')) {
            redirect('home');
        }
        $data['title'] = 'Login';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => "Email Tidak Valid"
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim', ['password' => 'Password Tidak Boleh Kosong']);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'user' => $user['id_user'],
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else {
                $this->session->set_flashdata('error', 'Password Salah');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('error', 'Email Belum Terdaftar');
            redirect('auth/login');
        }
    }

    public function register()
    {
        if ($this->session->userdata('user')) {
            redirect('home');
        }
        $data['title'] = 'REGISTER RELOKER BALI';
        // Form Validation
        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Lengkap Tidak Boleh Kosong']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]|alpha_numeric|min_length[5]|max_length[10]', [
            'required' => 'Username Tidak Boleh Kosong',
            'is_unique' => 'Username Sudah Digunakan',
            'alpha_numeric' => 'Username Hanya Menerima Input dan Angka',
            'min_length' => 'Panjang Username Minimal 5 Karakter',
            'max_length' => 'Panjang Username Maksimal 10 Karakter'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => "Email Tidak Valid",
            'is_unique' => "Email Telah Digunakan"
        ]);
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim', ['required' => 'Gender Tidak Boleh Kosong']);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'required' => 'Password Tidak Boleh Kosong',
                'min_length' => 'Password Kurang Dari 6 Karakter',
                'matches' => 'Password Tidak Sama'
            ]
        );
        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|matches[password1]',
            [
                'required' => 'Konfirmasi Password Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Tidak Sama'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/registrasi', $data);
        } else {
            $this->Auth_Model->register();
            $this->session->set_flashdata('pesan', 'Berhasil Register Akun');
            redirect('auth/login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('/');
    }
}
