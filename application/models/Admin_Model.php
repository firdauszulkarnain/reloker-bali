<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{
    public function hitungAlternatif()
    {
        return $this->db->get('alternatif')->num_rows();
    }

    public function hitungKriteria()
    {
        return $this->db->get('kriteria')->num_rows();
    }

    public function hitungParameter()
    {
        return $this->db->get('parameter')->num_rows();
    }

    public function hitungUser()
    {
        return $this->db->get('user')->num_rows();
    }

    public function update_password($admin_id)
    {
        $data = [
            "password" => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT))
        ];

        $this->db->where('id_admin', $admin_id);
        $this->db->update('admin', $data);
    }


    public function getUser()
    {
        return $this->db->get('user')->result_array();
    }
}
