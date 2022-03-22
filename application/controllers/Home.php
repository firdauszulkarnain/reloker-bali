<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['id_user' => $this->session->userdata('user')])->row_array();
        $data['title'] = 'Home';
        $data['loker'] = $this->Home_Model->home_loker();
        $data['kategori'] = $this->Home_Model->kategori();
        $data['total'] = $this->db->get('alternatif')->num_rows();
        $this->template->load('template/user_template', 'job/index', $data);
    }
}
