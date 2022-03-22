<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tentang extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Tentang Kami';

        $this->template->load('template/user_template', 'job/tentang', $data);
    }
}
