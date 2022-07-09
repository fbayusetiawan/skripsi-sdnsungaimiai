<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kelas_m extends CI_Model
{

    public $namaTable = 'kelas';
    public $pk = 'idKelas';

    function getAllData()
    {
        $this->db->join('guru', 'guru.nip = kelas.nip', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getTotal()
    {
        $sql = 'SELECT COUNT(*) From siswa where idSiswa group by idKelas';
        return $this->db->get($sql)->result();
    }

    function getSiswaKelas($Value)
    {
        $idKelas = $this->getIdKelas($Value);
        $this->db->where('kodeKelas', $idKelas->kodeKelas);
        return $this->db->get('siswa')->result();
    }

    function getIdKelas($idKelas)
    {
        $this->db->where('idKelas', $idKelas);
        return $this->db->get('kelas')->row();
    }

    function getDataById($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idKelas' => uniqid(),
            'kodeKelas' => $this->input->post('kodeKelas', TRUE),
            'namaKelas' => $this->input->post('namaKelas', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'isActive' => $this->input->post('isActive', TRUE),
        ];
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Disimpan</div>');
    }

    function update($Value)
    {
        $object = [

            'kodeKelas' => $this->input->post('kodeKelas', TRUE),
            'namaKelas' => $this->input->post('namaKelas', TRUE),
            'nip' => $this->input->post('nip', TRUE),
            'isActive' => $this->input->post('isActive', TRUE),
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
