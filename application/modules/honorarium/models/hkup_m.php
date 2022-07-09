<?php

defined('BASEPATH') or exit('No direct script access allowed');

class hkup_m extends CI_Model
{

    public $namaTable = 'h_kup';
    public $pk = 'idKUP';

    function getAllData($Value)
    {
        $this->db->where('jenisHonorarium', $Value);
        $this->db->join('tahunajaran', 'tahunajaran.idTahunAjaran = honorarium.idTahunAjaran', 'left');
        return $this->db->get('honorarium')->result();
    }

    function getAllDatas()
    {
        $this->db->where('idHonorarium', $this->session->userdata('idHonorarium'));
        $this->db->join('pegawai', 'pegawai.idPegawai = ' . $this->namaTable . '.idPegawai', 'left');
        return $this->db->get($this->namaTable)->result();
    }

    function getAllDataPegawai()
    {
        return $this->db->get('pegawai')->result();
    }

    function getDataById($Value)
    {
        $this->db->where('idHonorarium', $Value);
        return $this->db->get('honorarium')->row();
    }

    function getDataByIds($Value)
    {
        $this->db->where($this->pk, $Value);
        return $this->db->get($this->namaTable)->row();
    }

    function save()
    {
        $object = [
            'idHonorarium' => $this->input->post('uniq'),
            'idTahunAjaran' => $this->session->userdata('idta'),
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
            'jenisHonorarium' => $this->input->post('jenisHonorarium'),
        ];

        $array = array(
            'idHonorarium' => $this->input->post('uniq'),
        );

        $this->session->set_userdata($array);
        $this->db->insert('honorarium', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function update($Value)
    {
        $object = [
            'tanggal' => $this->input->post('tanggal'),
            'keterangan' => $this->input->post('keterangan'),
        ];
        $this->db->where('idHonorarium', $Value);
        $this->db->update('honorarium', $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Rubah</div>');
    }

    function delete($Value)
    {
        $this->db->where('idHonorarium', $Value);
        $this->db->delete('honorarium');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berhasil Di Hapus</div>');
    }

    function d_save()
    {
        $object = [
            'idHonorarium' => $this->session->userdata('idHonorarium'),
            'idPegawai' => $this->input->post('idPegawai'),
            'honor' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $object2 = [
            'idTahunAjaran' => $this->session->userdata('idta'),
            'fk' => $this->session->userdata('idHonorarium'),
            'idPegawai' => $this->input->post('idPegawai'),
            'keterangan' => get_ket('honorarium', 'idHonorarium', $this->session->userdata('idHonorarium')),
            'debit' => str_replace('.', '', $this->input->post('honor')),
            'jenisDana' => $this->input->post('jenisDana'),
        ];
        $this->db->insert('akuntan', $object2);
        $this->db->insert($this->namaTable, $object);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Anggota Panitia</div>');
    }

    function d_update($Value)
    {
        $object = [
            'idPegawai' => $this->input->post('idPegawai'),
            'honor' => str_replace('.', '', $this->input->post('honor')),
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
