<?php

defined('BASEPATH') or exit('No direct script access allowed');

class akuntan_m extends CI_Model
{

    public $namaTable = 'akuntan';
    public $pk = 'idAkuntan';

    function getAllData()
    {
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
            'idTahunAjaran' => $this->session->userdata('idta'),
            'keterangan' => $this->input->post('keterangan'),
            'debit' => str_replace('.', '', $this->input->post('debit')),
            'kredit' => str_replace('.', '', $this->input->post('kredit')),
        ];

        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [
            'jenis' => $this->input->post('jenis'),
            'jumlah' => str_replace('.', '', $this->input->post('jumlah')),
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
