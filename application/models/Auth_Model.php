<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_Model extends CI_Model
{
    public function register()
    {
        $data = [
            "nama_lengkap" => htmlspecialchars(trim($this->input->post('nama', true))),
            "username" => htmlspecialchars(trim($this->input->post('username', true))),
            "email" => htmlspecialchars(trim($this->input->post('email', true))),
            "kategori_id" => NULL,
            "gender" => $this->input->post('gender'),
            "password" => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
        ];
        $this->db->insert('user', $data);
    }
}
