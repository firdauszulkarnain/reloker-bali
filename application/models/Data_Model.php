<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Model extends CI_Model
{
    // -------------------Kategori Start------------------\\
    public function ambil_kategori()
    {
        return $this->db->get('kategori')->result_array();
    }

    public function tambah_kategori()
    {
        $data = [
            'nama_kategori' => htmlspecialchars(trim(ucwords($this->input->post('nama_kategori')))),
        ];

        $this->db->insert('kategori', $data);
    }

    public function update_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $data = [
            'nama_kategori' => htmlspecialchars((ucwords($this->input->post('nama_kategori'))))
        ];

        $this->db->where('id_kategori', $id_kategori);
        $this->db->update('kategori', $data);
    }

    public function hapus_kategori()
    {
        $id_kategori = $this->input->post('id_kategori');
        $this->db->where('id_kategori', $id_kategori);
        $this->db->delete('kategori');
    }
    // -------------------Kategori END------------------\\

    // KRITERIA START
    public function ambil_kriteria()
    {
        return $this->db->get('kriteria')->result_array();
    }

    public function tambah_kriteria()
    {
        $data = [
            'nama_kriteria' => htmlspecialchars(trim($this->input->post('nama_kriteria'))),
            'alias' => htmlspecialchars(trim($this->input->post('alias'))),
            'jenis_kriteria' => $this->input->post('jenis_kriteria'),
            'bobot_kriteria' => htmlspecialchars(trim($this->input->post('bobot_kriteria')))
        ];

        $this->db->insert('kriteria', $data);
    }

    public function update_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $data = [
            'nama_kriteria' => htmlspecialchars(trim($this->input->post('nama_kriteria'))),
            'alias' => htmlspecialchars(trim($this->input->post('alias'))),
            'jenis_kriteria' => $this->input->post('jenis_kriteria'),
            'bobot_kriteria' => htmlspecialchars(trim($this->input->post('bobot_kriteria')))
        ];

        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->update('kriteria', $data);
    }

    public function hapus_kriteria()
    {
        $id_kriteria = $this->input->post('id_kriteria');
        $this->db->where('id_kriteria', $id_kriteria);
        $this->db->delete('kriteria');
    }
    // KRITERIA END


    // PARAMETER START
    public function ambil_parameter()
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = pt.kriteria_id');
        return $this->db->get('parameter pt')->result_array();
    }

    public function tambah_parameter()
    {
        $id_kriteria = $this->input->post('kriteria');
        $i = 1;
        for ($i = 1; $i <= 5; $i++) {
            $namaParam = htmlspecialchars(trim($this->input->post('nama_parameter' . $i)));
            $nilai =  $this->input->post('nilai_parameter' . $i);
            $nilaiParam = $nilai . '|' . $namaParam;
            $data = [
                'nama_parameter' => $namaParam,
                'kriteria_id' => $id_kriteria,
                'nilai' => $nilai,
                'nilai_parameter' => $nilaiParam
            ];

            $this->db->insert('parameter', $data);
        }
    }
    // PARAMTER END

    public function ambil_pendidikan()
    {
        $this->db->join('kriteria kt', 'kt.id_kriteria = pt.kriteria_id');
        $this->db->where('kt.nama_kriteria', 'pendidikan');
        return $this->db->get('parameter pt')->result_array();
    }

    // Keahlian
    public function ambil_keahlian()
    {
        $this->db->join('kategori kt', 'kt.id_kategori = kh.kategori_id');
        return $this->db->get('keahlian kh')->result_array();
    }

    public function tambah_keahlian()
    {
        $data = [
            'kategori_id' => $this->input->post('kategori'),
            'nama_keahlian' => htmlspecialchars(trim($this->input->post('nama_keahlian'))),
        ];

        $this->db->insert('keahlian', $data);
    }

    public function update_keahlian()
    {
        $id_keahlian = $this->input->post('keahlian');
        $data = [
            'kategori_id' => $this->input->post('kategori'),
            'nama_keahlian' => htmlspecialchars((ucwords($this->input->post('nama_keahlian'))))
        ];

        $this->db->where('id_keahlian', $id_keahlian);
        $this->db->update('keahlian', $data);
    }

    public function hapus_keahlian()
    {
        $id_keahlian = $this->input->post('id_keahlian');
        $this->db->where('id_keahlian', $id_keahlian);
        $this->db->delete('keahlian');
    }
}
