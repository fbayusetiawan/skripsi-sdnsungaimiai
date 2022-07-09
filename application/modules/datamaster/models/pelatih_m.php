<?php

defined('BASEPATH') or exit('No direct script access allowed');

class pelatih_m extends CI_Model
{

    public $namaTable = 'pelatih';
    public $pk = 'idPelatih';

    function getAllData()
    {
        $this->db->select('namaEks, namaPelatih,idPelatih,pelatih.keterangan');
        $this->db->join('ekstrakulikuler', 'ekstrakulikuler.idEks = pelatih.idEks');
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
            'idPelatih' => uniqid(),
            'idEks' => $this->input->post('idEks'),
            'namaPelatih' => $this->input->post('namaPelatih'),
            'keterangan' => $this->input->post('keterangan'),
        ];

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'idEks' => $this->input->post('idEks'),
            'namaPelatih' => $this->input->post('namaPelatih'),
            'keterangan' => $this->input->post('keterangan'),
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
