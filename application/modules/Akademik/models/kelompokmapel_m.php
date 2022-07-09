<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kelompokmapel_m extends CI_Model
{

    public $namaTable = 'kelompok_mapel';
    public $pk = 'idKelompokMapel';

    public function getAllData()
    {

        return $this->db->get($this->namaTable)->result();
    }


    public function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    public function save()
    {
        $object = [

            'jenisKelompokMapel' => htmlspecialchars($this->input->post('jenisKelompokMapel', TRUE)),
            'namaKelompokMapel' => htmlspecialchars($this->input->post('namaKelompokMapel', TRUE))

        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [

            'jenisKelompokMapel' => htmlspecialchars($this->input->post('jenisKelompokMapel', TRUE)),
            'namaKelompokMapel' => htmlspecialchars($this->input->post('namaKelompokMapel', TRUE))

        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Ubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
