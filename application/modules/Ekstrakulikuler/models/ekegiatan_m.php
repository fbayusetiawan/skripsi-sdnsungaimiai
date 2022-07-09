<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ekegiatan_m extends CI_Model
{

    public $namaTable = 'e_kegiatan';
    public $pk = 'idKegiatan';

    function getAllData($Value)
    {
        $this->db->where('jenisEKskul', $Value);
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = ekskul.idTahunAjaran', 'left');
        return $this->db->get('ekskul')->result();
    }

    function getAllDatas()
    {

        $this->db->join('ekstrakulikuler', 'ekstrakulikuler.idEks = e_kegiatan.idEks', 'left');

        $this->db->where('idEkskul', $this->session->userdata('idEkskul'));
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    function getDataById($Value)
    {
        $this->db->where('idEkskul', $Value);
        return $this->db->get('ekskul')->row();
    }

    function getDataByIds($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idEkskul' => $this->input->post('uniq'),
            'idTahunAjaran' => $this->session->userdata('idta'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jenisEkskul' => $this->input->post('jenisEkskul'),
        ];

        $array = array(
            'idEkskul' => $this->input->post('uniq'),
        );

        $this->session->set_userdata($array);
        $this->db->insert('ekskul', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('idEkskul', $Value);
        $this->db->update('ekskul', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where('idEkskul', $Value);
        $this->db->delete('ekskul');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function d_save()
    {
        $object = [
            'idEkskul' => $this->session->userdata('idEkskul'),
            'idEks' => $this->input->post('idEks'),
            'namaKegiatan' => $this->input->post('namaKegiatan'),
            'lamaKegiatan' => $this->input->post('lamaKegiatan'),
            'biaya' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $object2 = [
            'idTahunAjaran' => $this->session->userdata('idta'),
            'fk' => $this->session->userdata('idEkskul'),
            'keterangan' => $this->input->post('namaKegiatan'),
            'debit' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $this->db->insert('akuntan', $object2);
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function d_update($Value)
    {
        $object = [
            'idEks' => $this->input->post('idEks'),
            'namaKegiatan' => $this->input->post('namaKegiatan'),
            'lamaKegiatan' => $this->input->post('lamaKegiatan'),
            'biaya' => str_replace('.', '', $this->input->post('biaya')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $this->db->where($this->pk, $Value);
        $this->db->update($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Dirubah</div>');
    }

    function d_delete($Value)
    {
        $this->db->where($this->pk, $Value);
        $this->db->delete($this->namaTable);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }
}

/* End of file */
