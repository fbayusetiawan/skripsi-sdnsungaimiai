<?php

defined('BASEPATH') or exit('No direct script access allowed');

class soal_m extends CI_Model
{

    public $namaTable = 'pembuatansoal';
    public $pk = 'idPembuatanSoal';

    function getAllData()
    {
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = pembuatansoal.idTahunAjaran', 'left');
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
            'idPembuatanSoal' => $this->input->post('idPembuatanSoal'),
            'idTahunAjaran' => $this->session->userdata('idta'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jenisDana1' => $this->input->post('jenisDana'),
        ];

        $array = array(
            'idPembuatanSoal' => $this->input->post('idPembuatanSoal'),
            'jenisDana' => $this->input->post('jenisDana'),
        );

        $this->session->set_userdata($array);


        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'tanggal' => $this->input->post('tanggal'),
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
