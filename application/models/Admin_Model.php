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

    public function hitungKeahlian()
    {
        return $this->db->get('keahlian')->num_rows();
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

    public function getDetailUser($id_user)
    {
        $this->db->join('kategori kt', 'kt.id_kategori = us.kategori_id');
        $this->db->join('kabupaten kb', 'kb.id_kab = us.kabupaten_id');
        $this->db->join('kecamatan kc', 'kc.id_kecamatan = us.kecamatan_id');
        return $this->db->get_where('user us', ['us.id_user' => $id_user])->row_array();
    }

    public function getKriteriaUser($id_user)
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = nu.kriteria_id');
        return $this->db->get_where('nilai_user nu', ['nu.user_id' => $id_user])->result_array();
    }

    public function getDetailKeahlianUser($id_user)
    {
        $this->db->join('keahlian kh', 'kh.id_keahlian = ku.keahlian_id');
        return $this->db->get_where('keahlian_user ku', ['user_id' => $id_user])->result_array();
    }
}
