<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ekstrakulikuler_m extends CI_Model
{

    public $namaTable = 'ekstrakulikuler';
    public $pk = 'idEks';

    function getAllData()
    {
        $this->db->join('pegawai', 'pegawai.idPegawai = ekstrakulikuler.pembina', 'left');

        return $this->db->get($this->namaTable)->result();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idEks' => uniqid(),
            'namaEks' => $this->input->post('namaEks'),
            'keterangan' => $this->input->post('keterangan'),
            'pembina' => $this->input->post('pembina'),
        ];

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'namaEks' => $this->input->post('namaEks'),
            'keterangan' => $this->input->post('keterangan'),
            'pembina' => $this->input->post('pembina'),
        ];

        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
